<?php

namespace Database\Seeders;

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
        \App\Models\User::create(
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'test@blog.com',
                'password' => bcrypt('admin')
            ]);
        \App\Models\Berita::factory(10)->create();
    }
    
}
