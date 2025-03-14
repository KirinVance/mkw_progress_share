<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Input\InputArgument;

class MakeEmptyDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:empty-db {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an empty database after dropping existing one with the same name';

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Database name'],
        ];
    }

    public function handle()
    {
        $dbName = $this->argument('name');

        if (!$dbName) {
            $this->error('Please provide a valid database name.');
            return 1;
        }

        try {
            $defaultDB = Config::get('database.connections.mysql');

            $pdo = new \PDO("mysql:host={$defaultDB['host']};port={$defaultDB['port']}", $defaultDB['username'], $defaultDB['password']);

            $pdo->exec("DROP DATABASE IF EXISTS `$dbName`;");
            $pdo->exec("CREATE DATABASE `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
            $this->info("Database '$dbName' created successfully.");

        } catch (\Exception $e) {
            $this->error("Error creating database: " . $e->getMessage());
            return true;
        }

        return false;
    }
}
