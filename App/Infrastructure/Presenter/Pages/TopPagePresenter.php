<?php

namespace App\Infrastructure\Presenter\Pages;

use Core\Presenter\BasicViewPresenter;
use Core\Presenter\ViewPresenter;

class TopPagePresenter implements ViewPresenter {

	use BasicViewPresenter;

	private $viewTemplate = 'pages/top';
}