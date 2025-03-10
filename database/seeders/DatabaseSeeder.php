<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ad;
use App\Models\Education;
use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\TrainingCategories;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'User',
            'username'  => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user1234'),
            'is_admin'  => '1',
            'status' => '1'
        ]);

        TrainingCategories::create([
            'name' => 'Sertifikasi Kemnaker RI',
            'slug'  => 'sertifikasi-kemnaker-ri',
        ]);

        TrainingCategories::create([
            'name' => 'Sertifikasi BNSP',
            'slug'  => 'sertifikasi-bnsp',
        ]);

        TrainingCategories::create([
            'name' => 'Training Softskill',
            'slug'  => 'training-softskill',
        ]);

        TrainingCategories::create([
            'name' => 'Lainnya',
            'slug'  => 'lainnya',
        ]);

        Training::create([
            'id'    => '0',
            'name'  => 'Lainnya',
            'slug'  => 'lainnya',
            'training_categories_id'    => '4',
            'description'   => '-',
            'theory'    => '-'

        ]);

        Ad::create([
            'id'    => '0',
            'name'  => 'Lainnya',
            'slug'  => 'lainnya',
            'training_categories_id'    => '4',
            'description'   => '-',
            'theory'    => '-'

        ]);

        Education::create([
            'name'  => 'SMA / SMK',
        ]);

        Education::create([
            'name'  => 'D3'
        ]);

        Education::create([
            'name'  => 'D4 / S1'
        ]);

        Education::create([
            'name'  => 'S2'
        ]);

        Education::create([
            'name'  => 'S3'
        ]);

        // Training::create([
        //     'id' => 1,
        //     'training_categories_id' => '1',
        //     'name'  => 'Nama Program Training A',
        //     'slug'  => 'nama-program-training-a',
        //     'thumbnal'  => 'training->thumbnail/JGi0D7QBl9yNbgC5Jb7ngBnJp3Dctmh7GpcSSDQ4.png',
        //     'description'   => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent libero purus, blandit id ante in, cursus pretium quam. Sed ornare at enim sit amet rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Donec non ligula in mauris fringilla vehicula. Quisque massa dui, ullamcorper in orci id, feugiat vestibulum lorem. Ut vehicula nibh ac consectetur auctor. Vivamus et lobortis nisl. Nam auctor lacus a est finibus volutpat eget nec mi. Nam porttitor orci mi, a facilisis leo fringilla id. Curabitur sed metus tellus. Vivamus quis fermentum lacus. Sed feugiat quam eu ex sodales cursus. Aenean et tellus id nunc consequat consequat. </p>',
        //     'teory' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent libero purus, blandit id ante in, cursus pretium quam. Sed ornare at enim sit amet rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Donec non ligula in mauris fringilla vehicula. Quisque massa dui, ullamcorper in orci id, feugiat vestibulum lorem. Ut vehicula nibh ac consectetur auctor. Vivamus et lobortis nisl. Nam auctor lacus a est finibus volutpat eget nec mi. Nam porttitor orci mi, a facilisis leo fringilla id. Curabitur sed metus tellus. Vivamus quis fermentum lacus. Sed feugiat quam eu ex sodales cursus. Aenean et tellus id nunc consequat consequat. </p>',
        //     'participant_requirement' => '<p>Lorem ipsum dolor sit amet</p>',
        //     'method'    => '<p>Offline dan Online</p>',
        //     'facility'  => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
        //     'created_at'    => '2023-02-20 21:47:06',
        //     'updated_at'    => '2023-02-20 21:47:06',
        // ]);
    }
}
