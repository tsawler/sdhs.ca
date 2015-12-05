<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,

        \Tsawler\Vcms5\Middleware\SetLanguageMiddleware::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        'auth.admin'     => \Tsawler\Vcms5\Middleware\RedirectIfNotAdminMiddleware::class,
        'auth.pages'     => \Tsawler\Vcms5\Middleware\RedirectIfNotPagesAdminMiddleware::class,
        'auth.blogs'     => \Tsawler\Vcms5\Middleware\RedirectIfNotBlogsAdminMiddleware::class,
        'auth.events'    => \Tsawler\Vcms5\Middleware\RedirectIfNotEventsAdminMiddleware::class,
        'auth.news'      => \Tsawler\Vcms5\Middleware\RedirectIfNotNewsAdminMiddleware::class,
        'auth.faqs'      => \Tsawler\Vcms5\Middleware\RedirectIfNotFaqsAdminMiddleware::class,
        'auth.galleries' => \Tsawler\Vcms5\Middleware\RedirectIfNotGalleriesAdminMiddleware::class,
        'auth.menus'     => \Tsawler\Vcms5\Middleware\RedirectIfNotMenusAdminMiddleware::class,
        'auth.users'     => \Tsawler\Vcms5\Middleware\RedirectIfNotUsersAdminMiddleware::class,
    ];
}
