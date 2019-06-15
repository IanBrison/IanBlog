<?php

namespace App\Infrastructure\Presenter\Pages;

use App\Infrastructure\InputConverter\AttemptLoginInput;
use App\Service\UsecaseOutput\PrepareLoginPageOutput;
use Core\Di\DiContainer as Di;
use Core\Presenter\BasicUrlPresenter;
use Core\Presenter\BasicViewPresenter;
use Core\Presenter\Url;
use Core\Presenter\UrlPresenter;
use Core\Presenter\View;
use Core\Presenter\ViewPresenter;

class LoginPagePresenter implements ViewPresenter, UrlPresenter {

	use BasicViewPresenter, BasicUrlPresenter;

	private $template = 'pages/login';
	private $redirectUrl = '/';

	private $info;

	public function __construct(PrepareLoginPageOutput $info) {
	    $this->info = $info;
    }

    public function isAlreadyLogin(): bool {
	    return $this->info->isAlreadyLogin();
    }

    public function attemptLoginUrl(): string {
		return '/login';
	}

	public function passwordFormName(): string {
	    return AttemptLoginInput::PASSWORD_INPUT_KEY;
    }

    public function present() {
        $this->isAlreadyLogin() ?
            Di::get(Url::class)->present($this) :
            Di::get(View::class)->present($this);
    }
}