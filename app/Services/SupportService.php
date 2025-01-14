<?php
namespace App\Services;

use App\Models\Support;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
class SupportService {
	public function sendMessage( int $userId, string $sender, string $content, int $adminId = null ) {
		$message = Support::create( [ 
			'admin_id' => $adminId,
			'user_id' => $userId,
			'sender' => $sender,
			'content' => $content,
		] );
		// $message->load( [ 'user:id,name,type' ] );
		$message->created_at = $message->created_at->diffForHumans();
		return $message;
	}

	public function getUnSeenCount( int $userId ) {
		$result = Support::
			select( DB::raw( 'SUM(not_seen) as not_seen_count' ) )
			->where( 'user_id', $userId )
			->first();
		return [ 
			'not_seen_count' => (int) ( $result['not_seen_count'] )
		];
	}

	public function getChat( int $userId ) {
		$messages = Support::
			select( 'sender', 'content', 'created_at' )
			->where( 'user_id', $userId )
			// ->with( [ 'user:id,name,type' ] )
			->orderBy( 'created_at', 'asc' )
			// ->latest()
			->get();
		return $messages;
	}

	public function markChatAsRead( int $userId ): bool {
		$result = Support::where( 'user_id', $userId )->update( [ 
			'not_seen' => 0,
		] );
		return $result;
	}
}
