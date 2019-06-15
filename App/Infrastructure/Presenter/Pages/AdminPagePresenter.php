<?php

namespace App\Infrastructure\Presenter\Pages;

use App\Infrastructure\Presenter\Components\ArticleListPresenter;
use App\Service\UsecaseOutput\PrepareAdminPageOutput;
use Core\Di\DiContainer as Di;
use Core\Presenter\BasicUrlPresenter;
use Core\Presenter\BasicViewPresenter;
use Core\Presenter\Url;
use Core\Presenter\UrlPresenter;
use Core\Presenter\View;
use Core\Presenter\ViewPresenter;

class AdminPagePresenter implements ViewPresenter, UrlPresenter {

    use BasicViewPresenter, BasicUrlPresenter;

    private $template = 'pages/admin';
    private $redirectUrl = '/login';

    private $info;

    public function __construct(PrepareAdminPageOutput $info) {
        $this->info = $info;
    }

    public function isAuthenticated(): bool {
        return $this->info->isAuthenticated();
    }

    public function getArticleListPresenter(): ArticleListPresenter {
        return Di::get(ArticleListPresenter::class, $this->info->getArticles());
    }

    public function present() {
        $this->isAuthenticated() ?
            Di::get(View::class)->present($this) :
            Di::get(Url::class)->present($this);
    }
}