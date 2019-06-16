<?php

namespace App\Service\Usecase\Impls;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;
use App\Model\Write\Thought\CreateThought as CreateThoughtModel;
use App\Service\Repository\Write\ThoughtRepository;
use App\Service\Usecase\CreateThought;
use App\Service\UsecaseInput\CreateThoughtInput;
use App\Service\UsecaseOutput\CreateThoughtOutput;
use App\Service\UsecaseOutput\Impls\CreateThoughtOutput\InputError;
use App\Service\UsecaseOutput\Impls\CreateThoughtOutput\SavingError;
use App\Service\UsecaseOutput\Impls\CreateThoughtOutput\ThoughtInfo;
use App\System\Exception\UnacceptableSettingException;
use App\Service\DiContainer as Di;

class CreateThoughtUsecase implements CreateThought {

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
			return new InputError();
		}

		$createThought = new CreateThoughtModel($title, $content, $key);
		try {
			$thought = Di::get(ThoughtRepository::class)->create($createThought);
		} catch (\Exception $e) {
			return new SavingError();
		}
		return new ThoughtInfo($thought);
	}
}