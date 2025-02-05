<?php

namespace Code16\PintConfig\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class InstallCommand extends Command
{
    public $signature = 'pint-config:install';

    public $description = 'Install git hooks';

    public function handle(): int
    {
        if(app()->environment('local')) {
            $this->info('Installing git hooks...');

            if(! file_exists(base_path('pint.json'))) {
                symlink(
                    'vendor/code16/pint-config/pint.json',
                    base_path('pint.json')
                );
            }

            Process::run('git config core.hooksPath vendor/code16/pint-config/bin/hooks')->throw();

            $this->info('Pint config installed');
        }

        return self::SUCCESS;
    }
}
