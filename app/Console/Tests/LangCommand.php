<?php

namespace App\Console\Tests;

use App\Helpers\Lang\Lang;
use Illuminate\Console\Command;

class LangCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export.test.lang';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        Lang::init(true,'en');
        echo Lang::get('passwords.user');
    }
}
