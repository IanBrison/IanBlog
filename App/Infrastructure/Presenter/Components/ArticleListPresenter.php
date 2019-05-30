<?php

namespace App\Infrastructure\Presenter\Components;

use App\Model\Read\Article;
use App\Model\Read\Draft;
use App\Model\Read\Post;
use App\Model\Read\Thought;
use Core\Di\DiContainer as Di;
use Core\Presenter\BasicViewPresenter;
use Core\Presenter\ViewPresenter;
use Exception;

class ArticleListPresenter implements ViewPresenter {

    use BasicViewPresenter;

    private $template = 'components/article_list';

    private $articles;

    /**
     * ArticleListPresenter constructor.
     * @param array $articles
     */
    public function __construct(array $articles) {
        $this->articles = $articles;
    }

    public function getListItemPresenters(): array {
        $presenters = array_map(function(Article $article) {
            if ($article instanceof Post) {
                return Di::get(PostListItemPresenter::class, $article);
            } else if ($article instanceof Thought) {
                return Di::get(ThoughtListItemPresenter::class, $article);
            } else if ($article instanceof Draft) {
                return Di::get(DraftListItemPresenter::class, $article);
            }
            throw new Exception("Unexpected instance type of Article");
        }, $this->articles);
        return $presenters;
    }
}