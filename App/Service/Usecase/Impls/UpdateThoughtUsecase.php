<?php

namespace App\Service\Usecase\Impls;

use App\Model\Read\Thought;
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
use App\System\Exception\UnacceptableSettingException;
use App\Service\DiContainer as Di;
use Exception;

class UpdateThoughtUsecase implements UpdateThought {

    private $input;

    public function __construct(UpdateThoughtInput $input) {
        $this->input = $input;
    }

    public function execute(): UpdateThoughtOutput {
        /** @var Thought $thought */
        $thought = Di::get(ReadThoughtRepository::class)->getById($this->input->getThoughtId());
		try {
			$title = new Title($this->input->getTitleInput());
			$content = new Content($this->input->getContentInput());
            $key = new Key($this->input->getKeyInput());
		} catch (UnacceptableSettingException $e) {
			return new InputError();
		}

		$updateThought = $thought->update($title, $content, $key);
		try {
		    $thought = Di::get(WriteThoughtRepository::class)->update($updateThought);
        } catch (Exception $e) {
		    return new SavingError();
        }
        return new ThoughtInfo($thought);
    }
}