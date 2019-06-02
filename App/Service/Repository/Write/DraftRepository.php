<?php

namespace App\Service\Repository\Write;

use App\Model\Read\Draft;
use App\Model\Write\Draft\CreateDraft;
use App\Model\Write\Draft\UpdateDraft;

interface DraftRepository {

	public function create(CreateDraft $draft): Draft;

	public function update(UpdateDraft $draft): Draft;
}