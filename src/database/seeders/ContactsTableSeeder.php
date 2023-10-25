<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $param = [
        'name' => '山田 太郎',
        'gender' => 1,
        'email' => 'test@test',
        'addrcode' => '111-1111',
        'addr' => '東京都渋谷区',
        'builname' => '渋谷マンション',
        'content' => 'testですtestです'
    ];
    DB::table('contacts')->insert($param);
    $param = [
        'name' => '山田 花子',
        'gender' => 2,
        'email' => 'test@test',
        'addrcode' => '111-1111',
        'addr' => '東京都新宿区',
        'builname' => '新宿マンション',
        'content' => 'testですtestですtestですtestですtestですtestですtestです'
    ];
    DB::table('contacts')->insert($param);
    $param = [
        'name' => '佐藤 太郎',
        'gender' => 1,
        'email' => 'test@test',
        'addrcode' => '111-1111',
        'addr' => '東京都渋谷区',
        'builname' => '渋谷マンション',
        'content' => 'testですtestですtestですtestですtestですtestですtestですtestですtestですtestですtestですtestですtestですtestです'
    ];
    DB::table('contacts')->insert($param);
    $param = [
        'name' => '佐藤 花子',
        'gender' => 2,
        'email' => 'test@test',
        'addrcode' => '111-1111',
        'addr' => '東京都渋谷区',
        'builname' => '渋谷マンション',
        'content' => 'testですtestですtestですtestですtestですtestですtestですtestですtestですtestですtestですtestですtestですtestです'
    ];
    DB::table('contacts')->insert($param);
    }
}
