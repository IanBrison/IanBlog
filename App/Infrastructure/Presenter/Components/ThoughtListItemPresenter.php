<?php

namespace App\Infrastructure\Presenter\Components;

use App\Model\Read\Thought;
use Core\Presenter\BasicViewPresenter;
use Core\Presenter\ViewPresenter;

class ThoughtListItemPresenter implements ViewPresenter {

    use BasicViewPresenter;

    private $template = 'components/thought_list_item';

    private $thought;

    public function __construct(Thought $thought) {
        $this->thought = $thought;
    }

    public function getTitle(): string {
        return $this->thought->title()->value();
    }

    public function getContent(): string {
        return $this->thought->content()->value();
    }

    public function getKey(): string {
        return $this->thought->key()->value();
    }

    public function getRenewedAt(): string {
        return $this->thought->renewedAt()->displayYYYY_MM_DD();
    }
}