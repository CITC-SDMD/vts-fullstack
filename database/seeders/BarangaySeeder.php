<?php

namespace Database\Seeders;

use App\Models\Barangay;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700002',
                'brgy_name' => 'Agdao',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700003',
                'brgy_name' => 'Alambre',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700004',
                'brgy_name' => 'Atan-Awe',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700005',
                'brgy_name' => 'Bago Gallera',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700006',
                'brgy_name' => 'Bago Oshiro',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700007',
                'brgy_name' => 'Baguio',
                'dist_name' => 'Baguio District',
            ],
            [
                'brgy_code' => '1130700009',
                'brgy_name' => 'Balengaeng',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700010',
                'brgy_name' => 'Baliok',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700012',
                'brgy_name' => 'Bankas Heights',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700013',
                'brgy_name' => 'Baracatan',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700014',
                'brgy_name' => 'Bato',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700015',
                'brgy_name' => 'Bayabas',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700016',
                'brgy_name' => 'Biao Escuela',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700017',
                'brgy_name' => 'Biao Guianga',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700018',
                'brgy_name' => 'Biao Joaquin',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700019',
                'brgy_name' => 'Binugao',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700020',
                'brgy_name' => 'Bucana',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700021',
                'brgy_name' => 'Buhangin',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700022',
                'brgy_name' => 'Bunawan',
                'dist_name' => 'Bunawan District',
            ],
            [
                'brgy_code' => '1130700023',
                'brgy_name' => 'Cabantian',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700024',
                'brgy_name' => 'Cadalian',
                'dist_name' => 'Baguio District',
            ],
            [
                'brgy_code' => '1130700026',
                'brgy_name' => 'Calinan',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700027',
                'brgy_name' => 'Callawa',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700028',
                'brgy_name' => 'Camansi',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700029',
                'brgy_name' => 'Carmen',
                'dist_name' => 'Baguio District',
            ],
            [
                'brgy_code' => '1130700030',
                'brgy_name' => 'Catalunan Grande',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700031',
                'brgy_name' => 'Catalunan Pequeño',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700032',
                'brgy_name' => 'Catigan',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700033',
                'brgy_name' => 'Cawayan',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700034',
                'brgy_name' => 'Colosas',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700035',
                'brgy_name' => 'Communal',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700036',
                'brgy_name' => 'Crossing Bayabas',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700037',
                'brgy_name' => 'Dacudao',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700038',
                'brgy_name' => 'Dalag',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700039',
                'brgy_name' => 'Dalagdag',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700040',
                'brgy_name' => 'Daliao',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700041',
                'brgy_name' => 'Daliaon Plantation',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700042',
                'brgy_name' => 'Dominga',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700043',
                'brgy_name' => 'Dumoy',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700044',
                'brgy_name' => 'Eden',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700045',
                'brgy_name' => 'Fatima',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700047',
                'brgy_name' => 'Gatungan',
                'dist_name' => 'Bunawan District',
            ],
            [
                'brgy_code' => '1130700048',
                'brgy_name' => 'Gumalang',
                'dist_name' => 'Baguio District',
            ],
            [
                'brgy_code' => '1130700049',
                'brgy_name' => 'Ilang',
                'dist_name' => 'Bunawan District',
            ],
            [
                'brgy_code' => '1130700050',
                'brgy_name' => 'Indangan',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700051',
                'brgy_name' => 'Kilate',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700052',
                'brgy_name' => 'Lacson',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700053',
                'brgy_name' => 'Lamanan',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700054',
                'brgy_name' => 'Lampianao',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700055',
                'brgy_name' => 'Langub',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700056',
                'brgy_name' => 'Alejandra Navarro',
                'dist_name' => 'Bunawan District',
            ],
            [
                'brgy_code' => '1130700057',
                'brgy_name' => 'Lizada',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700058',
                'brgy_name' => 'Los Amigos',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700059',
                'brgy_name' => 'Lubogan',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700060',
                'brgy_name' => 'Lumiad',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700061',
                'brgy_name' => 'Ma-a',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700062',
                'brgy_name' => 'Mabuhay',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700063',
                'brgy_name' => 'Magtuod',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700064',
                'brgy_name' => 'Mahayag',
                'dist_name' => 'Bunawan District',
            ],
            [
                'brgy_code' => '1130700065',
                'brgy_name' => 'Malabog',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700066',
                'brgy_name' => 'Malagos',
                'dist_name' => 'Baguio District',
            ],
            [
                'brgy_code' => '1130700067',
                'brgy_name' => 'Malamba',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700068',
                'brgy_name' => 'Manambulan',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700069',
                'brgy_name' => 'Mandug',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700070',
                'brgy_name' => 'Manuel Guianga',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700071',
                'brgy_name' => 'Mapula',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700072',
                'brgy_name' => 'Marapangi',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700073',
                'brgy_name' => 'Marilog',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700074',
                'brgy_name' => 'Matina Aplaya',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700075',
                'brgy_name' => 'Matina Crossing',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700077',
                'brgy_name' => 'Matina Pangi',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700078',
                'brgy_name' => 'Matina Biao',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700079',
                'brgy_name' => 'Mintal',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700080',
                'brgy_name' => 'Mudiang',
                'dist_name' => 'Bunawan District',
            ],
            [
                'brgy_code' => '1130700081',
                'brgy_name' => 'Mulig',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700082',
                'brgy_name' => 'New Carmen',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700083',
                'brgy_name' => 'New Valencia',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700086',
                'brgy_name' => 'Pampanga',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700087',
                'brgy_name' => 'Panacan',
                'dist_name' => 'Bunawan District',
            ],
            [
                'brgy_code' => '1130700088',
                'brgy_name' => 'Panalum',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700089',
                'brgy_name' => 'Pandaitan',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700090',
                'brgy_name' => 'Pangyan',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700091',
                'brgy_name' => 'Paquibato',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700092',
                'brgy_name' => 'Paradise Embac',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700097',
                'brgy_name' => 'Riverside',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700098',
                'brgy_name' => 'Salapawan',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700099',
                'brgy_name' => 'Salaysay',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700100',
                'brgy_name' => 'San Isidro',
                'dist_name' => 'Bunawan District',
            ],
            [
                'brgy_code' => '1130700101',
                'brgy_name' => 'Sasa',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700102',
                'brgy_name' => 'Sibulan',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700104',
                'brgy_name' => 'Sirawan',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700105',
                'brgy_name' => 'Sirib',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700106',
                'brgy_name' => 'Suawan',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700107',
                'brgy_name' => 'Subasta',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700108',
                'brgy_name' => 'Sumimao',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700110',
                'brgy_name' => 'Tacunan',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700112',
                'brgy_name' => 'Tagakpan',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700113',
                'brgy_name' => 'Tagluno',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700114',
                'brgy_name' => 'Tagurano',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700115',
                'brgy_name' => 'Talandang',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700116',
                'brgy_name' => 'Talomo',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700117',
                'brgy_name' => 'Talomo River',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700118',
                'brgy_name' => 'Tamayong',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700119',
                'brgy_name' => 'Tambobong',
                'dist_name' => 'Baguio District',
            ],
            [
                'brgy_code' => '1130700120',
                'brgy_name' => 'Tamugan',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700121',
                'brgy_name' => 'Tapak',
                'dist_name' => 'Paquibato District',
            ],
            [
                'brgy_code' => '1130700122',
                'brgy_name' => 'Tawan-tawan',
                'dist_name' => 'Baguio District',
            ],
            [
                'brgy_code' => '1130700123',
                'brgy_name' => 'Tibuloy',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700124',
                'brgy_name' => 'Tibungco',
                'dist_name' => 'Bunawan District',
            ],
            [
                'brgy_code' => '1130700125',
                'brgy_name' => 'Tigatto',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700126',
                'brgy_name' => 'Toril',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700127',
                'brgy_name' => 'Tugbok',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700128',
                'brgy_name' => 'Tungkalan',
                'dist_name' => 'Toril District',
            ],
            [
                'brgy_code' => '1130700129',
                'brgy_name' => 'Ula',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700131',
                'brgy_name' => 'Wangan',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700133',
                'brgy_name' => 'Wines',
                'dist_name' => 'Baguio District',
            ],
            [
                'brgy_code' => '1130700134',
                'brgy_name' => 'Barangay 1-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700135',
                'brgy_name' => 'Barangay 2-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700136',
                'brgy_name' => 'Barangay 3-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700137',
                'brgy_name' => 'Barangay 4-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700138',
                'brgy_name' => 'Barangay 5-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700139',
                'brgy_name' => 'Barangay 6-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700140',
                'brgy_name' => 'Barangay 7-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700141',
                'brgy_name' => 'Barangay 8-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700142',
                'brgy_name' => 'Barangay 9-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700143',
                'brgy_name' => 'Barangay 10-A',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700144',
                'brgy_name' => 'Barangay 11-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700145',
                'brgy_name' => 'Barangay 12-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700146',
                'brgy_name' => 'Barangay 13-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700147',
                'brgy_name' => 'Barangay 14-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700148',
                'brgy_name' => 'Barangay 15-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700149',
                'brgy_name' => 'Barangay 16-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700150',
                'brgy_name' => 'Barangay 17-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700151',
                'brgy_name' => 'Barangay 18-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700152',
                'brgy_name' => 'Barangay 19-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700153',
                'brgy_name' => 'Barangay 20-B',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700154',
                'brgy_name' => 'Barangay 21-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700155',
                'brgy_name' => 'Barangay 22-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700156',
                'brgy_name' => 'Barangay 23-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700157',
                'brgy_name' => 'Barangay 24-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700158',
                'brgy_name' => 'Barangay 25-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700159',
                'brgy_name' => 'Barangay 26-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700160',
                'brgy_name' => 'Barangay 27-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700161',
                'brgy_name' => 'Barangay 28-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700162',
                'brgy_name' => 'Barangay 29-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700163',
                'brgy_name' => 'Barangay 30-C',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700164',
                'brgy_name' => 'Barangay 31-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700165',
                'brgy_name' => 'Barangay 32-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700166',
                'brgy_name' => 'Barangay 33-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700167',
                'brgy_name' => 'Barangay 34-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700168',
                'brgy_name' => 'Barangay 35-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700169',
                'brgy_name' => 'Barangay 36-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700170',
                'brgy_name' => 'Barangay 37-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700171',
                'brgy_name' => 'Barangay 38-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700172',
                'brgy_name' => 'Barangay 39-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700173',
                'brgy_name' => 'Barangay 40-D',
                'dist_name' => 'Poblacion District',
            ],
            [
                'brgy_code' => '1130700174',
                'brgy_name' => 'Angalan',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700175',
                'brgy_name' => 'Baganihan',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700176',
                'brgy_name' => 'Bago Aplaya',
                'dist_name' => 'Talomo District',
            ],
            [
                'brgy_code' => '1130700177',
                'brgy_name' => 'Bantol',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700178',
                'brgy_name' => 'Buda',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700179',
                'brgy_name' => 'Centro',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700180',
                'brgy_name' => 'Datu Salumay',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700181',
                'brgy_name' => 'Gov. Paciano Bangoy',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700182',
                'brgy_name' => 'Gov. Vicente Duterte',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700183',
                'brgy_name' => 'Gumitan',
                'dist_name' => 'Marilog District',
            ],
            [
                'brgy_code' => '1130700184',
                'brgy_name' => 'Inayangan',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700185',
                'brgy_name' => 'Kap. Tomas Monteverde, Sr.',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700186',
                'brgy_name' => 'Lapu-lapu',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700187',
                'brgy_name' => 'Leon Garcia, Sr.',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700188',
                'brgy_name' => 'Magsaysay',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700189',
                'brgy_name' => 'Megcawayan',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700190',
                'brgy_name' => 'Rafael Castillo',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700191',
                'brgy_name' => 'Saloy',
                'dist_name' => 'Calinan District',
            ],
            [
                'brgy_code' => '1130700192',
                'brgy_name' => 'San Antonio',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700193',
                'brgy_name' => 'Santo Niño',
                'dist_name' => 'Tugbok District',
            ],
            [
                'brgy_code' => '1130700194',
                'brgy_name' => 'Ubalde',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700195',
                'brgy_name' => 'Waan',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700196',
                'brgy_name' => 'Wilfredo Aquino',
                'dist_name' => 'Agdao District',
            ],
            [
                'brgy_code' => '1130700197',
                'brgy_name' => 'Alfonso Angliongto Sr.',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '1130700198',
                'brgy_name' => 'Vicente Hizon Sr.',
                'dist_name' => 'Buhangin District',
            ],
            [
                'brgy_code' => '0000000000',
                'brgy_name' => 'Outside Davao City',
            ],
        ];

        $faker = Faker::create();

        foreach ($barangays as $barangay) {
            Barangay::create([
                'brgy_code' => $barangay['brgy_code'],
                'brgy_name' => $barangay['brgy_name'],
                'dist_name' => $barangay['dist_name'],
                'cong_dist_name' => $faker->word(),
                'street_name' => $faker->word(),
            ]);
        }
    }
}
