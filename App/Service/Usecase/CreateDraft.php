<?php

namespace App\Service\Usecase;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Model\Write\Draft\CreateDraft as CreateDraftModel;
use App\Service\Repository\Write\DraftRepository;
use App\Service\UsecaseInput\CreateDraftInput;
use App\Service\UsecaseOutput\CreateDraftOutput;
use App\Service\UsecaseOutput\Impls\CreateDraftOutput\DraftInfo;
use App\Service\UsecaseOutput\Impls\CreateDraftOutput\InputError;
use App\Service\UsecaseOutput\Impls\CreateDraftOutput\SavingError;
use App\System\Exception\UnacceptableSettingException;
use App\Service\DiContainer as Di;

class CreateDraft {

	private $input;

	public function __construct(CreateDraftInput $input) {
		$this->input = $input;
	}

	public function execute(): CreateDraftOutput {
		try {
			$title = new Title($this->input->getTitleInput());
			$content = new Content($this->input->getContentInput());
		} catch (UnacceptableSettingException $e) {
			return new InputError();
		}

		$createDraft = new CreateDraftModel($title, $content);
		try {
			$draft = Di::get(DraftRepository::class)->create($createDraft);
		} catch (\Exception $e) {
			return new SavingError();
		}
		return new DraftInfo($draft);
	}
}