<?php

use App\Calendario;
use Illuminate\Database\Seeder;

class CalendariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Calendario::class, 100)->create();
    }
}
