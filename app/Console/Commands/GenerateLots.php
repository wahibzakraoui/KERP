<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Lot;

class GenerateLots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lot:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Lot number from day';

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
        //todo: checvk if day number exists
        $lot = new Lot();
        $lot->number = Carbon::now()->dayOfYear();
        $lot->save();
    }
}
