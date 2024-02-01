<?php

namespace Database\Seeders;

use App\Models\Barangay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangays = [
            [
                'brgy_code' => '1130700001',
                'brgy_name' => 'Acacia',
            ],
            [
                'brgy_code' => '1130700002',
                'brgy_name' => 'Agdao',
            ],
            [
                'brgy_code' => '1130700003',
                'brgy_name' => 'Alambre',
            ],
            [
                'brgy_code' => '1130700004',
                'brgy_name' => 'Atan-Awe',
            ],
            [
                'brgy_code' => '1130700005',
                'brgy_name' => 'Bago Gallera',
            ],
            [
                'brgy_code' => '1130700006',
                'brgy_name' => 'Bago Oshiro',
            ],
            [
                'brgy_code' => '1130700007',
                'brgy_name' => 'Baguio',
            ],
            [
                'brgy_code' => '1130700009',
                'brgy_name' => 'Balengaeng',
            ],
            [
                'brgy_code' => '1130700010',
                'brgy_name' => 'Baliok',
            ],
            [
                'brgy_code' => '1130700012',
                'brgy_name' => 'Bangkas Heights',
            ],
            [
                'brgy_code' => '1130700013',
                'brgy_name' => 'Baracatan',
            ],
            [
                'brgy_code' => '1130700014',
                'brgy_name' => 'Bato',
            ],
            [
                'brgy_code' => '1130700015',
                'brgy_name' => 'Bayabas',
            ],
            [
                'brgy_code' => '1130700016',
                'brgy_name' => 'Biao Escuela',
            ],
            [
                'brgy_code' => '1130700017',
                'brgy_name' => 'Biao Guianga',
            ],
            [
                'brgy_code' => '1130700018',
                'brgy_name' => 'Biao Joaquin',
            ],
            [
                'brgy_code' => '1130700019',
                'brgy_name' => 'Binugao',
            ],
            [
                'brgy_code' => '1130700020',
                'brgy_name' => 'Bucana',
            ],
            [
                'brgy_code' => '1130700021',
                'brgy_name' => 'Buhangin',
            ],
            [
                'brgy_code' => '1130700022',
                'brgy_name' => 'Bunawan',
            ],
            [
                'brgy_code' => '1130700023',
                'brgy_name' => 'Cabantian',
            ],
            [
                'brgy_code' => '1130700024',
                'brgy_name' => 'Cadalian',
            ],
            [
                'brgy_code' => '1130700026',
                'brgy_name' => 'Calinan',
            ],
            [
                'brgy_code' => '1130700027',
                'brgy_name' => 'Callawa',
            ],
            [
                'brgy_code' => '1130700028',
                'brgy_name' => 'Camansi',
            ],
            [
                'brgy_code' => '1130700029',
                'brgy_name' => 'Carmen',
            ],
            [
                'brgy_code' => '1130700030',
                'brgy_name' => 'Catalunan Grande',
            ],
            [
                'brgy_code' => '1130700031',
                'brgy_name' => 'Catalunan Pequeño',
            ],
            [
                'brgy_code' => '1130700032',
                'brgy_name' => 'Catigan',
            ],
            [
                'brgy_code' => '1130700033',
                'brgy_name' => 'Cawayan',
            ],
            [
                'brgy_code' => '1130700034',
                'brgy_name' => 'Colosas',
            ],
            [
                'brgy_code' => '1130700035',
                'brgy_name' => 'Communal',
            ],
            [
                'brgy_code' => '1130700036',
                'brgy_name' => 'Crossing Bayabas',
            ],
            [
                'brgy_code' => '1130700037',
                'brgy_name' => 'Dacudao',
            ],
            [
                'brgy_code' => '1130700038',
                'brgy_name' => 'Dalag',
            ],
            [
                'brgy_code' => '1130700039',
                'brgy_name' => 'Dalagdag',
            ],
            [
                'brgy_code' => '1130700040',
                'brgy_name' => 'Daliao',
            ],
            [
                'brgy_code' => '1130700041',
                'brgy_name' => 'Daliaon Plantation',
            ],
            [
                'brgy_code' => '1130700042',
                'brgy_name' => 'Dominga',
            ],
            [
                'brgy_code' => '1130700043',
                'brgy_name' => 'Dumoy',
            ],
            [
                'brgy_code' => '1130700044',
                'brgy_name' => 'Eden',
            ],
            [
                'brgy_code' => '1130700045',
                'brgy_name' => 'Fatima',
            ],
            [
                'brgy_code' => '1130700047',
                'brgy_name' => 'Gatungan',
            ],
            [
                'brgy_code' => '1130700048',
                'brgy_name' => 'Gumalang',
            ],
            [
                'brgy_code' => '1130700049',
                'brgy_name' => 'Ilang',
            ],
            [
                'brgy_code' => '1130700050',
                'brgy_name' => 'Indangan',
            ],
            [
                'brgy_code' => '1130700051',
                'brgy_name' => 'Kilate',
            ],
            [
                'brgy_code' => '1130700052',
                'brgy_name' => 'Lacson',
            ],
            [
                'brgy_code' => '1130700053',
                'brgy_name' => 'Lamanan',
            ],
            [
                'brgy_code' => '1130700054',
                'brgy_name' => 'Lampianao',
            ],
            [
                'brgy_code' => '1130700055',
                'brgy_name' => 'Langub',
            ],
            [
                'brgy_code' => '1130700056',
                'brgy_name' => 'Alejandra Navarro',
            ],
            [
                'brgy_code' => '1130700057',
                'brgy_name' => 'Lizada',
            ],
            [
                'brgy_code' => '1130700058',
                'brgy_name' => 'Los Amigos',
            ],
            [
                'brgy_code' => '1130700059',
                'brgy_name' => 'Lubogan',
            ],
            [
                'brgy_code' => '1130700060',
                'brgy_name' => 'Lumiad',
            ],
            [
                'brgy_code' => '1130700061',
                'brgy_name' => 'Ma-a',
            ],
            [
                'brgy_code' => '1130700062',
                'brgy_name' => 'Mabuhay',
            ],
            [
                'brgy_code' => '1130700063',
                'brgy_name' => 'Magtuod',
            ],
            [
                'brgy_code' => '1130700064',
                'brgy_name' => 'Mahayag',
            ],
            [
                'brgy_code' => '1130700065',
                'brgy_name' => 'Malabog',
            ],
            [
                'brgy_code' => '1130700066',
                'brgy_name' => 'Malagos',
            ],
            [
                'brgy_code' => '1130700067',
                'brgy_name' => 'Malamba',
            ],
            [
                'brgy_code' => '1130700068',
                'brgy_name' => 'Manambulan',
            ],
            [
                'brgy_code' => '1130700069',
                'brgy_name' => 'Mandug',
            ],
            [
                'brgy_code' => '1130700070',
                'brgy_name' => 'Manuel Guianga',
            ],
            [
                'brgy_code' => '1130700071',
                'brgy_name' => 'Mapula',
            ],
            [
                'brgy_code' => '1130700072',
                'brgy_name' => 'Marapangi',
            ],
            [
                'brgy_code' => '1130700073',
                'brgy_name' => 'Marilog',
            ],
            [
                'brgy_code' => '1130700074',
                'brgy_name' => 'Matina Aplaya',
            ],
            [
                'brgy_code' => '1130700075',
                'brgy_name' => 'Matina Crossing',
            ],
            [
                'brgy_code' => '1130700077',
                'brgy_name' => 'Matina Pangi',
            ],
            [
                'brgy_code' => '1130700078',
                'brgy_name' => 'Matina Biao',
            ],
            [
                'brgy_code' => '1130700079',
                'brgy_name' => 'Mintal',
            ],
            [
                'brgy_code' => '1130700080',
                'brgy_name' => 'Mudiang',
            ],
            [
                'brgy_code' => '1130700081',
                'brgy_name' => 'Mulig',
            ],
            [
                'brgy_code' => '1130700082',
                'brgy_name' => 'New Carmen',
            ],
            [
                'brgy_code' => '1130700083',
                'brgy_name' => 'New Valencia',
            ],
            [
                'brgy_code' => '1130700086',
                'brgy_name' => 'Pampanga',
            ],
            [
                'brgy_code' => '1130700087',
                'brgy_name' => 'Panacan',
            ],
            [
                'brgy_code' => '1130700088',
                'brgy_name' => 'Panalum',
            ],
            [
                'brgy_code' => '1130700089',
                'brgy_name' => 'Pandaitan',
            ],
            [
                'brgy_code' => '1130700090',
                'brgy_name' => 'Pangyan',
            ],
            [
                'brgy_code' => '1130700091',
                'brgy_name' => 'Paquibato',
            ],
            [
                'brgy_code' => '1130700092',
                'brgy_name' => 'Paradise Embak',
            ],
            [
                'brgy_code' => '1130700097',
                'brgy_name' => 'Riverside',
            ],
            [
                'brgy_code' => '1130700098',
                'brgy_name' => 'Salapawan',
            ],
            [
                'brgy_code' => '1130700099',
                'brgy_name' => 'Salaysay',
            ],
            [
                'brgy_code' => '1130700100',
                'brgy_name' => 'San Isidro',
            ],
            [
                'brgy_code' => '1130700101',
                'brgy_name' => 'Sasa',
            ],
            [
                'brgy_code' => '1130700102',
                'brgy_name' => 'Sibulan',
            ],
            [
                'brgy_code' => '1130700104',
                'brgy_name' => 'Sirawan',
            ],
            [
                'brgy_code' => '1130700105',
                'brgy_name' => 'Sirib',
            ],
            [
                'brgy_code' => '1130700106',
                'brgy_name' => 'Suawan',
            ],
            [
                'brgy_code' => '1130700107',
                'brgy_name' => 'Subasta',
            ],
            [
                'brgy_code' => '1130700108',
                'brgy_name' => 'Sumimao',
            ],
            [
                'brgy_code' => '1130700110',
                'brgy_name' => 'Tacunan',
            ],
            [
                'brgy_code' => '1130700112',
                'brgy_name' => 'Tagakpan',
            ],
            [
                'brgy_code' => '1130700113',
                'brgy_name' => 'Tagluno',
            ],
            [
                'brgy_code' => '1130700114',
                'brgy_name' => 'Tagurano',
            ],
            [
                'brgy_code' => '1130700115',
                'brgy_name' => 'Talandang',
            ],
            [
                'brgy_code' => '1130700116',
                'brgy_name' => 'Talomo',
            ],
            [
                'brgy_code' => '1130700117',
                'brgy_name' => 'Talomo River',
            ],
            [
                'brgy_code' => '1130700118',
                'brgy_name' => 'Tamayong',
            ],
            [
                'brgy_code' => '1130700119',
                'brgy_name' => 'Tambobong',
            ],
            [
                'brgy_code' => '1130700120',
                'brgy_name' => 'Tamugan',
            ],
            [
                'brgy_code' => '1130700121',
                'brgy_name' => 'Tapak',
            ],
            [
                'brgy_code' => '1130700122',
                'brgy_name' => 'Tawan-tawan',
            ],
            [
                'brgy_code' => '1130700123',
                'brgy_name' => 'Tibuloy',
            ],
            [
                'brgy_code' => '1130700124',
                'brgy_name' => 'Tibungco',
            ],
            [
                'brgy_code' => '1130700125',
                'brgy_name' => 'Tigatto',
            ],
            [
                'brgy_code' => '1130700126',
                'brgy_name' => 'Toril',
            ],
            [
                'brgy_code' => '1130700127',
                'brgy_name' => 'Tugbok',
            ],
            [
                'brgy_code' => '1130700128',
                'brgy_name' => 'Tungakalan',
            ],
            [
                'brgy_code' => '1130700129',
                'brgy_name' => 'Ula',
            ],
            [
                'brgy_code' => '1130700131',
                'brgy_name' => 'Wangan',
            ],
            [
                'brgy_code' => '1130700133',
                'brgy_name' => 'Wines',
            ],
            [
                'brgy_code' => '1130700134',
                'brgy_name' => 'Barangay 1-A',
            ],
            [
                'brgy_code' => '1130700135',
                'brgy_name' => 'Barangay 2-A',
            ],
            [
                'brgy_code' => '1130700136',
                'brgy_name' => 'Barangay 3-A',
            ],
            [
                'brgy_code' => '1130700137',
                'brgy_name' => 'Barangay 4-A',
            ],
            [
                'brgy_code' => '1130700138',
                'brgy_name' => 'Barangay 5-A',
            ],
            [
                'brgy_code' => '1130700139',
                'brgy_name' => 'Barangay 6-A',
            ],
            [
                'brgy_code' => '1130700140',
                'brgy_name' => 'Barangay 7-A',
            ],
            [
                'brgy_code' => '1130700141',
                'brgy_name' => 'Barangay 8-A',
            ],
            [
                'brgy_code' => '1130700142',
                'brgy_name' => 'Barangay 9-A',
            ],
            [
                'brgy_code' => '1130700143',
                'brgy_name' => 'Barangay 10-A',
            ],
            [
                'brgy_code' => '1130700144',
                'brgy_name' => 'Barangay 11-B',
            ],
            [
                'brgy_code' => '1130700145',
                'brgy_name' => 'Barangay 12-B',
            ],
            [
                'brgy_code' => '1130700146',
                'brgy_name' => 'Barangay 13-B',
            ],
            [
                'brgy_code' => '1130700147',
                'brgy_name' => 'Barangay 14-B',
            ],
            [
                'brgy_code' => '1130700148',
                'brgy_name' => 'Barangay 15-B',
            ],
            [
                'brgy_code' => '1130700149',
                'brgy_name' => 'Barangay 16-B',
            ],
            [
                'brgy_code' => '1130700150',
                'brgy_name' => 'Barangay 17-B',
            ],
            [
                'brgy_code' => '1130700151',
                'brgy_name' => 'Barangay 18-B',
            ],
            [
                'brgy_code' => '1130700152',
                'brgy_name' => 'Barangay 19-B',
            ],
            [
                'brgy_code' => '1130700153',
                'brgy_name' => 'Barangay 20-B',
            ],
            [
                'brgy_code' => '1130700154',
                'brgy_name' => 'Barangay 21-C',
            ],
            [
                'brgy_code' => '1130700155',
                'brgy_name' => 'Barangay 22-C',
            ],
            [
                'brgy_code' => '1130700156',
                'brgy_name' => 'Barangay 23-C',
            ],
            [
                'brgy_code' => '1130700157',
                'brgy_name' => 'Barangay 24-C',
            ],
            [
                'brgy_code' => '1130700158',
                'brgy_name' => 'Barangay 25-C',
            ],
            [
                'brgy_code' => '1130700159',
                'brgy_name' => 'Barangay 26-C',
            ],
            [
                'brgy_code' => '1130700160',
                'brgy_name' => 'Barangay 27-C',
            ],
            [
                'brgy_code' => '1130700161',
                'brgy_name' => 'Barangay 28-C',
            ],
            [
                'brgy_code' => '1130700162',
                'brgy_name' => 'Barangay 29-C',
            ],
            [
                'brgy_code' => '1130700163',
                'brgy_name' => 'Barangay 30-C',
            ],
            [
                'brgy_code' => '1130700164',
                'brgy_name' => 'Barangay 31-D',
            ],
            [
                'brgy_code' => '1130700165',
                'brgy_name' => 'Barangay 32-D',
            ],
            [
                'brgy_code' => '1130700166',
                'brgy_name' => 'Barangay 33-D',
            ],
            [
                'brgy_code' => '1130700167',
                'brgy_name' => 'Barangay 34-D',
            ],
            [
                'brgy_code' => '1130700168',
                'brgy_name' => 'Barangay 35-D',
            ],
            [
                'brgy_code' => '1130700169',
                'brgy_name' => 'Barangay 36-D',
            ],
            [
                'brgy_code' => '1130700170',
                'brgy_name' => 'Barangay 37-D',
            ],
            [
                'brgy_code' => '1130700171',
                'brgy_name' => 'Barangay 38-D',
            ],
            [
                'brgy_code' => '1130700172',
                'brgy_name' => 'Barangay 39-D',
            ],
            [
                'brgy_code' => '1130700173',
                'brgy_name' => 'Barangay 40-D',
            ],
            [
                'brgy_code' => '1130700174',
                'brgy_name' => 'Angalan',
            ],
            [
                'brgy_code' => '1130700175',
                'brgy_name' => 'Baganihan',
            ],
            [
                'brgy_code' => '1130700176',
                'brgy_name' => 'Bago Aplaya',
            ],
            [
                'brgy_code' => '1130700177',
                'brgy_name' => 'Bantol',
            ],
            [
                'brgy_code' => '1130700178',
                'brgy_name' => 'Buda',
            ],
            [
                'brgy_code' => '1130700179',
                'brgy_name' => 'Centro',
            ],
            [
                'brgy_code' => '1130700180',
                'brgy_name' => 'Datu Salumay',
            ],
            [
                'brgy_code' => '1130700181',
                'brgy_name' => 'Gov. Paciano Bangoy',
            ],
            [
                'brgy_code' => '1130700182',
                'brgy_name' => 'Gov. Vicente Duterte',
            ],
            [
                'brgy_code' => '1130700183',
                'brgy_name' => 'Gumitan',
            ],
            [
                'brgy_code' => '1130700184',
                'brgy_name' => 'Inayangan',
            ],
            [
                'brgy_code' => '1130700185',
                'brgy_name' => 'Kap. Tomas Monteverde, Sr.',
            ],
            [
                'brgy_code' => '1130700186',
                'brgy_name' => 'Lapu-lapu',
            ],
            [
                'brgy_code' => '1130700187',
                'brgy_name' => 'Leon Garcia, Sr.',
            ],
            [
                'brgy_code' => '1130700188',
                'brgy_name' => 'Magsaysay',
            ],
            [
                'brgy_code' => '1130700189',
                'brgy_name' => 'Megkawayan',
            ],
            [
                'brgy_code' => '1130700190',
                'brgy_name' => 'Rafael Castillo',
            ],
            [
                'brgy_code' => '1130700191',
                'brgy_name' => 'Saloy',
            ],
            [
                'brgy_code' => '1130700192',
                'brgy_name' => 'San Antonio',
            ],
            [
                'brgy_code' => '1130700193',
                'brgy_name' => 'Santo Niño',
            ],
            [
                'brgy_code' => '1130700194',
                'brgy_name' => 'Ubalde',
            ],
            [
                'brgy_code' => '1130700195',
                'brgy_name' => 'Waan',
            ],
            [
                'brgy_code' => '1130700196',
                'brgy_name' => 'Wilfredo Aquino',
            ],
            [
                'brgy_code' => '1130700197',
                'brgy_name' => 'Alfonso Angliongto Sr.',
            ],
            [
                'brgy_code' => '1130700198',
                'brgy_name' => 'Vicente Hizon Sr.',
            ],
        ];

        $faker = Faker::create();

        foreach ($barangays as $barangay) {
            Barangay::create([
                'brgy_code' => $barangay['brgy_code'],
                'brgy_name' => $barangay['brgy_name'],
                'dist_name' => $faker->word(),
                'cong_dist_name' => $faker->word(),
                'street_name' => $faker->word(),
            ]);
        }
    }
}
