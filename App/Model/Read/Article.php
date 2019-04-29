<?php

namespace App\Model\Read;

interface Article {

	public function id(): int;

	public function title(): string;

	public function content(): string;

	public function isPublished(): bool;
}