<?php

namespace App\Http\Middleware;

use Closure;
use App\License;

class LicenseChecker
{
    private $license;

    public function __construct(License $license)
    {
        $this->license = $license;
    }

    public function handle($request, Closure $next)
    {
        // if ($this->license->shouldRecheck()) {
        //     $this->license->recheck();
        // }

        // if ($this->license->shouldCreateLicense()) {
        //     return redirect()->route('license.create');
        // }

        return $next($request);
    }
}
