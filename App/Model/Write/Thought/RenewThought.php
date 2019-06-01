<?php

namespace App\Model\Write\Thought;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Date;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;

class RenewThought extends UpdateThought {

    private $renewedAt;

    public function __construct(int $id, Title $title, Content $content, Key $key) {
        parent::__construct($id, $title, $content, $key);
        $this->renewedAt = Date::now();
    }

    public function renewedAt(): Date {
        return $this->renewedAt;
    }
}