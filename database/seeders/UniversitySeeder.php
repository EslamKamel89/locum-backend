<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		collect( $this->universities )
			->each( fn( $university ) => University::create( $university ) );

	}
	public $universities = [ 
		[ 'name' => 'Massachusetts Institute of Technology' ],
		[ 'name' => 'Harvard University' ],
		[ 'name' => 'Stanford University' ],
		[ 'name' => 'California Institute of Technology' ],
		[ 'name' => 'University of Pennsylvania' ],
		[ 'name' => 'University of California, Berkeley' ],
		[ 'name' => 'Cornell University' ],
		[ 'name' => 'University of Chicago' ],
		[ 'name' => 'Princeton University' ],
		[ 'name' => 'Yale University' ],
		[ 'name' => 'Columbia University' ],
		[ 'name' => 'University of Michigan, Ann Arbor' ],
		[ 'name' => 'University of California, Los Angeles' ],
		[ 'name' => 'University of California, San Diego' ],
		[ 'name' => 'University of Washington' ],
		[ 'name' => 'New York University' ],
		[ 'name' => 'University of Southern California' ],
		[ 'name' => 'University of Wisconsin-Madison' ],
		[ 'name' => 'Duke University' ],
		[ 'name' => 'Northwestern University' ],
		[ 'name' => 'University of Texas at Austin' ],
		[ 'name' => 'University of Illinois at Urbana-Champaign' ],
		[ 'name' => 'Johns Hopkins University' ],
		[ 'name' => 'University of California, San Francisco' ],
		[ 'name' => 'University of California, Santa Barbara' ],
		[ 'name' => 'University of North Carolina at Chapel Hill' ],
		[ 'name' => 'University of California, Davis' ],
		[ 'name' => 'University of Minnesota, Twin Cities' ],
		[ 'name' => 'Purdue University' ],
		[ 'name' => 'University of Florida' ],
		[ 'name' => 'Brown University' ],
		[ 'name' => 'Rice University' ],
		[ 'name' => 'Vanderbilt University' ],
		[ 'name' => 'University of Virginia' ],
		[ 'name' => 'Pennsylvania State University' ],
		[ 'name' => 'Emory University' ],
		[ 'name' => 'Carnegie Mellon University' ],
		[ 'name' => 'University of Colorado Boulder' ],
		[ 'name' => 'University of Arizona' ],
		[ 'name' => 'University of Miami' ],
		[ 'name' => 'University of Maryland, College Park' ],
		[ 'name' => 'Boston University' ],
		[ 'name' => 'Rutgers, The State University of New Jersey' ],
		[ 'name' => 'University of Pittsburgh' ],
		[ 'name' => 'Michigan State University' ],
		[ 'name' => 'University of California, Riverside' ],
		[ 'name' => 'University of Notre Dame' ],
		[ 'name' => 'Washington University in St. Louis' ],
		[ 'name' => 'Ohio State University' ],
		[ 'name' => 'University of Utah' ],
		[ 'name' => 'University of Connecticut' ],
		[ 'name' => 'University of Georgia' ],
		[ 'name' => 'Florida State University' ],
		[ 'name' => 'University of Oklahoma' ],
		[ 'name' => 'University of Kansas' ],
		[ 'name' => 'University of Iowa' ],
		[ 'name' => 'Indiana University Bloomington' ],
		[ 'name' => 'University of Alabama' ],
		[ 'name' => 'University of Nebraska-Lincoln' ],
		[ 'name' => 'University of Kentucky' ],
		[ 'name' => 'University of Mississippi' ],
		[ 'name' => 'University of Missouri' ],
		[ 'name' => 'University of Tennessee' ],
		[ 'name' => 'Clemson University' ],
		[ 'name' => 'University of Arkansas' ],
		[ 'name' => 'Auburn University' ],
		[ 'name' => 'University of Delaware' ],
		[ 'name' => 'Texas A&M University' ],
		[ 'name' => 'University of Houston' ],
		[ 'name' => 'University of Texas at Dallas' ],
		[ 'name' => 'University of Texas at San Antonio' ],
		[ 'name' => 'University of Central Florida' ],
		[ 'name' => 'University of South Florida' ],
		[ 'name' => 'Georgia Institute of Technology' ],
		[ 'name' => 'University of Louisville' ],
		[ 'name' => 'University of South Carolina' ],
		[ 'name' => 'University of Vermont' ],
		[ 'name' => 'University of Hawaii at Manoa' ],
		[ 'name' => 'University of New Mexico' ],
		[ 'name' => 'University of Nevada, Las Vegas' ],
		[ 'name' => 'University of North Dakota' ],
		[ 'name' => 'University of Rhode Island' ],
		[ 'name' => 'University of Wyoming' ]
	];
}
