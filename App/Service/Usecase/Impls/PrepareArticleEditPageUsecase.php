<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\PrepareArticleEditPage;
use App\Service\UsecaseInput\PrepareArticleEditPageInput;
use App\Service\UsecaseOutput\Impls\PrepareArticleEditPageOutput\ArticleEditPageInfo;
use App\Service\UsecaseOutput\Impls\PrepareArticleEditPageOutput\IsNotAuthenticated;
use App\Service\UsecaseOutput\PrepareArticleEditPageOutput;
use App\System\Exception\DataNotFoundException;

class PrepareArticleEditPageUsecase implements PrepareArticleEditPage {

	private $authRepository;
	private $articleRepository;

	public function __construct(AuthRepository $authRepository, ArticleRepository $articleRepository) {
		$this->authRepository = $authRepository;
		$this->articleRepository = $articleRepository;
	}

    /**
     * @param PrepareArticleEditPageInput $input
     * @return PrepareArticleEditPageOutput
     * @throws DataNotFoundException
     */
    public function execute(PrepareArticleEditPageInput $input): PrepareArticleEditPageOutput {
		if (!$this->authRepository->isAuthenticated()) {
			return new IsNotAuthenticated();
		}

		$articleId = $input->getArticleId();
		$article = $this->articleRepository->getById($articleId);
		return new ArticleEditPageInfo($article);
	}
}