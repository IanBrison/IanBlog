<?php

namespace App\Service\Usecase\Impls;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;
use App\Service\Repository\Read\ThoughtRepository as ReadThoughtRepository;
use App\Service\Repository\Write\ThoughtRepository as WriteThoughtRepository;
use App\Service\Usecase\UpdateThought;
use App\Service\UsecaseInput\UpdateThoughtInput;
use App\Service\UsecaseOutput\Impls\UpdateThoughtOutput\InputError;
use App\Service\UsecaseOutput\Impls\UpdateThoughtOutput\SavingError;
use App\Service\UsecaseOutput\Impls\UpdateThoughtOutput\ThoughtInfo;
use App\Service\UsecaseOutput\UpdateThoughtOutput;
use App\System\Exception\DataNotFoundException;
use App\System\Exception\UnacceptableSettingException;
use Exception;

class UpdateThoughtUsecase implements UpdateThought {

    private $readThoughtRepository;
    private $writeThoughtRepository;

    public function __construct(ReadThoughtRepository $readThoughtRepository, WriteThoughtRepository $writeThoughtRepository) {
        $this->readThoughtRepository = $readThoughtRepository;
        $this->writeThoughtRepository = $writeThoughtRepository;
    }

    /**
     * @param UpdateThoughtInput $input
     * @return UpdateThoughtOutput
     * @throws DataNotFoundException
     */
    public function execute(UpdateThoughtInput $input): UpdateThoughtOutput {
        $thought = $this->readThoughtRepository->getById($input->getThoughtId());
		try {
			$title = new Title($input->getTitleInput());
			$content = new Content($input->getContentInput());
            $key = new Key($input->getKeyInput());
		} catch (UnacceptableSettingException $e) {
			return new InputError();
		}

		$updateThought = $thought->update($title, $content, $key);
		try {
		    $thought = $this->writeThoughtRepository->update($updateThought);
        } catch (Exception $e) {
		    return new SavingError();
        }
        return new ThoughtInfo($thought);
    }
}