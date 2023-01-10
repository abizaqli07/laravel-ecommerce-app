<?php

namespace Database\Seeders;

use App\Models\User;
use App\AppConf\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $admin =  User::create([
      'name' => 'Admin 1',
      'email' => 'admin@admin.com',
      'password' => bcrypt('admin12345'),
      'role_as' => '1'
    ]);

    $user =  User::create([
      'name' => 'User 1',
      'email' => 'user@user.com',
      'password' => bcrypt('user12345'),
      'role_as' => '0'
    ]);

  }
}
