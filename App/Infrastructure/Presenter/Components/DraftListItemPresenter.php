<?php

namespace App\Infrastructure\Presenter\Components;

use App\Model\Read\Draft;
use Core\Presenter\BasicViewPresenter;
use Core\Presenter\ViewPresenter;

class DraftListItemPresenter implements ViewPresenter {

    use BasicViewPresenter;

    private $template = 'components/draft_list_item';

    private $draft;

    public function __construct(Draft $draft) {
        $this->draft = $draft;
    }

    public function getTitle(): string {
        return $this->draft->title()->value();
    }

    public function getContent(): string {
        return $this->draft->content()->value();
    }
}