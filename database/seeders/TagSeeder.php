<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(
            array(
                [
                    'tag_name' => 'javascript',
                    'tag_color' => 'f9bc64',
                ],
                [
                    'tag_name' => 'python',
                    'tag_color' => '348aa7',
                ],
                [
                    'tag_name' => 'java',
                    'tag_color' => '4436f8',
                ],
                [
                    'tag_name' => 'laravel',
                    'tag_color' => '5dd39e',
                ],
                [
                    'tag_name' => 'c#',
                    'tag_color' => 'ff755a',
                ],
                [
                    'tag_name' => 'php',
                    'tag_color' => 'bce784',
                ],
                [
                    'tag_name' => 'css',
                    'tag_color' => '83253f',
                ],
                [
                    'tag_name' => 'mysql',
                    'tag_color' => 'c49bbb',
                ],
                [
                    'tag_name' => 'android',
                    'tag_color' => '3ebafa',
                ],
                [
                    'tag_name' => 'node.js',
                    'tag_color' => 'c6b38e',
                ],
                [
                    'tag_name' => 'r',
                    'tag_color' => 'a7cdbd',
                ],
                [
                    'tag_name' => 'sql',
                    'tag_color' => '525252',
                ],
                [
                    'tag_name' => 'ruby-on-rails',
                    'tag_color' => '777da7',
                ],
                [
                    'tag_name' => 'sql-server',
                    'tag_color' => '368f8b',
                ],
                [
                    'tag_name' => '.net',
                    'tag_color' => 'f9bc64',
                ],
                [
                    'tag_name' => 'swift',
                    'tag_color' => '348aa7',
                ],
                [
                    'tag_name' => 'django',
                    'tag_color' => '4436f8',
                ],
                [
                    'tag_name' => 'objective-c',
                    'tag_color' => '5dd39e',
                ],
                [
                    'tag_name' => 'pandas',
                    'tag_color' => 'ff755a',
                ],
                [
                    'tag_name' => 'excel',
                    'tag_color' => 'bce784',
                ],
                [
                    'tag_name' => 'angularjs',
                    'tag_color' => '83253f',
                ],
                [
                    'tag_name' => 'regex',
                    'tag_color' => 'c49bbb',
                ],
                [
                    'tag_name' => 'excel',
                    'tag_color' => '3ebafa',
                ],
                [
                    'tag_name' => 'linux',
                    'tag_color' => 'c6b38e',
                ],
                [
                    'tag_name' => 'iphone',
                    'tag_color' => '525252',
                ],
                [
                    'tag_name' => 'ajax',
                    'tag_color' => 'a7cdbd',
                ],
            )
        );
    }
}
