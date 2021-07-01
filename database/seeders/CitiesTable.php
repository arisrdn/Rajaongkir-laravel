<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request; //new Laravel HTTP Client
use Illuminate\Support\Facades\Http;
use App\Models\City;

class CitiesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();//kosongkan table

        $key = '35d76cc2082051fe822726a638c3a374';

        $getCities = Http::get("https://api.rajaongkir.com/starter/city", [
            'key' => $key
        ]);
        $cities = $getCities['rajaongkir']['results'];

        foreach($cities as $city){
            $data[] = [
                'id' => $city['city_id'],
                'city_name' => $city['city_name'],
                'province_id' => $city['province_id'],
                'type' => $city['type'],
                'postal_code' => $city['postal_code'],
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        City::insert($data);
    }

     //function untuk get data province and city
    private function getData($key,$url){
        return Http::withHeaders([
            'key' => $key
        ])->get($url);
    }
}