<?php

namespace App\Service\Usecase;

use App\Service\UsecaseOutput\PrepareThoughtsPageOutput;

interface PrepareThoughtsPage {

    public function execute(): PrepareThoughtsPageOutput;
}