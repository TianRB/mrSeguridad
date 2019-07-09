<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('users')->insert([
      'name' => 'admin',
      'email' => 'admin@admin.com',
      'password' => bcrypt('secret'),
      'recent' => 'none'
      ]);
    DB::table('users')->insert([
      'name' => 'designer',
      'email' => 'designer@admin.com',
      'password' => bcrypt('secret'),
      'recent' => 'none'
      ]);
    DB::table('users')->insert([
      'name' => 'distributor',
      'email' => 'distributor@admin.com',
      'password' => bcrypt('secret'),
      'recent' => 'none'
      ]);
    DB::table('users')->insert([
      'name' => 'salesman',
      'email' => 'salesman@admin.com',
      'password' => bcrypt('secret'),
      'recent' => 'none'
      ]);

    DB::table('roles')->insert([
      'name' => 'admin',
    ]);
    DB::table('roles')->insert([
      'name' => 'designer',
    ]);
    DB::table('roles')->insert([
      'name' => 'distributor',
    ]);
    DB::table('roles')->insert([
      'name' => 'salesman',
    ]);
    
    $admin = App\User::where('name', 'admin')->first();
    $admin->attachRole(App\Role::where('name', 'admin')->first());

    $designer = App\User::where('name', 'designer')->first();
    $designer->attachRole(App\Role::where('name', 'designer')->first());

    $distributor = App\User::where('name', 'distributor')->first();
    $distributor->attachRole(App\Role::where('name', 'distributor')->first());

    $salesman = App\User::where('name', 'salesman')->first();
    $salesman->attachRole(App\Role::where('name', 'salesman')->first());

  }
}
