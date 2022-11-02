<?php

namespace App\Providers;

use App\Actions\ResizeImageAction;
use App\Contracts\ResizeImageContract;
use Carbon\Laravel\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public $bindings = [

        ResizeImageContract::class => ResizeImageAction::class,
    ];
}
