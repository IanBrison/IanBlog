<?php

namespace App\Service\Repository\Write;

use App\Model\Read\Draft;
use App\Model\Write\Draft\CreateDraft;

interface DraftRepository {

	public function create(CreateDraft $draft): Draft;
}