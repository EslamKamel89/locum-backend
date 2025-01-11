<?php

if ( ! function_exists( 'customAsset' ) ) {
	function customAsset( string $asset ): string {
		if ( str( $asset )->startsWith( 'http' ) ) {
			return $asset;
		}
		return asset( $asset );
	}
}
