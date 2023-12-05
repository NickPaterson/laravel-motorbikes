<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DvlaController extends Controller
{
    public function index() 
    {
        return view('pages/dvla-test', [
            'dvlaJSON' => '',
        ]);
    }

    public function getVehicleInfo(Request $request) 
    {
        //dd($request);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\n\t\"registrationNumber\": \"$request->registration\"\n}",
        CURLOPT_HTTPHEADER => array(
            "x-api-key: " . $_ENV['DVLA_API_KEY'],
            "Content-Type: application/json"
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        
        $dvlaData = json_decode($response, true);
        //dd($dvlaData);
        return back()->with([
            'dvlaData' => $dvlaData,
        ]);
    }
}
