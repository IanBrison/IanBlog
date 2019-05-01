<?php

namespace App\Service\Usecase;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Model\Write\Draft\CreateDraft as CreateDraftModel;
use App\Service\Repository\Write\DraftRepository;
use App\Service\UsecaseInput\CreateDraftInput;
use App\Service\UsecaseOutput\CreateDraftOutput;
use App\System\Exception\UnacceptableSettingException;
use Core\Di\DiContainer as Di;

class CreateDraft {

	const NO_ERROR = 0;
	const INPUT_ERROR = 1;
	const SAVING_ERROR = 2;

	private $input;

	public function __construct(CreateDraftInput $input) {
		$this->input = $input;
	}

	public function execute(): CreateDraftOutput {
		try {
			$title = new Title($this->input->getTitleInput());
			$content = new Content($this->input->getContentInput());
		} catch (UnacceptableSettingException $e) {
			return Di::get(CreateDraftOutput::class, self::INPUT_ERROR);
		}

		$createDraft = new CreateDraftModel($title, $content);
		try {
			$draft = Di::get(DraftRepository::class)->create($createDraft);
		} catch (\Exception $e) {
			return Di::get(CreateDraftOutput::class, self::SAVING_ERROR);
		}
		return Di::get(CreateDraftOutput::class, self::NO_ERROR, $draft);
	}
}