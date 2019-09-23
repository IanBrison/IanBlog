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
use Exception;

class CreateThoughtUsecase implements CreateThought {

	private $thoughtRepository;

	public function __construct(ThoughtRepository $thoughtRepository) {
		$this->thoughtRepository = $thoughtRepository;
	}

	public function execute(CreateThoughtInput $input): CreateThoughtOutput {
		try {
			$title = new Title($input->getTitleInput());
			$content = new Content($input->getContentInput());
			$key = new Key($input->getKeyInput());
		} catch (UnacceptableSettingException $e) {
			return new InputError();
		}

		$createThought = new CreateThoughtModel($title, $content, $key);
		try {
			$thought = $this->thoughtRepository->create($createThought);
		} catch (Exception $e) {
			return new SavingError();
		}
		return new ThoughtInfo($thought);
	}
}