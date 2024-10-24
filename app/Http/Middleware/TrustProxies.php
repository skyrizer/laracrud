<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\TrustProxies as BaseTrustProxies;


class TrustProxies extends BaseTrustProxies
{
    protected $proxies = '*';

    protected $headers = Request::HEADER_X_FORWARDED_FOR; // or HEADER_X_FORWARDED_HOST
}