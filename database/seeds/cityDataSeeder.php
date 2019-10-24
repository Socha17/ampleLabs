<?php

use Illuminate\Database\Seeder;
use App\Cities;
use App\Services;
use App\City_services;

class cityDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new Cities();
        $city->name = "Toronto";
        $city->save();

        $city = new Cities();
        $city->name = "New York";
        $city->save();

        $city = new Cities();
        $city->name = "Vancouver";
        $city->save();

        $service = new Services();
        $service->name = "Shelter";
        $service->save();

        $service = new Services();
        $service->name = "Food";
        $service->save();

        $service = new Services();
        $service->name = "Clothing";
        $service->save();

        for ($i=1; $i < 4; $i++) {
          $cityService = new City_services();
          $cityService->city_id = $i;
          $cityService->service_id = $i;
          $cityService->save();
        }
    }
}
