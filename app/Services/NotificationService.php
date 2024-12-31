<?php
namespace App\Services;
use App\Exceptions\NotAuthorizedException;
use App\Http\Controllers\Controller;
use App\Models\User;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\SendReport;
use Kreait\Laravel\Firebase\Facades\Firebase;

class NotificationService extends Controller {
	/**
	 * Summary of messaging
	 * @var Messaging
	 */
	protected Messaging $messaging;

	public function __construct() {
		// $this->messaging = ( new Factory() )
		// ->withServiceAccount( $this->pr( storage_path( 'locum-backend-firebase-adminsdk-6u44r-90d49804da.json' ) ) )
		// ->createMessaging();
		$this->messaging = Firebase::messaging();
	}

	/**
	 * Summary of sendNotification
	 * @param int $userId
	 * @param string $title
	 * @param string $body
	 * @param string $routeName
	 * @param array $payload
	 * @throws \App\Exceptions\NotAuthorizedException
	 * @return bool
	 */
	public function sendNotification(
		int $userId,
		string $title,
		string $body,
		string $routeName,
		array $payload ): bool {
		try {
			$fcmToken = User::findorFail( $userId )->fcm_token;
			if ( ! $fcmToken ) {
				throw new NotAuthorizedException( [ 'No Token Found in the database' ] );
			}
			$message = CloudMessage::withTarget( 'token', $fcmToken )
				->withNotification( [ 
					'title' => $title,
					'body' => $body,
				] )
				->withData( [ 
					'routeName' => $routeName,
					'payload' => json_encode( $payload ),
				] );
			$this->messaging->send( $message );
			return true;
		} catch (\Exception $e) {
			throw new NotAuthorizedException( [ $e->getMessage() ] );
		}
	}
	/**
	 * Summary of sendNotifications
	 * @param array[string] $fcmTokens
	 * @param string $title
	 * @param string $body
	 * @param string $routeName
	 * @param array $payload
	 * @throws \App\Exceptions\NotAuthorizedException
	 * @return bool
	 */
	public function sendNotifications(
		array $fcmTokens,
		string $title,
		string $body,
		string $routeName,
		array $payload ): bool {
		try {
			$message = CloudMessage::new()->withNotification( [ 
				'title' => $title,
				'body' => $body,
			] )
				->withData( [ 
					'routeName' => $routeName,
					'payload' => json_encode( $payload ),
				] );
			$sendReport = $this->messaging->sendMulticast( $message, $fcmTokens );
			if ( $sendReport->hasFailures() ) {
				throw new NotAuthorizedException(
					collect( $sendReport->failures()->getItems() )
						->each( fn( SendReport $failure ): string => $failure->error()->getMessage()
						)->toArray() );
			}
			return true;
		} catch (\Exception $e) {
			throw new NotAuthorizedException( [ $e->getMessage() ] );
		}
	}
}
