<?php

namespace App\Service\Usecase\Impls;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Service\Repository\Read\PostRepository as ReadPostRepository;
use App\Service\Repository\Write\PostRepository as WritePostRepository;
use App\Service\Usecase\UpdatePost;
use App\Service\UsecaseInput\UpdatePostInput;
use App\Service\UsecaseOutput\Impls\UpdatePostOutput\InputError;
use App\Service\UsecaseOutput\Impls\UpdatePostOutput\PostInfo;
use App\Service\UsecaseOutput\Impls\UpdatePostOutput\SavingError;
use App\Service\UsecaseOutput\UpdatePostOutput;
use App\System\Exception\DataNotFoundException;
use App\System\Exception\UnacceptableSettingException;
use Exception;

class UpdatePostUsecase implements UpdatePost {

    private $readPostRepository;
    private $writePostRepository;

    public function __construct(ReadPostRepository $readPostRepository, WritePostRepository $writePostRepository) {
        $this->readPostRepository = $readPostRepository;
        $this->writePostRepository = $writePostRepository;
    }

    /**
     * @param UpdatePostInput $input
     * @return UpdatePostOutput
     * @throws DataNotFoundException
     */
    public function execute(UpdatePostInput $input): UpdatePostOutput {
        $post = $this->readPostRepository->getById($input->getPostId());
		try {
			$title = new Title($input->getTitleInput());
			$content = new Content($input->getContentInput());
		} catch (UnacceptableSettingException $e) {
			return new InputError();
		}

		$updatePost = $post->update($title, $content);
		try {
		    $post = $this->writePostRepository->update($updatePost);
        } catch (Exception $e) {
		    return new SavingError();
        }
        return new PostInfo($post);
    }
}