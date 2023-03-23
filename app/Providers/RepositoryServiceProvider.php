<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\HomeRepositoryInterface;
use App\Repositories\HomeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Bind Interface and Repository class together
        $this->app->bind(HomeRepositoryInterface::class, HomeRepository::class);
    }
}
