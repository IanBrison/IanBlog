<?php

namespace App\Infrastructure\Presenter\Action;

use App\Service\UsecaseOutput\AttemptLoginOutput;
use Core\Di\DiContainer as Di;
use Core\Presenter\BasicUrlPresenter;
use Core\Presenter\Url;
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

    public function present() {
        Di::get(Url::class)->present($this);
    }
}