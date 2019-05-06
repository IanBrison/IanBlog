<?php

namespace App\Service\Usecase;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Model\Write\Post\CreatePost as CreatePostModel;
use App\Service\Repository\Write\PostRepository;
use App\Service\UsecaseInput\CreatePostInput;
use App\Service\UsecaseOutput\CreatePostOutput;
use App\Service\UsecaseOutput\Impls\CreatePostOutput\InputError;
use App\Service\UsecaseOutput\Impls\CreatePostOutput\PostInfo;
use App\Service\UsecaseOutput\Impls\CreatePostOutput\SavingError;
use App\System\Exception\UnacceptableSettingException;
use Core\Di\DiContainer as Di;

class CreatePost {

	private $input;

	public function __construct(CreatePostInput $input) {
		$this->input = $input;
	}

	public function execute(): CreatePostOutput {
		try {
			$title = new Title($this->input->getTitleInput());
			$content = new Content($this->input->getContentInput());
		} catch (UnacceptableSettingException $e) {
			return new InputError();
		}

		$createPost = new CreatePostModel($title, $content);
		try {
			$post = Di::get(PostRepository::class)->create($createPost);
		} catch (\Exception $e) {
			return new SavingError();
		}
		return new PostInfo($post);
	}
}