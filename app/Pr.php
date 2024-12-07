<?php
namespace App;
class Pr {
	static public function _( $value, $title = null ) {
		if ( $title ) {
			info( "{$title}  >>>>>>>>>>>>>>>>>>" );
		}
		info( json_encode( $value ) );
		return $value;
	}
}
