<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Cities;
use App\Services;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     function getCities() {
       return response()->json(["status" => 0, "cities" => Cities::with(['Services'])->get()], 200);
    }

    function getServiceData($serviceID) {
      $service = Services::where('id', $serviceID)->first();
      $path = storage_path() . "/json/" . $service->name . ".json";
      $json = json_decode(file_get_contents($path), true);

      $client = new \GuzzleHttp\Client();

      $request = $client->request('GET', 'https://thereportoftheweek-api.herokuapp.com/reports');
      $data = json_decode($request->getBody()->getContents());

      return response()->json(["status" => 0, "data" => $data, "json" => $json], 200);
   }
}
