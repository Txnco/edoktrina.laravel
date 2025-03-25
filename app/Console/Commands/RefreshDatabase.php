<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the database and seed roles, permissions and test user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Refreshing the database...');
        $this->call('migrate:fresh');

        $this->info('Seeding roles and permissions...');
        $this->call('db:seed', ['--class' => 'RolesAndPermissionsSeeder']);

        $this->info('Seeding users...');
        $this->call('db:seed', ['--class' => 'DatabaseSeeder']);

      

        $this->info('Database refreshed and roles/permissions seeded successfully!');
        return Command::SUCCESS;
    }
}
