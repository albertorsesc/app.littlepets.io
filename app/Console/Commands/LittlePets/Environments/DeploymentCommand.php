<?php

namespace App\Console\Commands\LittlePets\Environments;

use Illuminate\Console\Command;
use App\Console\Commands\LittlePets\CommandTrait;

class DeploymentCommand extends Command
{
    use CommandTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'littlepets:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Executes deployment commands for production.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->setColor('blue');
        $this->setColor('green');

        $this->newLine();

        $this->info('<blue>-- Deploying Production Environment --</blue>');

        $this->newLine();

        $this->call('migrate', ['--force']);

        $this->line('<green>-- Installing Composer Dependencies --</green>');
        exec('composer install --no-interaction --prefer-dist --optimize-autoloader');
        exec('composer dump-autoload');

        $this->line('<green>-- Installing NPM Dependencies --</green>');
        exec('npm install');
        exec('npm run prod');

        $this->line('<green>-- Cleaning Cache --</green>');
        $this->call('optimize:clear');
        $this->call('optimize');
        $this->call('event:clear');
        $this->call('event:cache');

        $this->newLine();

        $this->info('<blue>-- LittlePets: Production Deployed! --</blue>');
    }
}
