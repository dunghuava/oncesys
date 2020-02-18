<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345'),
            'created_at'=>new Datetime()
        ];
        DB::table('users')->insert($data);
    }
}
