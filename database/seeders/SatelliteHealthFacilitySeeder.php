<?php

namespace Database\Seeders;

use App\Models\SatelliteHealthFacility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatelliteHealthFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Kencong",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.193481004117!2d113.38073589999999!3d-8.2835339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd662aab2008b7b%3A0x5fec41b65d55be62!2sPuskesmas%20Kencong!5e0!3m2!1sid!2sid!4v1711338882473!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Cakru",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.168789366515!2d113.33603389999999!3d-8.2859947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd662d535792d07%3A0xf2178a7c641333b0!2sPuskesmas%20Cakru!5e0!3m2!1sid!2sid!4v1711338845757!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509020',
                "name" => "Puskesmas Gumukmas",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.8466225871834!2d113.4167674!3d-8.318036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68587c398bcb7%3A0x9fab98b77c501c08!2sUPTD%20Puskesmas%20Gumukmas!5e0!3m2!1sid!2sid!4v1711337795506!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509020',
                "name" => "Puskesmas Tembokrejo Jember",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.272651175905!2d113.4313629!3d-8.275638799999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68880b5dee113%3A0x5276b59d225e7d31!2sPuskesmas%20Tembokrejo!5e0!3m2!1sid!2sid!4v1711337757346!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509030',
                "name" => "Puskesmas Puger",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63165.545961394935!2d113.41676740000003!3d-8.318036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd681535458125d%3A0x39e27426066dd93a!2sUPTD%20Puskesmas%20Puger!5e0!3m2!1sid!2sid!4v1711337711756!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509030',
                "name" => "Puskesmas Kasiyan",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63165.545961394935!2d113.41676740000003!3d-8.318036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6874554cb4ded%3A0x5e4ead0224b8fdbd!2sPuskesmas%20Kasiyan!5e0!3m2!1sid!2sid!4v1711336686880!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509040',
                "name" => "Puskesmas Wuluhan",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.646445010213!2d113.55226619999999!3d-8.3378832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68f9035061c23%3A0xe240e9dba61b8c61!2sPUSKESMAS%20Wuluhan!5e0!3m2!1sid!2sid!4v1711338910831!5m2!1sid!2sid",
            ],    
            [
                "district_id" => '3509040',
                "name" => "Puskesmas Lojejer",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.383897112883!2d113.50200389999999!3d-8.363843400000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6838cc9fcca33%3A0x4183df889332e4e5!2sPUSKESMAS%20Lojejer!5e0!3m2!1sid!2sid!4v1711338935615!5m2!1sid!2sid",
            ],    
            [
                "district_id" => '3509050',
                "name" => "Puskesmas Ambulu",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.54128328044!2d113.6082388!3d-8.348291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69b62d5f7e4a9%3A0x138d5d2e6d4c4df3!2sPuskesmas%20Ambulu!5e0!3m2!1sid!2sid!4v1711338971667!5m2!1sid!2sid",
            ],    
            [
                "district_id" => '3509050',
                "name" => "Puskesmas Sabrang",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.1995059492733!2d113.59696609999999!3d-8.382027899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd682b01b94ff99%3A0xa5ab2cc4f5f606a1!2sPUSKESMAS%20Sabrang!5e0!3m2!1sid!2sid!4v1711338996303!5m2!1sid!2sid",
            ],    
            [
                "district_id" => '3509050',
                "name" => "Puskesmas Andongsari",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.345325956969!2d113.65228440000001!3d-8.3676505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69c163b82ec57%3A0xf923a2c26c6853cf!2sPUSKESMAS%20Andongsari!5e0!3m2!1sid!2sid!4v1711339050269!5m2!1sid!2sid",
            ],    
            [
                "district_id" => '3509060',
                "name" => "Puskesmas Tempurejo",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.0384045646097!2d113.6831761!3d-8.298976999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69a3a94b38e49%3A0x4fda17e98ae830ec!2sPUSKESMAS%20Tempurejo!5e0!3m2!1sid!2sid!4v1711339082728!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509060',
                "name" => "Puskesmas Curahnongko",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.046820670011!2d113.73260920000001!3d-8.397056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69cf01779ee4b%3A0x91a4e1bd4efbd95d!2sPUSKESMAS%20Curah%20Nongko!5e0!3m2!1sid!2sid!4v1711339111451!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509070',
                "name" => "Puskesmas Silo I",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63186.48744596014!2d113.84337757910158!3d-8.187089600000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6bbebc528207d%3A0x5b044ec1542e10e1!2sUPTD.%20PUSKESMAS%20SILO%201!5e0!3m2!1sid!2sid!4v1711339152207!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509070',
                "name" => "Puskesmas Silo II",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.7111136134354!2d113.85059679999999!3d-8.231777799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6bc98e3d4ec65%3A0x23bd28fd5d8677fe!2sPUSKESMAS%20Silo%20II!5e0!3m2!1sid!2sid!4v1711339165400!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509080',
                "name" => "Puskesmas Mayang",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.234496356784!2d113.7998334!3d-8.1791161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6bdd77828130f%3A0xafd4d60c7227aaee!2sPuskesmas%20Mayang!5e0!3m2!1sid!2sid!4v1711339191033!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509090',
                "name" => "Puskesmas Mumbulsari",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.4554488744484!2d113.7458975!3d-8.257380999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd697f69bdffd61%3A0xbdec481daa0477a4!2sPuskesmas%20Mumbulsari!5e0!3m2!1sid!2sid!4v1711339214590!5m2!1sid!2sid",
            ],  
            [
                "district_id" => '3509100',
                "name" => "Puskesmas Jenggawah",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.3713585494143!2d113.64859820000001!3d-8.2657849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd690a0bd674abb%3A0xb4f1576b5f6ff695!2sPuskesmas%20Jenggawah!5e0!3m2!1sid!2sid!4v1711339241950!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509040',
                "name" => "Puskesmas Kemuningsari Kidul",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.0863104306013!2d113.62850189999999!3d-8.294209399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69a5b8fd0223b%3A0xd87b6b16dc64e6d0!2sPuskesmas%20Kemuningsari%20Kidul!5e0!3m2!1sid!2sid!4v1711339269077!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509110',
                "name" => "Puskesmas Ajung",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.6983177913535!2d113.65606419999999!3d-8.233061099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd690da7030c169%3A0x81d48e0a7923c479!2sPUSKESMAS%20Ajung!5e0!3m2!1sid!2sid!4v1711339301796!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509120',
                "name" => "Puskesmas Rambipuji",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.9227179589875!2d113.6044824!3d-8.210526999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd691bdba362fc1%3A0x31f41c31fdc19451!2sPuskesmas%20Rambipuji!5e0!3m2!1sid!2sid!4v1711339323772!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509120',
                "name" => "Puskesmas Nogosari Jember",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.4284656566383!2d113.5696122!3d-8.260078599999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68fe31e46787f%3A0xf99c1598a4ddf174!2sPuskesmas%20Nogosari!5e0!3m2!1sid!2sid!4v1711339367327!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509130',
                "name" => "Puskesmas Balung",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.3723656661437!2d113.54315469999999!3d-8.2656843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68f8dd567f793%3A0x2a39a59f9412d65f!2sPUSKESMAS%20Balung!5e0!3m2!1sid!2sid!4v1711339398870!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509130',
                "name" => "Puskesmas Karangduren",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.327865728645!2d113.49037109999999!3d-8.2701282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68f5a6f12c239%3A0x1d55353999f937d6!2sPUSKESMAS%20Karang%20Duren!5e0!3m2!1sid!2sid!4v1711339439790!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509140',
                "name" => "Puskesmas Umbulsari",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.428081490711!2d113.44859090000001!3d-8.260116999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68894bd21f29b%3A0x3545a165ac65e842!2sPUSKESMAS%20Umbulsari!5e0!3m2!1sid!2sid!4v1711339494487!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509140',
                "name" => "Puskesmas Paleran",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.7478787331556!2d113.4908023!3d-8.228089500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68edae5d144ef%3A0x2375c044586180a2!2sPuskesmas%20Paleran!5e0!3m2!1sid!2sid!4v1711339514807!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509150',
                "name" => "Puskesmas Semboro",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.8962379331283!2d113.4603596!3d-8.2131893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68946aee763c7%3A0x9790443249d33bbd!2sPuskesmas%20Semboro!5e0!3m2!1sid!2sid!4v1711339542107!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509160',
                "name" => "Puskesmas Jombang Jember",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.740295391629!2d113.31764360000001!3d-8.2288504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd663b8d7ae02b1%3A0x723dc7e2e4090ada!2sPUSKESMAS%20Jombang%20-%20Jember!5e0!3m2!1sid!2sid!4v1711339572993!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509170',
                "name" => "Puskesmas Sumberbaru",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.828515639504!2d113.39348609999999!3d-8.118936099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6f552bd23ea21%3A0xa19f3ed1b3b96c33!2sPUSKESMAS%20SUMBERBARU!5e0!3m2!1sid!2sid!4v1711339617180!5m2!1sid!2sid",
            ], 
            [
                "district_id" => '3509170',
                "name" => "Puskesmas Rowotengah",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3191168749026!2d113.3851064!3d-8.170570099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68a78324b44bf%3A0xd48c85122934ab99!2sPuskesmas%20Rowotengah!5e0!3m2!1sid!2sid!4v1711339645821!5m2!1sid!2sid",
            ],  

            // Lanjutkan data puskesmas no 31-135
            // Lanjutkan data puskesmas no 31-135
            // Lanjutkan data puskesmas no 31-135
            // Lanjutkan data puskesmas no 31-135
            // Lanjutkan data puskesmas no 31-135
            // Data diatas no 1-30


            [
                "district_id" => '3509010',
                "name" => "Puskesmas Cakru",
                "url_map" => "",
            ],  
            [
                "district_id" => '3509020',
                "name" => "Puskesmas Gumukmas",
                "url_map" => "3947.8466225871834!2d113.4167674!3d-8.318036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68587c398bcb7%3A0x9fab98b77c501c08!2sUPTD%20Puskesmas%20Gumukmas!5e0!3m2!1sid!2sid!4v1711337795506!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509020',
                "name" => "Puskesmas Tembokrejo Jember",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.272651175905!2d113.4313629!3d-8.275638799999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68880b5dee113%3A0x5276b59d225e7d31!2sPuskesmas%20Tembokrejo!5e0!3m2!1sid!2sid!4v1711337757346!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509030',
                "name" => "Puskesmas Puger",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63165.545961394935!2d113.41676740000003!3d-8.318036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd681535458125d%3A0x39e27426066dd93a!2sUPTD%20Puskesmas%20Puger!5e0!3m2!1sid!2sid!4v1711337711756!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509030',
                "name" => "Puskesmas Kasiyan",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63165.545961394935!2d113.41676740000003!3d-8.318036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6874554cb4ded%3A0x5e4ead0224b8fdbd!2sPuskesmas%20Kasiyan!5e0!3m2!1sid!2sid!4v1711336686880!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509040',
                "name" => "Puskesmas Wuluhan",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.646445010213!2d113.55226619999999!3d-8.3378832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68f9035061c23%3A0xe240e9dba61b8c61!2sPUSKESMAS%20Wuluhan!5e0!3m2!1sid!2sid!4v1711338910831!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509040',
                "name" => "Puskesmas Lojejer",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.383897112883!2d113.50200389999999!3d-8.363843400000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6838cc9fcca33%3A0x4183df889332e4e5!2sPUSKESMAS%20Lojejer!5e0!3m2!1sid!2sid!4v1711338935615!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509050',
                "name" => "Puskesmas Ambulu",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.54128328044!2d113.6082388!3d-8.348291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69b62d5f7e4a9%3A0x138d5d2e6d4c4df3!2sPuskesmas%20Ambulu!5e0!3m2!1sid!2sid!4v1711338971667!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509050',
                "name" => "Puskesmas Sabrang",
                "url_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.1995059492733!2d113.59696609999999!3d-8.382027899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd682b01b94ff99%3A0xa5ab2cc4f5f606a1!2sPUSKESMAS%20Sabrang!5e0!3m2!1sid!2sid!4v1711338996303!5m2!1sid!2sid",
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                "url_map" => "",
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                "url_map" => "sdfs",
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                "url_map" => "sdsdfs",
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                "url_map" => "",
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ],
            [
                "district_id" => '3509010',
                "name" => "Puskesmas Wuluhan",
                
            ]         
        ];

        foreach ($data as $key => $value) {
            SatelliteHealthFacility::create($value);
        }
    }
}