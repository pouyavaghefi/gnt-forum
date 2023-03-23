<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            array(
                [
                    'cat_name' => 'برنامه نویسی اندروید',
                    'cat_uri' => 'android-programming',
                    'cat_color' => 'f9bc64',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی iOS',
                    'cat_uri' => 'ios-programming',
                    'cat_color' => '348aa7',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی اپلیکیشن‌های موبایل Native',
                    'cat_uri' => 'native-apps-programming',
                    'cat_color' => '4436f8',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'توسعه و برنامه نویسی Web Apps',
                    'cat_uri' => 'web-apps-programming',
                    'cat_color' => '5dd39e',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'توسعه و برنامه نویسی اپلیکیشن‌های موبایل هیبریدی',
                    'cat_uri' => 'hybrid-apps-programming',
                    'cat_color' => 'ff755a',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی فرانت اند',
                    'cat_uri' => 'frontend-programming',
                    'cat_color' => 'bce784',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی بک اند',
                    'cat_uri' => 'backend-programming',
                    'cat_color' => '83253f',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی ویندوز',
                    'cat_uri' => 'windows-programming',
                    'cat_color' => 'c49bbb',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی سیستم عامل مک',
                    'cat_uri' => 'macos-programming',
                    'cat_color' => '3ebafa',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی لینوکس',
                    'cat_uri' => 'linux-programming',
                    'cat_color' => 'c6b38e',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی علم داده',
                    'cat_uri' => 'bigdata-programming',
                    'cat_color' => 'a7cdbd',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی شبکه های کامپیوتری',
                    'cat_uri' => 'network-programming',
                    'cat_color' => '525252',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی بازی های کامپیوتری',
                    'cat_uri' => 'game-programming',
                    'cat_color' => '525252',
                    'cat_type' => '4',
                ],
                [
                    'cat_name' => 'برنامه نویسی رویه ای',
                    'cat_uri' => 'procedural-programming',
                    'cat_color' => '777da7',
                    'cat_type' => '5',
                ],
                [
                    'cat_name' => 'برنامه نویسی تابعی',
                    'cat_uri' => 'functional-programming',
                    'cat_color' => '368f8b',
                    'cat_type' => '5',
                ],
                [
                    'cat_name' => 'برنامه نویسی شی گرا',
                    'cat_uri' => 'oop-programming',
                    'cat_color' => 'f9bc64',
                    'cat_type' => '5',
                ],
                [
                    'cat_name' => 'برنامه نویسی اسکریپت نویسی',
                    'cat_uri' => 'scripting-programming',
                    'cat_color' => '348aa7',
                    'cat_type' => '5',
                ],
                [
                    'cat_name' => 'برنامه نویسی منطقی',
                    'cat_uri' => 'logical-programming',
                    'cat_color' => '4436f8',
                    'cat_type' => '5',
                ],
                [
                    'cat_name' => 'برنامه نویسی سطح بالا',
                    'cat_uri' => 'high-level-programming',
                    'cat_color' => '5dd39e',
                    'cat_type' => '6',
                ],
                [
                    'cat_name' => 'برنامه نویسی سطح پایین',
                    'cat_uri' => 'low-level-programming',
                    'cat_color' => 'ff755a',
                    'cat_type' => '6',
                ],
                [
                    'cat_name' => 'زبان ماشین',
                    'cat_uri' => 'machine-code',
                    'cat_color' => 'bce784',
                    'cat_type' => '6',
                ],
                [
                    'cat_name' => 'برنامه نویسی اسمبلی',
                    'cat_uri' => 'assembly-programming',
                    'cat_color' => '83253f',
                    'cat_type' => '6',
                ]
            )
        );
    }
}
