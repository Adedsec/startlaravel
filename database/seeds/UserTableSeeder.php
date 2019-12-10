<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 20)->create()->each(function ($user) {
            $user->products()->create(factory(\App\Product::class)->make()->toArray())->categories()->attach([1, 2]);
        });
    }
}
