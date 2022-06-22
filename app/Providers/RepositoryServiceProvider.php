<?php

namespace App\Providers;

use App\Interfaces\CetakSuratKematianInterface;
use App\Repositories\CetakSuratKematianRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CetakSuratKematianInterface::class, CetakSuratKematianRepo::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
