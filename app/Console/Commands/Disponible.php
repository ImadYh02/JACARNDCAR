<?php

namespace App\Console\Commands;
use App\Models\Cars;
use Carbon\Carbon;
use IlluminateSupportCarbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class Disponible extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cars:dispo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if a car is dispo or not';

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
        // $dateNow = Carbon::now();
        // $cars = DB::select("SELECT * FROM cars WHERE id_car IN (SELECT id_car FROM orders WHERE '$dateNow' BETWEEN date_debut AND date_fin)");
        $cars = DB::select("SELECT * FROM cars WHERE id_car IN (SELECT id_car FROM orders WHERE '$dateNow' BETWEEN date_debut AND date_fin)");
        foreach ($cars as $car) {
            $car->update([
                "is_available" => 1
            ]);
        }
    }
}
