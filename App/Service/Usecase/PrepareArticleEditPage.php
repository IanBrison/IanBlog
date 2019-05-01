<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\UsecaseInput\PrepareArticleEditPageInput;
use App\Service\UsecaseOutput\PrepareArticleEditPageOutput;
use Core\Di\DiContainer as Di;

class PrepareArticleEditPage {

	private $input;

	public function __construct(PrepareArticleEditPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PrepareArticleEditPageOutput {
		if (!Di::get(AuthRepository::class)->isAuthenticated()) {
			return Di::get(PrepareArticleEditPageOutput::class, false);
		}

		$articleId = $this->input->getArticleId();
		$article = Di::get(ArticleRepository::class)->getById($articleId);
		return Di::get(PrepareArticleEditPageOutput::class, true, $article);
	}
}