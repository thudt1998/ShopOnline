<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'regency' => 'Administrator',
            'email' => 'thu.dt@deha-soft.com',
            'password' => bcrypt('1234'),
            'full_name' => 'Dao Thi Thu',
            'avatar' => '',
            'status' => '1'
        ]);
    }
}
