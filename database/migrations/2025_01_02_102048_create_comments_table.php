<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'comments', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'user_id' )->constrained( 'users' )->cascadeOnDelete();
			$table->foreignId( 'parent_id' )->nullable()->constrained( 'comments' )->cascadeOnDelete();
			$table->morphs( 'commentable' );
			$table->string( 'content' );
			//! Rating (for top-level comments only)
			$table->integer( 'rating' )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'comments' );
	}
};
