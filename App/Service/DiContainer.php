<?php

namespace App\Service;

use Closure;
use Exception;
use ReflectionClass;
use ReflectionException;
use ReflectionFunction;
use ReflectionFunctionAbstract;

class DiContainer {

	/**
	 * all created instances go into this array
	 */
	static $singletons = [
	];

	/**
	 * alias mapper
	 */
	static $aliases = [
	];

	/**
	 * mock objects go into this array
	 * this array is prioritized to $singletons while in test mode
	 * it contains the mock classes with the mocked dependency name as a key
	 */
	static $mocks = [
	];

	/**
	 * prevent from initializing more then once
	 * @var bool hasInitialized
	 */
	static $hasInitialized = false;
	/**
	 * whether it is in test mode (the variable will be set to true once the _setMock() is called)
	 * @var bool $isTestMode
	 */
	static $isTestMode = false;

	/**
	 * initialize the container
	 * fill the arrays with the configured values
	 * @throws Exception
	 */
	public static function initialize(): void {
		if (self::$hasInitialized) return;

		$diConfig = require 'DiConfig.php';
		self::$singletons = array_fill_keys($diConfig['singletons'], null);
		self::$aliases = $diConfig['aliases'];
		self::$hasInitialized = true;
	}

    /**
     * get the injected instance
     * @param string $dependencyName
     * @param array  $args
     * @return mixed
     * @throws ReflectionException
     */
	public static function get(string $dependencyName, ...$args) {
        return self::$isTestMode ? self::_getMock($dependencyName, ...$args) : self::_get($dependencyName, ...$args);
	}

	/**
	 * set an instance to be injected
	 * @param string $dependencyName
	 * @param $instance
	 */
	public static function set(string $dependencyName, $instance) {
		self::_set($dependencyName, $instance);
	}

	/**
	 * the get process
	 * @param string $dependencyName
	 * @param array  $args
	 * @return mixed
	 * @throws ReflectionException
	 */
	private static function _get(string $dependencyName, ...$args) {
		// first, if it is cached in the singleton array, give back that instance
		if (isset(self::$singletons[$dependencyName])) {
			return self::$singletons[$dependencyName];
		}

		// if not cached, resolve the dependency name to either call the closure or handle with the reflection class
		$dependency = self::$aliases[$dependencyName] ?? $dependencyName;

		// resolve the other dependencies and instantiate the dependency to be injected
		$instance = self::_resolve($dependency, ...$args);

		// if required to be cached as a singleton, use the set to add in the array
		if (array_key_exists($dependencyName, self::$singletons)) {
			self::_set($dependencyName, $instance);
		}

		return $instance;
	}

    /**
     * @param       $dependency mixed
     * @param array $args
     * @return mixed|object
     * @throws ReflectionException
     */
    private static function _resolve($dependency, ...$args) {
        // create the reflection class
        $reflectionClass = new ReflectionClass($dependency);

        // return the instantiated class if no constructor declared (since there are no other dependencies)
        if (is_null($reflectionClass->getConstructor())) {
            return $reflectionClass->newInstance();
        }

		// get the function that does the construction
		$constructionFunction = $dependency instanceof Closure ? new ReflectionFunction($dependency) : $reflectionClass->getConstructor();

		// gather all the other parameters (dependencies)
		$constructionParameters = !empty($args) ? $args : self::_aggregateConstructionParameters($constructionFunction);

		// depending on the function, switch the way to call it
		$instance = $constructionFunction->isClosure() ?
			$constructionFunction->invokeArgs($constructionParameters) :
			$constructionFunction->getDeclaringClass()->newInstanceArgs($constructionParameters);
		return $instance;
    }

    /**
     * @param ReflectionFunctionAbstract $constructionFunction
     * @return array
     * @throws ReflectionException
     */
    private static function _aggregateConstructionParameters(ReflectionFunctionAbstract $constructionFunction): array {
        // fill in the construction parameters with the di container's injections
		$constructionParameters = [];
		foreach ($constructionFunction->getParameters() as $parameter) {
			$constructionParameters[] = self::_get($parameter->getClass()->name);
		}
		return $constructionParameters;
    }

	/**
	 * set the instance in the array
	 * @param string $dependencyName
	 * @param $instance
	 */
	private static function _set(string $dependencyName, $instance) {
		self::$singletons[$dependencyName] = $instance;
	}

	/**
	 * the get process while in test mode
	 * @param string $dependencyName
	 * @param mixed  ...$args
	 * @return mixed
	 * @throws ReflectionException
	 */
	private static function _getMock(string $dependencyName, ...$args) {
		// if a mock is set, get it from there
		if (isset(self::$mocks[$dependencyName])) {
			return self::$mocks[$dependencyName]->get(...$args);
		}
		// if not set, get from the normal process
		return self::_get($dependencyName, ...$args);
	}

	/**
	 * set the mock for testing
	 * @param string $dependencyName
	 * @param $instance
	 * @param bool $withInput
	 * @param mixed ...$args
	 */
	private static function _setMock(string $dependencyName, $instance, bool $withInput, ...$args) {
		self::$isTestMode = true;
		if (!isset(self::$mocks[$dependencyName])) {
			self::$mocks[$dependencyName] = new Mock();
		}
		self::$mocks[$dependencyName]->add($instance, $withInput, ...$args);
	}

	/**
	 * mock without any specified input values
	 * @param string $dependencyName
	 * @param $instance
	 */
	public static function mock(string $dependencyName, $instance) {
		self::_setMock($dependencyName, $instance, false);
	}

	/**
	 * mock with specified input values
	 * @param string $dependencyName
	 * @param $instance
	 * @param mixed ...$args
	 */
	public static function mockWithInput(string $dependencyName, $instance, ...$args) {
		self::_setMock($dependencyName, $instance, true, ...$args);
	}

	/**
	 * clear the cached arrays and reset the initialized flag
	 */
	public static function clear() {
		self::$singletons = [];
		self::$aliases = [];
		self::$mocks = [];
		self::$hasInitialized = false;
	}
}

// class to handle the mocks
class Mock {
	/**
	 * preserve the instances with the required inputs if needed
	 * @var array
	 */
	private $instances;
	public function __construct() {
		$this->instances = [];
	}
	/**
	 * add an instance with the required inputs if needed
	 * @param $instance
	 * @param bool $withInput
	 * @param mixed ...$args
	 */
	public function add($instance, bool $withInput, ...$args) {
		$this->instances[] = ['withInput' => $withInput, 'requiredArguments' => $args, 'registeredObject' => $instance];
	}
	/**
	 * try to resolve from the given arguments
	 * @param mixed ...$args
	 * @return mixed
	 * @throws Exception
	 */
	public function get(...$args) {
		foreach ($this->instances as $instance) {
			$isMatched = true;
			if (!$instance['withInput']) {
			} else if (count($instance['requiredArguments']) !== count($args)) {
				$isMatched = false;
			} else {
				foreach ($instance['requiredArguments'] as $index => $requiredArgument) {
					if ($requiredArgument !== $args[$index]) {
						$isMatched = false;
					}
				}
			}

			if ($isMatched) return $instance['registeredObject'];
		}

		throw new Exception("No mock object registered with the given arguments");
	}
}