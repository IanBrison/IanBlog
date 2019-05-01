<?php

namespace App\Service\Usecase;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Model\Write\Post\CreatePost as CreatePostModel;
use App\Service\Repository\Write\PostRepository;
use App\Service\UsecaseInput\CreatePostInput;
use App\Service\UsecaseOutput\CreatePostOutput;
use App\System\Exception\UnacceptableSettingException;
use Core\Di\DiContainer as Di;

class CreatePost {

	const NO_ERROR = 0;
	const INPUT_ERROR = 1;
	const SAVING_ERROR = 2;

	private $input;

	public function __construct(CreatePostInput $input) {
		$this->input = $input;
	}

	public function execute(): CreatePostOutput {
		try {
			$title = new Title($this->input->getTitleInput());
			$content = new Content($this->input->getContentInput());
		} catch (UnacceptableSettingException $e) {
			return Di::get(CreatePostOutput::class, self::INPUT_ERROR);
		}

		$createPost = new CreatePostModel($title, $content);
		try {
			$post = Di::get(PostRepository::class)->create($createPost);
		} catch (\Exception $e) {
			return Di::get(CreatePostOutput::class, self::SAVING_ERROR);
		}
		return Di::get(CreatePostOutput::class, self::NO_ERROR, $post);
	}
}