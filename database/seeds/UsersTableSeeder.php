<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    private const USER_NAME = 'root';
    private const USER_EMAIL = 'root@gmail.com';
    private const USER_PASSWORD = 'secret';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => self::USER_NAME,
            'email' => self::USER_EMAIL,
            'password' => bcrypt(self::USER_PASSWORD),
        ]);
    }
}
