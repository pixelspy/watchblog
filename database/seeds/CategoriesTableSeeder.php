<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Category::class, 7)->create();
/*
        DB::table('categories')->insert([
            'name' => str_random(10),
           'created_at' => ,
           'user_id' => ,
        ]);

        factory(App\Category::class, 15)->create()->each(function ($u) {
            $u->users()->save(factory(App\Post::class)->make());
        });*/
    }
}
