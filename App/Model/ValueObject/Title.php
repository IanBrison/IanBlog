<?php

namespace App\Model\ValueObject;

use App\System\Exception\UnacceptableSettingException;

class Title {

	private $value;

	/**
	 * Title constructor.
	 * @param string $value
	 * @throws UnacceptableSettingException
	 */
	public function __construct(string $value) {
		if (empty($value)) {
			throw new UnacceptableSettingException("Title can't be empty");
		}
		$this->value = $value;
	}

	public function value(): string {
		return $this->value;
	}
}