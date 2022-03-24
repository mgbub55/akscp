<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LgasTableSeeder extends Seeder
{

    public $base;

    public function __construct(Controller $base){
        $this->base = $base;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('lgas')->count() == 0){
            $this->seedLocalGovernment();
        }
    }

    public function seedLocalGovernment(){

        $time = Carbon::parse('UTC')->now();
        $lga = [

            [
                "id" => $this->base->generateUuid(),
                'name' => 'Abak',
                'code' => 'ABK',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Eket',
                'code' => 'KET',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Eastern Obolo',
                'code' => 'KRT',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Essien Udim',
                'code' => 'AFH',
                'created_at' => $time,
                'updated_at' => $time
            ],

            [
                "id" => $this->base->generateUuid(),
                'name' => 'Etim Ekpo',
                'code' => 'AEE',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Etinan',
                'code' => 'ETN',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Esit Eket',
                'code' => 'AUQ',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Ibeno',
                'code' => 'PNG',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Ibesikpo Asutan',
                'code' => 'NGD',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Ibiono Ibom',
                'code' => 'BMT',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'IKA',
                'code' => 'NYA',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Ikono',
                'code' => 'KKN',
                'created_at' => $time,
                'updated_at' => $time
            ],

            [
                "id" => $this->base->generateUuid(),
                'name' => 'Ikot Abasi',
                'code' => 'KTS',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Ikot Ekpene',
                'code' => 'KTE',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Ini',
                'code' => 'DRK',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Itu',
                'code' => 'TTU',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Mbo',
                'code' => 'ENW',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Mkpa Enin',
                'code' => 'MKP',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Nsit Atai',
                'code' => 'AED',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Nsit Ibom',
                'code' => 'AFG',
                'created_at' => $time,
                'updated_at' => $time
            ],

            [
                "id" => $this->base->generateUuid(),
                'name' => 'Nsit Ubium',
                'code' => 'KTD',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Obot Akara',
                'code' => 'AUQ',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Okobo',
                'code' => 'KPD',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Onna',
                'code' => 'ABT',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Oron',
                'code' => 'RNN',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Oruk Anam',
                'code' => 'KTM',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Udung Uko',
                'code' => 'KKN',
                'created_at' => $time,
                'updated_at' => $time
            ],

            [
                "id" => $this->base->generateUuid(),
                'name' => 'Ukanafun',
                'code' => 'KPK',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Uruan',
                'code' => 'DUU',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Urue offong/oruko',
                'code' => 'UFG',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => $this->base->generateUuid(),
                'name' => 'Uyo',
                'code' => 'UYY',
                'created_at' => $time,
                'updated_at' => $time
            ],
        ];

        DB::table('lgas')->insert($lga);

    }
}
