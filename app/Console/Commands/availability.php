<?php

namespace App\Console\Commands;
use App\Models\Orders;
use Carbon\Carbon;
use IlluminateSupportCarbon;
use Illuminate\Console\Command;

class availability extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:paid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    // public function __construct()
    // {
    //     parent::__construct();
    // }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Orders::where('methode_py', 'cash')->get();
        foreach ($orders as $order) {
            // $date = $order['created_at'];
            // $date = Carbon::parse($date)->toDateString();
            // $date = Carbon::createFromFormat('Y.m.d', $order['created_at']);
            $date = $order['date_debut'];
            $dateNow = Carbon::now();
            // $date_1 = $date->add(1, 'day');
            // $daysToAdd = 1;
            if ($dateNow >= $date) {
                $order->update([
                    'methode_py' => 'cancelled'
                ]);
            }
            else {
                $order->update([
                    'methode_py' => 'cash'
                ]);
            }
        }
    }
}
