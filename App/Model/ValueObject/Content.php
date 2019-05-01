<?php

namespace App\Model\ValueObject;

use App\System\Exception\UnacceptableSettingException;

class Content {

	private $value;

	/**
	 * Content constructor.
	 * @param string $value
	 * @throws UnacceptableSettingException
	 */
	public function __construct(string $value) {
		if (empty($value)) {
			throw new UnacceptableSettingException("Content can't be empty");
		}
		$this->value = $value;
	}

	public function value(): string {
		return $this->value;
	}
}