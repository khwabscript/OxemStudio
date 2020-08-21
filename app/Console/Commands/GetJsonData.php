<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetJsonData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get JSON data from categories.json and products.json and create or update database tables';

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
        return 0;
    }
}
