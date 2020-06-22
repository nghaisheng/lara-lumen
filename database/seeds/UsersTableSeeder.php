<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = new User;
        $superAdmin->username = "nghaisheng";
        $superAdmin->email = "nghaisheng@live.com";
        $superAdmin->name = "David Huang";
        $superAdmin->password = Hash::make('david22');
        $superAdmin->save();
    }
}
