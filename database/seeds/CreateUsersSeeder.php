<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = [
            	[
               'nom'=>'Admin',
               'prenom' =>'Admin',
               'dateNaissance' => '2010-01-01',
               'email'=>'admin@admin.com',
               'telephone' => '0000000000',
               'isAdmin'=> 1,
               'password'=> bcrypt(123456789),
                ],
            ];

            foreach ($user as $key => $value) {
                  User::create($value);
            }
    }
}
