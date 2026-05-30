<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

abstract class BaseAdminController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware(function ($request, $next) {
                abort_unless($request->user()?->is_admin, 403);

                return $next($request);
            }),
        ];
    }
}
