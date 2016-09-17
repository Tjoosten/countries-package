<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/user');

        dd($res->getBody());
    }
}
