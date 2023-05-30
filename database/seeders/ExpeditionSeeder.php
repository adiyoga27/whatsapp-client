<?php

namespace Database\Seeders;

use App\Models\Expedition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpeditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            array(
                'expedition_code' => 'jne',
                'expedition_name' => 'Jalur Nugraha Ekakurir'
            ),
            array(
                'expedition_code' => 'pos',
                'expedition_name' => 'Pos Indonesia'
            ),
            array(
                'expedition_code' => 'tiki',
                'expedition_name' => 'Citra Van Titipan Kilat'
            ),
            array(
                'expedition_code' => 'rpx',
                'expedition_name' => 'RPX Holding'
            ),
            array(
                'expedition_code' => 'pandu',
                'expedition_name' => 'Pandu Logistics'
            ),
            array(
                'expedition_code' => 'wahana',
                'expedition_name' => 'Wahana Prestasi Logistik'
            ),
            array(
                'expedition_code' => 'sicepat',
                'expedition_name' => 'Sicepat Express'
            ),
            array(
                'expedition_code' => 'jnt',
                'expedition_name' => 'J&T Express'
            ),
            array(
                'expedition_code' => 'pahala',
                'expedition_name' => 'Pahala Kencana Express'
            ),
            array(
                'expedition_code' => 'sap',
                'expedition_name' => 'SAP Express'
            ),
            array(
                'expedition_code' => 'jet',
                'expedition_name' => 'JET Express'
            ),
            array(
                'expedition_code' => 'indah',
                'expedition_name' => 'Indah Logistic'
            ),
            array(
                'expedition_code' => 'dse',
                'expedition_name' => 'DSE Express'
            ),
            array(
                'expedition_code' => 'slis',
                'expedition_name' => 'Solusi Ekspres'
            ),
            array(
                'expedition_code' => 'first',
                'expedition_name' => 'First Logistics'
            ),
            array(
                'expedition_code' => 'ncs',
                'expedition_name' => 'Nusantara Card Semesta'
            ),
            array(
                'expedition_code' => 'star',
                'expedition_name' => 'Star Cargo'
            ),
            array(
                'expedition_code' => 'ninja',
                'expedition_name' => 'Ninja Xpress'
            ),
            array(
                'expedition_code' => 'lion',
                'expedition_name' => 'Lion Parcel'
            ),
            array(
                'expedition_code' => 'idl',
                'expedition_name' => 'IDL Cargo'
            ),
            array(
                'expedition_code' => 'rex',
                'expedition_name' => 'Royal Express Indonesia'
            ),
            array(
                'expedition_code' => 'ide',
                'expedition_name' => 'Indotirto Dana Ekspres'
            ),
            array(
                'expedition_code' => 'sentral',
                'expedition_name' => 'Sentral Cargo'
            ),
            array(
                'expedition_code' => 'anteraja',
                'expedition_name' => 'Anteraja'
            ),
            array(
                'expedition_code' => 'jtl',
                'expedition_name' => 'Jala Trans Logistic'
            )
        );

        foreach ($array as $val) {
            Expedition::query()->updateOrCreate([
                'code' => $val['expedition_code'],
                'name' => $val['expedition_name']
            ]);
        }
    }
}
