<?php

namespace App\Service\Usecase\Impls;

use App\Model\Read\Draft;
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
use App\System\Exception\UnacceptableSettingException;
use App\Service\DiContainer as Di;
use Exception;

class UpdateDraftUsecase implements UpdateDraft {

    private $input;

    public function __construct(UpdateDraftInput $input) {
        $this->input = $input;
    }

    public function execute(): UpdateDraftOutput {
        /** @var Draft $draft */
        $draft = Di::get(ReadDraftRepository::class)->getById($this->input->getDraftId());
        try {
            $title = new Title($this->input->getTitleInput());
            $content = new Content($this->input->getContentInput());
        } catch (UnacceptableSettingException $e) {
            return new InputError();
        }

        $updateDraft = $draft->update($title, $content);
        try {
            $draft = Di::get(WriteDraftRepository::class)->update($updateDraft);
        } catch (Exception $e) {
            return new SavingError();
        }
        return new DraftInfo($draft);
    }
}