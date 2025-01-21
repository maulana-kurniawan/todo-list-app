<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
	public function run(): void
	{
		Todo::factory(10)->create();
	}
}
