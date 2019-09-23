<?php

namespace App\Service\Usecase\Impls;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Service\Repository\Read\DraftRepository as ReadDraftRepository;
use App\Service\Repository\Write\DraftRepository as WriteDraftRepository;
use App\Service\Usecase\UpdateDraft;
use App\Service\UsecaseInput\UpdateDraftInput;
use App\Service\UsecaseOutput\Impls\UpdateDraftOutput\DraftInfo;
use App\Service\UsecaseOutput\Impls\UpdateDraftOutput\InputError;
use App\Service\UsecaseOutput\Impls\UpdateDraftOutput\SavingError;
use App\Service\UsecaseOutput\UpdateDraftOutput;
use App\System\Exception\DataNotFoundException;
use App\System\Exception\UnacceptableSettingException;
use Exception;

class UpdateDraftUsecase implements UpdateDraft {

    private $readDraftRepository;
    private $writeDraftRepository;

    public function __construct(ReadDraftRepository $readDraftRepository, WriteDraftRepository $writeDraftRepository) {
        $this->readDraftRepository = $readDraftRepository;
        $this->writeDraftRepository = $writeDraftRepository;
    }

    /**
     * @param UpdateDraftInput $input
     * @return UpdateDraftOutput
     * @throws DataNotFoundException
     */
    public function execute(UpdateDraftInput $input): UpdateDraftOutput {
        $draft = $this->readDraftRepository->getById($input->getDraftId());
        try {
            $title = new Title($input->getTitleInput());
            $content = new Content($input->getContentInput());
        } catch (UnacceptableSettingException $e) {
            return new InputError();
        }

        $updateDraft = $draft->update($title, $content);
        try {
            $draft = $this->writeDraftRepository->update($updateDraft);
        } catch (Exception $e) {
            return new SavingError();
        }
        return new DraftInfo($draft);
    }
}