<?php

namespace Modules\Account\Providers;

use Modules\Base\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $namespace = 'Modules\Account\Http\Controllers';
    protected $namespaces = 'Modules\Account\Http\Api';

    /**
     * Get public routes.
     *
     * @return string
     */
    protected function public()
    {
        return __DIR__ . '/../Routes/public.php';
    }
    protected function api()
    {
        return __DIR__ . '/../Routes/account_api.php';
    }
}
