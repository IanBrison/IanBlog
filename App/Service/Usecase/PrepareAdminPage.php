<?php

namespace App\Service\Usecase;

use App\Service\UsecaseOutput\PrepareAdminPageOutput;

interface PrepareAdminPage {

    public function execute(): PrepareAdminPageOutput;
}