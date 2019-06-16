<?php

namespace App\Service\Usecase;

use App\Service\UsecaseOutput\PrepareLoginPageOutput;

interface PrepareLoginPage {

    public function execute(): PrepareLoginPageOutput;
}