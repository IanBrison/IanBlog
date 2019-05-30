<?php

namespace App\System\Controller;

use App\Infrastructure\Presenter\Pages\AdminPagePresenter;
use App\Service\Usecase\PrepareAdminPage;
use Core\Controller\Controller;

class AdminPageController extends Controller {

    public function getAdminPage() {
        $usecase = new PrepareAdminPage();

        $output = $usecase->execute();

        $presenter = new AdminPagePresenter($output);

        $presenter->isAuthenticated() ?
            $this->view($presenter) : $this->url($presenter);
    }
}