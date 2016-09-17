<?php

namespace Tjoosten\Countries\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Tjoosten\Countries\Database\Models\Country;

class CountryNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://restcountries.eu/rest/v1/all');

        // dd(\GuzzleHttp\json_decode($res->getBody()));

        foreach(json_decode($res->getBody()) as $country) {
            Country::create([
                'name' => $country->name,
                'tld'  => $country->topLevelDomain,
            ]);
        }
    }
}
