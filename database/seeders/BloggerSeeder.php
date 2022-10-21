<?php

namespace Database\Seeders;

use App\Models\Blogger;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BloggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blogger::factory()
            ->count(20)
            ->hasPosts(10)
            ->create();
        
        Blogger::factory()
        ->count(5)
        ->hasPosts(1)
        ->create();

        Blogger::factory()
        ->count(10)
        ->create();
    }
}
