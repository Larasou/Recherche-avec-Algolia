<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = factory('App\Country')->create();
        factory('App\Tag', 5)->create();

        $countries->each(function ($country) {
            $cities = factory('App\City', 3)->create([
                'country_id' => $country->id
            ]);

            $cities->each(function ($city) {
                $users = factory('App\User', 5)->create([
                    'city_id' => $city->id
                ]);

                $users->each(function ($user) {
                    $user->profile()->create(
                        factory('App\Profile')->raw()
                    );
                });


                $users->each(function ($user) {
                    $posts = $user->posts()->create(
                        factory('App\Post')->raw([
                            'category_id' => \App\Category::get()->random()->id
                        ])
                    );

                    $posts->each(function ($post) {
                        $post->comments()->createMany(
                            factory('App\Comment', rand(1, 3))->raw([
                                'user_id' => \App\User::get()->random()->id,
                            ])
                        );

                       $post->tags()->sync(array_random([1, 2, 3, 4, 5], 3));
                    });

                    $projects = $user->projects()->create(
                        factory('App\Project')->raw([
                            'category_id' => \App\Category::get()->random()->id
                        ])
                    );

                    $projects->each(function ($project) {
                        $project->comments()->createMany(
                            factory('App\Comment', rand(1, 3))->raw([
                                'user_id' => \App\User::get()->random()->id,
                            ])
                        );

                        $project->tags()->sync(array_random([1, 2, 3, 4, 5], 3));
                    });
                });
            });
        });

    }
}
