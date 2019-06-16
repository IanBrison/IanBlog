<?php

namespace App\System\Controller;

use App\Infrastructure\Presenter\Pages\AdminPagePresenter;
use App\Service\DiContainer as Di;
use App\Service\Usecase\PrepareAdminPage;
use Core\Controller\Controller;

class AdminPageController extends Controller {

    public function getAdminPage() {
        /** @var PrepareAdminPage $usecase */
        $usecase = Di::get(PrepareAdminPage::class);

        $output = $usecase->execute();

        $presenter = new AdminPagePresenter($output);

        $presenter->present();
    }
}