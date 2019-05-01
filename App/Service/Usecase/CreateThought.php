<?php

namespace App\Service\Usecase;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;
use App\Model\Write\Thought\CreateThought as CreateThoughtModel;
use App\Service\Repository\Write\ThoughtRepository;
use App\Service\UsecaseInput\CreateThoughtInput;
use App\Service\UsecaseOutput\CreateThoughtOutput;
use App\System\Exception\UnacceptableSettingException;
use Core\Di\DiContainer as Di;

class CreateThought {

	const NO_ERROR = 0;
	const INPUT_ERROR = 1;
	const SAVING_ERROR = 2;

	private $input;

	public function __construct(CreateThoughtInput $input) {
		$this->input = $input;
	}

	public function execute(): CreateThoughtOutput {
		try {
			$title = new Title($this->input->getTitleInput());
			$content = new Content($this->input->getContentInput());
			$key = new Key($this->input->getKeyInput());
		} catch (UnacceptableSettingException $e) {
			return Di::get(CreateThoughtOutput::class, self::INPUT_ERROR);
		}

		$createThought = new CreateThoughtModel($title, $content, $key);
		try {
			$thought = Di::get(ThoughtRepository::class)->create($createThought);
		} catch (\Exception $e) {
			return Di::get(CreateThoughtOutput::class, self::SAVING_ERROR);
		}
		return Di::get(CreateThoughtOutput::class, self::NO_ERROR, $thought);
	}
}