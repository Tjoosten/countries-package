<?php

namespace Tjoosten\Countries\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Tjoosten\Countries\Database\Models\Country;
use Tjoosten\Countries\Database\Models\TopLevelDomains;

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
        $apiCall = json_decode($res->getBody());

        // dd(\GuzzleHttp\json_decode($res->getBody()));

        foreach($apiCall as $country) {

            // Country insert
            $countryInsert = Country::create([
                'name' => $country->name,
            ]);

            // TLD Insert
            foreach($country->topLevelDomain as $tld) {
                $tldInsert = TopLevelDomains::create(['tld' => $tld]);
                Country::find($countryInsert->id)->tld()->attach($tldInsert->id);
            }
        }
    }
}
