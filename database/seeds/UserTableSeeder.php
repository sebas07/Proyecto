<?php
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        //DB::table('users')->delete();

//        User::create(array(
//            'name'     => 'Luis',
//            'username' => 'Lux',
//            'email'    => 'luis.d15@hotmail.com',
//            'password' => Hash::make('12345'),
//        ));
        \DB::table('users')->insert(array(
            'name'     => 'Luis',
            'username' => 'Lux',
            'email'    => 'luis.d15@hotmail.com',
            'password' => Hash::make('12345')
        ));
        \DB::table('users')->insert(array(
            'name'     => 'Sebas',
            'username' => 'sejas',
            'email'    => 'sebas@hotmail.com',
            'password' => Hash::make('abcdef')
        ));
    }
}