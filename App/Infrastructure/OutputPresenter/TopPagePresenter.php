<?php

namespace App\Infrastructure\OutputPresenter;

use Core\Presenter\BasicViewPresenter;
use Core\Presenter\ViewPresenter;

class TopPagePresenter implements ViewPresenter {

	use BasicViewPresenter;

	private $viewTemplate = 'welcome';
}