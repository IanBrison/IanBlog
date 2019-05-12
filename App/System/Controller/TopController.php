<?php

namespace App\System\Controller;

use App\Infrastructure\Presenter\Pages\TopPagePresenter;
use Core\Controller\Controller;
use Core\Di\DiContainer as Di;

class TopController extends Controller {

    public function getTopPage() {
        /** @var TopPagePresenter $presenter */
        $presenter = Di::get(TopPagePresenter::class);

        $this->view($presenter);
    }
}