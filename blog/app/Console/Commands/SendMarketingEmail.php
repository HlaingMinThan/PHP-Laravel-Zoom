<?php

namespace App\Console\Commands;

use App\Mail\MarketingMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMarketingEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:marketing';

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
     * @return int
     */
    public function handle()
    {
        Mail::to('user1@gmail.com')->queue(new MarketingMail());
    }
}
