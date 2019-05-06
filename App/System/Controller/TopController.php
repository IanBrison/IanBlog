<?php

namespace App\System\Controller;

use App\Infrastructure\OutputPresenter\TopPagePresenter;
use Core\Controller\Controller;
use Core\Di\DiContainer as Di;

class TopController extends Controller {

    public function getTopPage() {
    	$presenter = Di::get(TopPagePresenter::class);
    	$this->view($presenter);
    }
}
