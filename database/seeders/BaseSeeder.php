<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('baseinfos')->insert(
            array(
                [
                    'bas_type' => 'siteUrl',
                    'bas_value' => 'https://',
                ],
                [
                    'bas_type' => 'genderType',
                    'bas_value' => 'مرد',
                ],
                [
                    'bas_type' => 'genderType',
                    'bas_value' => 'زن',
                ],
                [
                    'bas_type' => 'proType',
                    'bas_value' => 'حوزه های برنامه نویسی',
                ],
                [
                    'bas_type' => 'proType',
                    'bas_value' => 'انواع زبان‌های برنامه نویسی',
                ],
                [
                    'bas_type' => 'proType',
                    'bas_value' => 'انواع سطح های برنامه نویسی',
                ],
                [
                    'bas_type' => 'memType',
                    'bas_value' => 'normal',
                ],
                [
                    'bas_type' => 'memType',
                    'bas_value' => 'editor',
                ],
                [
                    'bas_type' => 'memType',
                    'bas_value' => 'moderator',
                ],
                [
                    'bas_type' => 'memType',
                    'bas_value' => 'expert',
                ],
                [
                    'bas_type' => 'memType',
                    'bas_value' => 'manager',
                ],
                [
                    'bas_type' => 'ansType',
                    'bas_value' => 'main',
                ],
                [
                    'bas_type' => 'ansType',
                    'bas_value' => 'comment',
                ],
                [
                    'bas_type' => 'voteType',
                    'bas_value' => 'upvote',
                ],
                [
                    'bas_type' => 'voteType',
                    'bas_value' => 'downvote',
                ],
                [
                    'bas_type' => 'objectType',
                    'bas_value' => 'questions',
                ],
                [
                    'bas_type' => 'objectType',
                    'bas_value' => 'answers',
                ],
                [
                    'bas_type' => 'notificationType',
                    'bas_value' => 'new_answer',
                ],
                [
                    'bas_type' => 'notificationType',
                    'bas_value' => 'best_answer',
                ],
                [
                    'bas_type' => 'notificationType',
                    'bas_value' => 'up_voted',
                ],
                [
                    'bas_type' => 'notificationType',
                    'bas_value' => 'user_liked',
                ],
                [
                    'bas_type' => 'notificationType',
                    'bas_value' => 'earned_badge',
                ],
            )
        );
    }
}
