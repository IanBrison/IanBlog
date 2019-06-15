<?php

namespace App\System\Controller;

use App\Infrastructure\Presenter\Pages\TopPagePresenter;
use Core\Controller\Controller;

class TopController extends Controller {

    public function getTopPage() {
        $presenter = new TopPagePresenter();

        $presenter->present();
    }
}