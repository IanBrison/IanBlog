<?php

namespace App\Model\Read;

use App\Model\ValueObject\URL;

interface Image {

	public function id();

	public function url(): URL;
}