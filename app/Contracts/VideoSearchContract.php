<?php

namespace App\Contracts;

interface VideoSearchContract
{
    public function search(string $category): array;
}