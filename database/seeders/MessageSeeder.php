<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		$users = User::all();
		for ( $i = 0; $i < 10; $i++ ) {
			$users->each( function (User $firstUser, int $index) {
				$secondUser = User::inRandomOrder()->first();
				Message::factory()->create( [ 
					'sender_id' => $firstUser->id,
					'receiver_id' => $secondUser->id,
					'content' => 'message one: ' . fake()->text(),
				] );
				Message::factory()->create( [ 
					'receiver_id' => $firstUser->id,
					'sender_id' => $secondUser->id,
					'content' => 'message two: ' . fake()->text(),
				] );
				Message::factory()->create( [ 
					'sender_id' => $firstUser->id,
					'receiver_id' => $secondUser->id,
					'content' => 'message three: ' . fake()->text(),
				] );
				Message::factory()->create( [ 
					'receiver_id' => $firstUser->id,
					'sender_id' => $secondUser->id,
					'content' => 'message four: ' . fake()->text(),
				] );
			} );
		}
	}
}
