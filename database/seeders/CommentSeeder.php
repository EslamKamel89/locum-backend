<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorDocument;
use App\Models\DoctorInfo;
use App\Models\Hospital;
use App\Models\HospitalDocument;
use App\Models\HospitalInfo;
use App\Models\JobAdd;
use App\Models\JobApplication;
use App\Models\JobInfo;
use App\Models\Lang;
use App\Models\Review;
use App\Models\Skill;
use App\Models\Specialty;
use App\Models\State;
use App\Models\University;
use App\Models\User;
class CommentSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		for ( $i = 0; $i < 10; $i++ ) {
			Comment::create( [ 
				'user_id' => User::inRandomOrder()->first()->id,
				// 'user_id' => 51,
				'content' => 'REVIEW With no replies: ' . fake()->realText( 50 ),
				'rating' => fake()->numberBetween( 1, 5 ),
				'commentable_id' => 51,
				'commentable_type' => Doctor::class
			] );
			$parentComment = Comment::create( [ 
				'user_id' => User::inRandomOrder()->first()->id,
				'content' => 'REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
				'rating' => fake()->numberBetween( 1, 5 ),
				'commentable_id' => 51,
				'commentable_type' => Doctor::class
			] );
			$nestedComment = Comment::create( [ 
				'user_id' => User::inRandomOrder()->first()->id,
				'parent_id' => $parentComment->id,
				'content' => 'COMMNET_1 ON REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
				'commentable_id' => 51,
				'commentable_type' => Doctor::class
			] );
			$deeplyNestedComment = Comment::create( [ 
				'user_id' => User::inRandomOrder()->first()->id,
				'parent_id' => $nestedComment->id,
				'content' => 'COMMNET_2 ON COMMENT_1: ' . fake()->realText( 50 ),
				'commentable_id' => 51,
				'commentable_type' => Doctor::class
			] );
			$nestedComment = Comment::create( [ 
				'user_id' => User::inRandomOrder()->first()->id,
				'parent_id' => $parentComment->id,
				'content' => 'COMMNET_3 ON REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
				'commentable_id' => 51,
				'commentable_type' => Doctor::class
			] );
			$deeplyNestedComment = Comment::create( [ 
				'user_id' => User::inRandomOrder()->first()->id,
				'parent_id' => $nestedComment->id,
				'content' => 'COMMNET_4 ON COMMENT_3: ' . fake()->realText( 50 ),
				'commentable_id' => 51,
				'commentable_type' => Doctor::class
			] );
		}

		for ( $i = 0; $i < 10; $i++ ) {
			$doctors = Doctor::all();
			$doctors->each( function (Doctor $doctor) use ($i) {
				Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					// 'user_id' => 51,
					'content' => 'REVIEW With no replies: ' . fake()->realText( 50 ),
					'rating' => fake()->numberBetween( 1, 5 ),
					'commentable_id' => $doctor->id,
					'commentable_type' => Doctor::class
				] );
				$parentComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'content' => 'REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
					'rating' => fake()->numberBetween( 1, 5 ),
					'commentable_id' => $doctor->id,
					'commentable_type' => Doctor::class
				] );
				$nestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $parentComment->id,
					'content' => 'COMMNET_1 ON REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
					'commentable_id' => $doctor->id,
					'commentable_type' => Doctor::class
				] );
				$deeplyNestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $nestedComment->id,
					'content' => 'COMMNET_2 ON COMMENT_1: ' . fake()->realText( 50 ),
					'commentable_id' => $doctor->id,
					'commentable_type' => Doctor::class
				] );
				$nestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $parentComment->id,
					'content' => 'COMMNET_3 ON REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
					'commentable_id' => $doctor->id,
					'commentable_type' => Doctor::class
				] );
				$deeplyNestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $nestedComment->id,
					'content' => 'COMMNET_4 ON COMMENT_3: ' . fake()->realText( 50 ),
					'commentable_id' => $doctor->id,
					'commentable_type' => Doctor::class
				] );
			} );
			$hospitals = Hospital::all();
			$hospitals->each( function (Hospital $hospital) use ($i) {
				Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'content' => 'REVIEW With no replies: ' . fake()->realText( 50 ),
					'rating' => fake()->numberBetween( 1, 5 ),
					'commentable_id' => $hospital->id,
					'commentable_type' => Hospital::class
				] );
				$parentComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'content' => 'REVIEW_' . $i . ': ' . fake()->realText( 50 ),
					'rating' => fake()->numberBetween( 1, 5 ),
					'commentable_id' => $hospital->id,
					'commentable_type' => Hospital::class
				] );
				$nestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $parentComment->id,
					'content' => 'COMMNET_1 ON REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
					'commentable_id' => $hospital->id,
					'commentable_type' => Hospital::class
				] );
				$deeplyNestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $nestedComment->id,
					'content' => 'COMMNET_2 ON COMMENT_1: ' . fake()->realText( 50 ),
					'commentable_id' => $hospital->id,
					'commentable_type' => Hospital::class
				] );
				$nestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $parentComment->id,
					'content' => 'COMMNET_3 ON REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
					'commentable_id' => $hospital->id,
					'commentable_type' => Hospital::class
				] );
				$deeplyNestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $nestedComment->id,
					'content' => 'COMMNET_4 ON COMMENT_3: ' . fake()->realText( 50 ),
					'commentable_id' => $hospital->id,
					'commentable_type' => Hospital::class
				] );

			} );

			$jobAdds = JobAdd::all();
			$jobAdds->each( function (JobAdd $jobAdd) use ($i) {
				Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'content' => 'REVIEW With no replies: ' . fake()->realText( 50 ),
					'rating' => fake()->numberBetween( 1, 5 ),
					'commentable_id' => $jobAdd->id,
					'commentable_type' => JobAdd::class
				] );
				$parentComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'content' => 'REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
					'rating' => fake()->numberBetween( 1, 5 ),
					'commentable_id' => $jobAdd->id,
					'commentable_type' => JobAdd::class
				] );
				$nestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $parentComment->id,
					'content' => 'COMMNET_1 ON REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
					'commentable_id' => $jobAdd->id,
					'commentable_type' => JobAdd::class
				] );
				$deeplyNestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $nestedComment->id,
					'content' => 'COMMNET_2 ON COMMENT_1: ' . fake()->realText( 50 ),
					'commentable_id' => $jobAdd->id,
					'commentable_type' => JobAdd::class
				] );
				$nestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $parentComment->id,
					'content' => 'COMMNET_3 ON REVIEW_' . $i . ': : ' . fake()->realText( 50 ),
					'commentable_id' => $jobAdd->id,
					'commentable_type' => JobAdd::class
				] );
				$deeplyNestedComment = Comment::create( [ 
					'user_id' => User::inRandomOrder()->first()->id,
					'parent_id' => $nestedComment->id,
					'content' => 'COMMNET_4 ON COMMENT_3: ' . fake()->realText( 50 ),
					'commentable_id' => $jobAdd->id,
					'commentable_type' => JobAdd::class
				] );
			} );
		}
	}
}
