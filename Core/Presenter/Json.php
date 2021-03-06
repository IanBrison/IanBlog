<?php

namespace Core\Presenter;

use Core\Di\DiContainer as Di;
use Core\Environment\Environment;
use Core\Response\Response;
use Exception;

class Json extends Presenter {

	protected $basePath; // the base path that is going to be used first
	protected $bravelPath; // the path that is going to be used when failed with basePath
	protected $extension; // the extension of the json file

	public function __construct() {
		$this->basePath = Environment::getDir('/App/Presentation/Jsons/');
		$this->bravelPath = $this->bravelCoreTemplateDirectory('/Jsons');
		$this->extension = '.json.php';
	}

    /**
     * @param string $template
     * @param array  $variables
     * @return false|string
     * @throws Exception
     */
    public function transform(string $template, array $variables = array()) {
		extract($variables);
        return json_encode(require $this->getAppropriateFile($template));
	}

	public function present(JsonPresenter $jp) {
		Di::set(Response::class, Di::get(Response::class)->setContent($jp->presentJson()));
	}

    /**
     * @param string $template
     * @param array  $variables
     * @throws Exception
     */
    public function presentWithNoJP(string $template, array $variables = array()) {
		$content = $this->transform($template, $variables);
		Di::set(Response::class, Di::get(Response::class)->setContent($content));
	}

    /**
     * @param string $template
     * @return string
     * @throws Exception
     */
    private function getAppropriateFile(string $template): string {
		$defaultFile = $this->basePath . $template . $this->extension;
		if (file_exists($defaultFile)) {
			return $defaultFile;
		}
		$bravelFile = $this->bravelPath . $template . $this->extension;
		if (file_exists($bravelFile)) {
			return $bravelFile;
		}
		throw new Exception("No Json Template File '$template' Found");
	}
}