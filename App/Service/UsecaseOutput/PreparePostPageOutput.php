<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Post;

interface PreparePostPageOutput {

	public function getPost(): Post;
}