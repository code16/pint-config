<?php

namespace Code16\PintConfig;

use Illuminate\Support\ServiceProvider;

class PintConfigServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\InstallCommand::class,
                Commands\UninstallCommand::class,
            ]);
        }
    }
}
