<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Draft;

interface CreateDraftOutput {

	public function __construct(int $errorCode, ?Draft $draft = null);
}