<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateAndDistrictSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		collect( $this->statesDistricts )
			->each( function ($state) {
				$stateModel = State::create( [ 'name' => $state['state_name'] ] );
				collect( $state['districts'] )
					->each( function ($district) use ($stateModel) {
						District::create( [ 
							'state_id' => $stateModel->id,
							'name' => $district['district_name']
						] );
					} );
			} );
	}

	public $statesDistricts = [ 
		[ 
			'state_name' => 'California',
			'districts' => [ 
				[ 'district_name' => 'Los Angeles County' ],
				[ 'district_name' => 'San Diego County' ],
				[ 'district_name' => 'Orange County' ],
				[ 'district_name' => 'Riverside County' ],
				[ 'district_name' => 'San Bernardino County' ],
				[ 'district_name' => 'Santa Clara County' ],
				[ 'district_name' => 'Alameda County' ],
				[ 'district_name' => 'Sacramento County' ],
				[ 'district_name' => 'Fresno County' ],
				[ 'district_name' => 'San Francisco County' ],
			],
		],
		[ 
			'state_name' => 'Texas',
			'districts' => [ 
				[ 'district_name' => 'Harris County' ],
				[ 'district_name' => 'Dallas County' ],
				[ 'district_name' => 'Tarrant County' ],
				[ 'district_name' => 'Bexar County' ],
				[ 'district_name' => 'Travis County' ],
				[ 'district_name' => 'Collin County' ],
				[ 'district_name' => 'El Paso County' ],
				[ 'district_name' => 'Denton County' ],
				[ 'district_name' => 'Fort Bend County' ],
				[ 'district_name' => 'Hidalgo County' ],
			],
		],
		[ 
			'state_name' => 'New York',
			'districts' => [ 
				[ 'district_name' => 'New York County (Manhattan)' ],
				[ 'district_name' => 'Kings County (Brooklyn)' ],
				[ 'district_name' => 'Queens County' ],
				[ 'district_name' => 'Bronx County' ],
				[ 'district_name' => 'Richmond County (Staten Island)' ],
				[ 'district_name' => 'Nassau County' ],
				[ 'district_name' => 'Suffolk County' ],
				[ 'district_name' => 'Westchester County' ],
				[ 'district_name' => 'Erie County' ],
				[ 'district_name' => 'Monroe County' ],
			],
		],
		[ 
			'state_name' => 'Florida',
			'districts' => [ 
				[ 'district_name' => 'Miami-Dade County' ],
				[ 'district_name' => 'Broward County' ],
				[ 'district_name' => 'Palm Beach County' ],
				[ 'district_name' => 'Hillsborough County' ],
				[ 'district_name' => 'Orange County' ],
				[ 'district_name' => 'Pinellas County' ],
				[ 'district_name' => 'Duval County' ],
				[ 'district_name' => 'Lee County' ],
				[ 'district_name' => 'Polk County' ],
				[ 'district_name' => 'Brevard County' ],
			],
		],
		[ 
			'state_name' => 'Illinois',
			'districts' => [ 
				[ 'district_name' => 'Cook County' ],
				[ 'district_name' => 'DuPage County' ],
				[ 'district_name' => 'Lake County' ],
				[ 'district_name' => 'Will County' ],
				[ 'district_name' => 'Kane County' ],
				[ 'district_name' => 'McHenry County' ],
				[ 'district_name' => 'Winnebago County' ],
				[ 'district_name' => 'Madison County' ],
				[ 'district_name' => 'St. Clair County' ],
				[ 'district_name' => 'Peoria County' ],
			],
		],
		[ 
			'state_name' => 'Georgia',
			'districts' => [ 
				[ 'district_name' => 'Fulton County' ],
				[ 'district_name' => 'Gwinnett County' ],
				[ 'district_name' => 'Cobb County' ],
				[ 'district_name' => 'DeKalb County' ],
				[ 'district_name' => 'Clayton County' ],
				[ 'district_name' => 'Chatham County' ],
				[ 'district_name' => 'Cherokee County' ],
				[ 'district_name' => 'Forsyth County' ],
				[ 'district_name' => 'Henry County' ],
				[ 'district_name' => 'Hall County' ],
			],
		],
		[ 
			'state_name' => 'Pennsylvania',
			'districts' => [ 
				[ 'district_name' => 'Philadelphia County' ],
				[ 'district_name' => 'Allegheny County' ],
				[ 'district_name' => 'Montgomery County' ],
				[ 'district_name' => 'Bucks County' ],
				[ 'district_name' => 'Delaware County' ],
				[ 'district_name' => 'Lancaster County' ],
				[ 'district_name' => 'Chester County' ],
				[ 'district_name' => 'York County' ],
				[ 'district_name' => 'Berks County' ],
				[ 'district_name' => 'Lehigh County' ],
			],
		],
		[ 
			'state_name' => 'Ohio',
			'districts' => [ 
				[ 'district_name' => 'Franklin County' ],
				[ 'district_name' => 'Cuyahoga County' ],
				[ 'district_name' => 'Hamilton County' ],
				[ 'district_name' => 'Summit County' ],
				[ 'district_name' => 'Montgomery County' ],
				[ 'district_name' => 'Lucas County' ],
				[ 'district_name' => 'Stark County' ],
				[ 'district_name' => 'Butler County' ],
				[ 'district_name' => 'Lorain County' ],
				[ 'district_name' => 'Mahoning County' ],
			],
		],
	];
}
