<?php
namespace App\Services;

use App\Models\Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class MessageService {
	public function sendMessage( int $senderId, int $receiverId, string $content ) {
		$message = Message::create( [ 
			'sender_id' => $senderId,
			'receiver_id' => $receiverId,
			'content' => $content,
		] );
		$message->load( [ 'sender:id,name,type', 'receiver:id,name,type' ] );
		$message->created_at = $message->created_at->diffForHumans();

		return $message;

	}

	public function getAllChatsForUser( int $userId ) {
		$messages = Message::
			select( 'sender_id', 'receiver_id',
				DB::raw( 'SUM(not_seen) as not_seen_count' )
			)
			->where(
				function (Builder $q) use ($userId, ) {
					$q
						->where( 'sender_id', $userId )
						->orWhere( 'receiver_id', $userId );
				} )
			->groupBy( [ 'sender_id', 'receiver_id' ] )
			->orderBy( 'created_at', 'desc' )
			->with( [ 'sender:id,name', 'receiver:id,name' ] )
			->get();
		$result = collect( [] );
		$messages->each( function ($message) use ($result) {
			$result->add( [ 
				// "sender_id" => $message['sender_id'],
				// "receiver_id" => $message['receiver_id'],
				'other_user_id' => $message['receiver_id'] == auth()->id() ? $message['sender_id'] : $message['receiver_id'],
				'not_seen_count' => (int) ( $message['not_seen_count'] ),
				'other_user_name' => $message['sender']['id'] == auth()->id() ? $message['receiver']['name'] : $message['sender']['name'],
			] );
		} );

		return $result->unique( 'other_user_id' )->values()->all();
	}

	public function getUnSeenCount( int $userId ) {
		$result = Message::
			select( DB::raw( 'SUM(not_seen) as not_seen_count' ) )
			->where( 'sender_id', $userId )
			->orWhere( 'receiver_id', $userId )
			->first();
		return [ 
			'not_seen_count' => (int) ( $result['not_seen_count'] )
		];
	}

	public function getChat( int $firstUserId, int $secondUserId ): Collection {
		$messages = Message::
			select( 'sender_id', 'receiver_id', 'content', 'created_at' )
			->where( function (Builder $q) use ($firstUserId, $secondUserId) {
				$q->whereIn( 'sender_id', [ $firstUserId, $secondUserId ] )
					->whereIn( 'receiver_id', [ $firstUserId, $secondUserId ] );
			} )
			->with( [ 'sender:id,name,type', 'receiver:id,name,type' ] )
			->orderBy( 'created_at', 'asc' )->get();
		return $messages;
	}


	public function markChatAsRead( int $firstUserId, int $secondUserId ): bool {
		$result = Message::where( function (Builder $q) use ($firstUserId, $secondUserId) {
			$q->whereIn( 'sender_id', [ $firstUserId, $secondUserId ] )
				->whereIn( 'receiver_id', [ $firstUserId, $secondUserId ] );
		} )->update( [ 
					'not_seen' => 0,
				] );
		return $result;
	}
}
