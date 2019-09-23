<?php

namespace App\Service\Usecase\Impls;

use App\Service\Usecase\CreateArticle;
use App\Service\Usecase\CreateDraft;
use App\Service\Usecase\CreatePost;
use App\Service\Usecase\CreateThought;
use App\Service\UsecaseInput\CreateArticleInput;
use App\Service\UsecaseInput\Impls\CreateDraftInput\FromCreateArticle as CreateDraftInput;
use App\Service\UsecaseInput\Impls\CreatePostInput\FromCreateArticle as CreatePostInput;
use App\Service\UsecaseInput\Impls\CreateThoughtInput\FromCreateArticle as CreateThoughtInput;
use App\Service\UsecaseOutput\CreateArticleOutput;
use App\Service\UsecaseOutput\CreateDraftOutput;
use App\Service\UsecaseOutput\CreatePostOutput;
use App\Service\UsecaseOutput\CreateThoughtOutput;
use App\Service\UsecaseOutput\Impls\CreateArticleOutput\ArticleInfo;
use App\Service\UsecaseOutput\Impls\CreateArticleOutput\InputError;
use App\Service\UsecaseOutput\Impls\CreateArticleOutput\SavingError;
use Exception;

class CreateArticleUsecase implements CreateArticle {

    private $createDraft;
    private $createPost;
    private $createThought;

    public function __construct(CreateDraft $createDraft, CreatePost $createPost, CreateThought $createThought) {
        $this->createDraft = $createDraft;
        $this->createPost = $createPost;
        $this->createThought = $createThought;
    }

    /**
     * @param CreateArticleInput $input
     * @return CreateArticleOutput
     * @throws Exception
     */
    public function execute(CreateArticleInput $input): CreateArticleOutput {
        if (!$input->isToPublish()) {
            $createDraftInput = new CreateDraftInput($input);
            $output = $this->createDraft->execute($createDraftInput);
            if (!$output->hasError()) {
                return new ArticleInfo($output->getDraft());
            }
            if ($output->getErrorCode() === CreateDraftOutput::INPUT_ERROR) {
                return new InputError();
            }
            if ($output->getErrorCode() === CreateDraftOutput::SAVING_ERROR) {
                return new SavingError();
            }
        } else if ($input->isToBePost()) {
            $createPostInput = new CreatePostInput($input);
            $output = $this->createPost->execute($createPostInput);
            if (!$output->hasError()) {
                return new ArticleInfo($output->getPost());
            }
            if ($output->getErrorCode() === CreatePostOutput::INPUT_ERROR) {
                return new InputError();
            }
            if ($output->getErrorCode() === CreatePostOutput::SAVING_ERROR) {
                return new SavingError();
            }
        } else {
            $createThoughtInput = new CreateThoughtInput($input);
            $output = $this->createThought->execute($createThoughtInput);
            if (!$output->hasError()) {
                return new ArticleInfo($output->getThought());
            }
            if ($output->getErrorCode() === CreateThoughtOutput::INPUT_ERROR) {
                return new InputError();
            }
            if ($output->getErrorCode() === CreateThoughtOutput::SAVING_ERROR) {
                return new SavingError();
            }
        }
        throw new Exception("Can't resolve what article to make, or strange response received");
    }
}