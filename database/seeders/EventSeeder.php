<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory()->count(5)->webinar()->create();
        Event::factory()->count(5)->seminar()->create();
        Event::factory()->count(5)->free()->create();
        Event::factory()->count(5)->paid()->create();
    }
}