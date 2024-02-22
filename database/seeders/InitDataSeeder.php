<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class InitDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('command:novel-cool-post');
        Artisan::call('command:novel-cool-chapter');
        Artisan::call('command:novel-cool-chapter-detail');
    }
}
