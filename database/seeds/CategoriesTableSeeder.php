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
/*        DB::table('categories')->insert([
            'name' => str_random(10),
        ]);

        factory(App\Category::class, 15)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        });*/
    }
}
