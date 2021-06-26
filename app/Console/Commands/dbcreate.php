<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {connecton?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MySQL database based on the database config file or the provided name';

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
        $env = config('app.env');
        $connection = "database.connections.mysql";
        // $connection .= $this->argument("connection");

        if($env === 'test') {
            $connection .= "_testing";
        }
        $schemaName = config("$connection.database");
        $charset = config("$connection.charset",'utf8mb4');
        $collation = config("$connection.collation",'utf8mb4_unicode_ci');

        config(["$connection.database" => null]);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

        $ok = DB::statement($query);

        config(["$connection.database" => $schemaName]);

        $message = "Database $schemaName created successfully!";
        if(!$ok) {
            $message = "Database $schemaName creation went wrong!";
        }
        
        $this->info($message);

        return 0;
    }
}
