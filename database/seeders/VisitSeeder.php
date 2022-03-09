<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visit::factory()->count(50)->create();
    }
}
