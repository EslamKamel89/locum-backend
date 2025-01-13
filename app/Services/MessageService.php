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
			->with( [ 'sender:id,name,type', 'receiver:id,name,type', 'sender.doctor', 'receiver.doctor', 'sender.hospital', 'receiver.hospital' ] )
			->get();
		// info( $messages->toRawSql() );
		info( json_encode( $messages ) );
		$result = collect( [] );
		$messages->each( function ($message) use ($result) {
			$result->add( [ 
				'other_user_id' => $message->receiver_id == auth()->id() ? $message->sender_id : $message->receiver_id,
				'not_seen_count' => (int) ( $message->not_seen_count ),
				'other_user_name' => $this->getOtherUserInfo( 'name', $message ),
				'other_user_type' => $this->getOtherUserInfo( 'type', $message ),
				'other_user_photo' => $this->getUserPhoto( $message ),
			] );
		} );

		return $result->unique( 'other_user_id' )->values()->all();
	}

	protected function getOtherUserInfo( string $key, Message $message ) {
		if ( $message->receiver_id == auth()->id() ) {
			return $message->sender[ $key ];
		} else {
			return $message->receiver[ $key ];
		}
	}

	protected function getUserPhoto( Message $message ): string {
		if ( $message->sender->id == auth()->id() ) {
			return $message->receiver->type == 'doctor' ? $message->receiver->doctor->photo : $message->receiver->hospital->photo;
		} else {
			return $message->sender->type == 'doctor' ? $message->sender->doctor->photo : $message->sender->hospital->photo;
		}
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
