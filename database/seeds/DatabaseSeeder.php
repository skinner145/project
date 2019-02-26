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
      // DB::table('users')->insert([
      //       'name' => str_random(10),
      //       'email' => str_random(10).'@gmail.com',
      //       'password' => bcrypt('secret'),
      //   ]);
        factory(App\User::class, 10)->create();
        factory(App\Fixture::class, 10)->create();
        factory(App\Team::class, 10)->create();
        factory(App\Club::class, 10)->create();
    }
}
