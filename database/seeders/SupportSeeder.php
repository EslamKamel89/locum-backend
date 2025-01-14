<?php

namespace Database\Seeders;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		$users = User::all();
		$users->each( function (User $user, int $index) {
			Support::factory( 50 )
				->sequence( function (Sequence $sequence) use ($user) {
					$index = $sequence->index;
					return [ 
						'user_id' => $user->id,
						'content' => $index . ' - ' . fake()->realTextBetween( 100, 150 ),

					];
				} )
				->create();
		} );
	}
}
