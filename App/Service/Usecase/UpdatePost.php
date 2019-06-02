<?php

namespace App\Service\Usecase;

use App\Model\Read\Post;
use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Service\Repository\Read\PostRepository as ReadPostRepository;
use App\Service\Repository\Write\PostRepository as WritePostRepository;
use App\Service\UsecaseInput\UpdatePostInput;
use App\Service\UsecaseOutput\Impls\UpdatePostOutput\InputError;
use App\Service\UsecaseOutput\Impls\UpdatePostOutput\PostInfo;
use App\Service\UsecaseOutput\Impls\UpdatePostOutput\SavingError;
use App\Service\UsecaseOutput\UpdatePostOutput;
use App\System\Exception\UnacceptableSettingException;
use Core\Di\DiContainer as Di;
use Exception;

class UpdatePost {

    private $input;

    public function __construct(UpdatePostInput $input) {
        $this->input = $input;
    }

    public function execute(): UpdatePostOutput {
        /** @var Post $post */
        $post = Di::get(ReadPostRepository::class)->getById($this->input->getPostId());
		try {
			$title = new Title($this->input->getTitleInput());
			$content = new Content($this->input->getContentInput());
		} catch (UnacceptableSettingException $e) {
			return new InputError();
		}

		$updatePost = $post->update($title, $content);
		try {
		    $post = Di::get(WritePostRepository::class)->update($updatePost);
        } catch (Exception $e) {
		    return new SavingError();
        }
        return new PostInfo($post);
    }
}