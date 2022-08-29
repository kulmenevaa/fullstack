<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\SuperUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(SuperUserSeeder::class);
        News::factory(10)->create();
        Event::factory(10)->create();
        User::factory(9)->create();
    }
}
