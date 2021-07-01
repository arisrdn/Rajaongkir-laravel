<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request; //new Laravel HTTP Client
use Illuminate\Support\Facades\Http;
use App\Models\Province;

class ProvinceTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::truncate();//kosongkan table

        $key = '35d76cc2082051fe822726a638c3a374'; 

        //logic untuk get province 
        $getProvinces = Http::get("https://api.rajaongkir.com/starter/province", [
            'key' => $key
        ]);
        $provinces = $getProvinces['rajaongkir']['results'];

        foreach($provinces as $province){
            $data[] = [
                'id' => $province['province_id'],
                'province' => $province['province'],
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        Province::insert($data);
    }

     //function untuk get data province and city
    private function getData($key,$url){
        return Http::withHeaders([
            'key' => $key
        ])->get($url);
    }
}