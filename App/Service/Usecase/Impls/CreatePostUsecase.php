<?php

namespace App\Service\Usecase\Impls;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Model\Write\Post\CreatePost as CreatePostModel;
use App\Service\Repository\Write\PostRepository;
use App\Service\Usecase\CreatePost;
use App\Service\UsecaseInput\CreatePostInput;
use App\Service\UsecaseOutput\CreatePostOutput;
use App\Service\UsecaseOutput\Impls\CreatePostOutput\InputError;
use App\Service\UsecaseOutput\Impls\CreatePostOutput\PostInfo;
use App\Service\UsecaseOutput\Impls\CreatePostOutput\SavingError;
use App\System\Exception\UnacceptableSettingException;
use Exception;

class CreatePostUsecase implements CreatePost {

	private $postRepository;

	public function __construct(PostRepository $postRepository) {
		$this->postRepository = $postRepository;
	}

	public function execute(CreatePostInput $input): CreatePostOutput {
		try {
			$title = new Title($input->getTitleInput());
			$content = new Content($input->getContentInput());
		} catch (UnacceptableSettingException $e) {
			return new InputError();
		}

		$createPost = new CreatePostModel($title, $content);
		try {
			$post = $this->postRepository->create($createPost);
		} catch (Exception $e) {
			return new SavingError();
		}
		return new PostInfo($post);
	}
}