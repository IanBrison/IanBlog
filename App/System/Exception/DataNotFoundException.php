<?php

namespace App\System\Exception;

use Core\Exception\BravelException;

class DataNotFoundException extends \Exception implements BravelException {

	public function handle($isDebugMode) {}
}