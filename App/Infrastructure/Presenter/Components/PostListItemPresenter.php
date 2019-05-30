<?php

namespace App\Infrastructure\Presenter\Components;

use App\Model\Read\Post;
use Core\Presenter\BasicViewPresenter;
use Core\Presenter\ViewPresenter;

class PostListItemPresenter implements ViewPresenter {

    use BasicViewPresenter;

    private $template = 'components/post_list_item';

    private $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function getTitle(): string {
        return $this->post->title()->value();
    }

    public function getContent(): string {
        return $this->post->content()->value();
    }

    public function getPublishedAt(): string {
        return $this->post->publishedAt()->displayYYYY_MM_DD();
    }
}