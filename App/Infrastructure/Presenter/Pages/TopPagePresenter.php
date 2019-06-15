<?php

namespace App\Infrastructure\Presenter\Pages;

use Core\Di\DiContainer as Di;
use Core\Presenter\BasicViewPresenter;
use Core\Presenter\View;
use Core\Presenter\ViewPresenter;

class TopPagePresenter implements ViewPresenter {

	use BasicViewPresenter;

	private $viewTemplate = 'pages/top';

    public function present() {
        Di::get(View::class)->present($this);
    }
}