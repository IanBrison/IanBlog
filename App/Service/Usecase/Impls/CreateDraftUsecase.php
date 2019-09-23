<?php

namespace App\Service\Usecase\Impls;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Model\Write\Draft\CreateDraft as CreateDraftModel;
use App\Service\Repository\Write\DraftRepository;
use App\Service\Usecase\CreateDraft;
use App\Service\UsecaseInput\CreateDraftInput;
use App\Service\UsecaseOutput\CreateDraftOutput;
use App\Service\UsecaseOutput\Impls\CreateDraftOutput\DraftInfo;
use App\Service\UsecaseOutput\Impls\CreateDraftOutput\InputError;
use App\Service\UsecaseOutput\Impls\CreateDraftOutput\SavingError;
use App\System\Exception\UnacceptableSettingException;
use Exception;

class CreateDraftUsecase implements CreateDraft {

	private $draftRepository;

	public function __construct(DraftRepository $draftRepository) {
	    $this->draftRepository = $draftRepository;
	}

	public function execute(CreateDraftInput $input): CreateDraftOutput {
		try {
			$title = new Title($input->getTitleInput());
			$content = new Content($input->getContentInput());
		} catch (UnacceptableSettingException $e) {
			return new InputError();
		}

		$createDraft = new CreateDraftModel($title, $content);
		try {
			$draft = $this->draftRepository->create($createDraft);
		} catch (Exception $e) {
			return new SavingError();
		}
		return new DraftInfo($draft);
	}
}