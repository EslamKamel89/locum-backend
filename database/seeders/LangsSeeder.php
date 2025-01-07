<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		collect( $this->langs )->each( fn( $lang ) => Lang::create( $lang ) );

	}

	public $langs = [ 
		[ "name" => "English" ],
		[ "name" => "Arabic" ],
		[ "name" => "Spanish" ],
		[ "name" => "Chinese" ],
		[ "name" => "French" ],
		[ "name" => "Korean" ],
		[ "name" => "German" ],
		[ "name" => "Russian" ],
	];
}
