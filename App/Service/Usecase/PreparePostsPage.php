<?php

namespace App\Service\Usecase;

use App\Service\UsecaseOutput\PreparePostsPageOutput;

interface PreparePostsPage {

    public function execute(): PreparePostsPageOutput;
}