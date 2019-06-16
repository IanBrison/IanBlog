<?php

namespace App\Service\Usecase\Impls;

use App\Service\Usecase\CreateArticle;
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
use App\Service\DiContainer as Di;
use Exception;

class CreateArticleUsecase implements CreateArticle {

    private $input;

    public function __construct(CreateArticleInput $input) {
        $this->input = $input;
    }

    /**
     * @return CreateArticleOutput
     * @throws Exception
     */
    public function execute(): CreateArticleOutput {
        if (!$this->input->isToPublish()) {
            $input = Di::get(CreateDraftInput::class, $this->input);
            /** @var CreateDraftUsecase $usecase */
            $usecase = Di::get(CreateDraftUsecase::class, $input);
            $output = $usecase->execute();
            if (!$output->hasError()) {
                return new ArticleInfo($output->getDraft());
            }
            if ($output->getErrorCode() === CreateDraftOutput::INPUT_ERROR) {
                return new InputError();
            }
            if ($output->getErrorCode() === CreateDraftOutput::SAVING_ERROR) {
                return new SavingError();
            }
        } else if ($this->input->isToBePost()) {
            $input = Di::get(CreatePostInput::class, $this->input);
            /** @var CreatePostUsecase $usecase */
            $usecase = Di::get(CreatePostUsecase::class, $input);
            $output = $usecase->execute();
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
            $input = Di::get(CreateThoughtInput::class, $this->input);
            /** @var CreateThoughtUsecase $usecase */
            $usecase = Di::get(CreatePostUsecase::class, $input);
            $output = $usecase->execute();
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