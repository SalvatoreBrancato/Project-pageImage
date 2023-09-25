<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\User;

class SuperAdminRegister extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'superadmin:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registra un superadmin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $username = $this->ask('Nome del superadmin');
        $email = $this->ask('Email del superadmin');
        $password = $this->ask('Password del superadmin');

        $user = User::createSuperAdmin($username, $email, $password);

        if (User::superAdminExists()) {
            $this->error('Esiste già un superadmin');
            return;
        }

       
        $this->info('Superadmin registrato');
        //return Command::SUCCESS;
    }
}
