<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user';

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
        $adminRole = Role::where('slug', 'admin')->first();

        if (!$adminRole) {
            $this->error('Role "admin" does not exist.');
            return 1;
        }

        User::create([
            'name' => 'Admin',
            'email' => $this->argument('email'),
            'password' => Hash::make($this->argument('password')),
            'role_id' => $adminRole->id
        ]);

        $this->info('Admin user created successfully!');
        return 0;
    }
}
