<?php

namespace App\Service\Repository\Read;

use App\Model\Read\Draft;
use App\System\Exception\DataNotFoundException;

interface DraftRepository {

    /**
     * @param int $draftId
     * @return Draft
     * @throws DataNotFoundException
     */
    public function getById(int $draftId): Draft;
}