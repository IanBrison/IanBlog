<?php

namespace App\Service\UsecaseInput;

interface UpdatePostInput {

    public function getPostId(): int;

    public function getTitleInput(): string;

    public function getContentInput(): string;
}