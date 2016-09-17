<?php

namespace Tjoosten\Countries\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tjoosten\Countries\Database\Models\Country;
use Tjoosten\Countries\Database\Models\TopLevelDomains;

/**
 * Class CountryNameSeeder
 * @package Tjoosten\Countries\Database\Seeds
 */
class CountryNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Timezone support
        // TODO: Calling code support.
        // TODO: Capital support.
        // TODO: code ISO 3166-1 alpha-2 support
        // TODO: code ISO 3166-1 alpha-3 support

        // Truncate all the database tables.
        // -------------------------------------------------------------------------------------
        Schema::disableForeignKeyConstraints();
        $db = new DB();
        $db->table('countries')->delete();
        $db->table('country_top_level_domains')->delete();
        $db->table('top_level_domains')->delete();
        Schema::enableForeignKeyConstraints();

        // The api call for data.
        // -------------------------------------------------------------------------------------
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://restcountries.eu/rest/v1/all');
        $apiCall = json_decode($res->getBody());

        // dd(\GuzzleHttp\json_decode($res->getBody()));


        // Start with the data insert
        // -------------------------------------------------------------------------------------
        foreach($apiCall as $country) {

            // Country insert
            $countryInsert = Country::create([
                'name' => $country->name,
            ]);

            // TLD Insert
            foreach($country->topLevelDomain as $tld) {
                $statement = TopLevelDomains::where('tld', $tld);

                if ($statement->count() === 0) {
                    $tldInsert = TopLevelDomains::create(['tld' => $tld]);
                    Country::find($countryInsert->id)->tld()->attach($tldInsert->id);
                } else {
                    $tldData = $statement->get();
                    Country::find($countryInsert->id)->tld()->attach($tldData->id);

                }
            }
        }
    }
}
