<?php

namespace App\Infrastructure\Presenter\Action;

use App\Service\UsecaseOutput\AttemptLoginOutput;
use Core\Presenter\BasicUrlPresenter;
use Core\Presenter\UrlPresenter;

class AttemptLoginPresenter implements UrlPresenter {

    use BasicUrlPresenter;

    private $info;

    public function __construct(AttemptLoginOutput $info) {
        $this->info = $info;
    }

    public function redirectUrl(): string {
        return $this->info->isNowLogin() ? '/admin' : '/login';
    }
}