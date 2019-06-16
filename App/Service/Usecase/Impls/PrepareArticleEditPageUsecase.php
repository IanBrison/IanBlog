<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\PrepareArticleEditPage;
use App\Service\UsecaseInput\PrepareArticleEditPageInput;
use App\Service\UsecaseOutput\Impls\PrepareArticleEditPageOutput\ArticleEditPageInfo;
use App\Service\UsecaseOutput\Impls\PrepareArticleEditPageOutput\IsNotAuthenticated;
use App\Service\UsecaseOutput\PrepareArticleEditPageOutput;
use App\Service\DiContainer as Di;

class PrepareArticleEditPageUsecase implements PrepareArticleEditPage {

	private $input;

	public function __construct(PrepareArticleEditPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PrepareArticleEditPageOutput {
		if (!Di::get(AuthRepository::class)->isAuthenticated()) {
			return new IsNotAuthenticated();
		}

		$articleId = $this->input->getArticleId();
		$article = Di::get(ArticleRepository::class)->getById($articleId);
		return new ArticleEditPageInfo($article);
	}
}