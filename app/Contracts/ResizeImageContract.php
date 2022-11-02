<?php

namespace App\Contracts;

interface ResizeImageContract
{
    public function __invoke(string $resize_api_key): void;
}
