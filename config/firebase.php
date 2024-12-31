<?php

declare(strict_types=1);

return [ 
	/*
	 * ------------------------------------------------------------------------
	 * Default Firebase project
	 * ------------------------------------------------------------------------
	 */

	'default' => env( 'FIREBASE_PROJECT', 'app' ),

	/*
	 * ------------------------------------------------------------------------
	 * Firebase project configurations
	 * ------------------------------------------------------------------------
	 */

	'projects' => [ 
		'app' => [ 

			/*
			 * ------------------------------------------------------------------------
			 * Credentials / Service Account
			 * ------------------------------------------------------------------------
			 *
			 * In order to access a Firebase project and its related services using a
			 * server SDK, requests must be authenticated. For server-to-server
			 * communication this is done with a Service Account.
			 *
			 * If you don't already have generated a Service Account, you can do so by
			 * following the instructions from the official documentation pages at
			 *
			 * https://firebase.google.com/docs/admin/setup#initialize_the_sdk
			 *
			 * Once you have downloaded the Service Account JSON file, you can use it
			 * to configure the package.
			 *
			 * If you don't provide credentials, the Firebase Admin SDK will try to
			 * auto-discover them
			 *
			 * - by checking the environment variable FIREBASE_CREDENTIALS
			 * - by checking the environment variable GOOGLE_APPLICATION_CREDENTIALS
			 * - by trying to find Google's well known file
			 * - by checking if the application is running on GCE/GCP
			 *
			 * If no credentials file can be found, an exception will be thrown the
			 * first time you try to access a component of the Firebase Admin SDK.
			 *
			 */

			// 'credentials' => env('FIREBASE_CREDENTIALS', env('GOOGLE_APPLICATION_CREDENTIALS')),
			// 'credentials' => env( 'FIREBASE_CREDENTIALS', storage_path( 'locum-backend-firebase-adminsdk-6u44r-90d49804da.json' ) ),
			'credentials' => [ 
				"type" => "service_account",
				"project_id" => "locum-backend",
				"private_key_id" => "40499c185a796520620fa2035b6fd2e2426e8d3e",
				"private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDOSTK1azc+TbeM\n31TPwVVhTN9KXy1mYkPVlYu0zrYGPXd2VZywvvsDLy8yksmkvRSVZGN6p4jSxGa4\niM4QZyD9A6TA9Mz+2j3wwTFCX0njXrKotsG4F+DLcGHZdoaqnphD3KfxP5BzjbuS\nrutP1FRHxQPwJKFXHkGsFode9B9DyGEY500U5SGGbOjPgqxnQ8uBN+VSYGj71UPK\ndhEJKx0uS9Q6meN2+xW2+aS2HDDKAuYvTshhWLFoeRr07u/XCb0dK+GJ9BANDJqZ\n3yW+dNMbfRVvDVI3WFyDcHgOTR2c6NQe7fD2XoOtlTUdAnJjhJW/iLpxAGSxhlk7\nzxT5qMqDAgMBAAECggEAT73wAj1d75GvYJ98c4sy7BgBQQilziwyOMBEbzJxHtxn\n77CMj65j7gkxX4VquWn2KQHTirh0pbUSWEdaEPEsyWG9MHHxRJss0oJ7/kJDl8cl\nnR54qCdi2IGq8Ztl11LTXXhQ22tM9b5WQg+oGwXjRpMcQJqIW9rwXAuhbM1FwLdk\nvFlQcpN+cWw5IkrD3VPx2l/YtBGLCjymVagcqiz2fps7fEPl67qd61/oExelb2OK\n0k40WPafI6hCh/wONBFNsMErMLcAyuQhc1dzswCxWFjia/yw+UYxpp+fVAgkkZUo\nTf3TMwRvN1/gnQxm6MTcruDR7zi9Wzk5c6DNU7/5AQKBgQD5hGeaw/EbW4UXdCbQ\n3KV6/jpydmq5Bz8y6VDR8ivRNOZWV1YcnDMgI/GYUR/BBextpQYstzeKCU4BhGvL\nzvL0dobE34fcYW3FQC7V2M6a8VK4LX6qJ+cfPaMoKys/uH2robfS8xg72+QqCBwO\nklTZnJoq9wJ8RC2yLuhtcl2OQwKBgQDTpUCc9JLsy3ebNYbXuImWWqyT3O1j2MfG\n2OAGIpn/XMq+LkpdBMWjgGt3iauH2IfJQqtTyTkPqaDHv4wxY6ADGQEwc9VhLzLJ\njZQwgaBGLhBOSrip0aYJ6SquxtLMmGQv1XzCZHKoyeEkqHu41CjeedHVdpwldjFB\npfLfLmWuwQKBgEPXfz/yRK0WjjJZT3B8fbXaR9P1ZIEYelOCYooi2U0RoAsbxfsT\ncUcs3rR2YjbeQHFzbCFeU4iBjScWdSS+CQr06yG+UTdXejwmflWAlHRGZyJSpFzp\naorw/FqgmirCI9E1sEB3/j/QQtI20EIaAV4FmVlTPebBttb6sBGKBev3AoGANYcC\n629TxX3EN0X3X5G1gohWQ2NJysnl5N2u8v5HUnVmdWkBt7rgPXTaOTZhYo8Z8IXj\nDOLEgriVCE/ipg8bRg1J5rY1DkpAnwcmponyPi2iRBrTz2dNhg4plGCGqeYU2KA2\n2HdNJHFCduIBwIIv/+xxbHp+DV9yH7dX0KhMYUECgYEApv3NSt7l/U0395q7bsqT\nEXTUp9JpRWmmM5LVnHjTRXsGqj1sOdckV19IE6CgPtJX9MnzMOjKA/sK5MeRrfl/\n9NqRNLnxxK0f0DIBG0zqIM8mYEcqVan3rTXAgf1ANXKRFLq+p8B7+9o6+ehmAGIo\n9WWxw2A3ufzypAhYk3Do9QI=\n-----END PRIVATE KEY-----\n",
				"client_email" => "firebase-adminsdk-6u44r@locum-backend.iam.gserviceaccount.com",
				"client_id" => "117899872449579377997",
				"auth_uri" => "https://accounts.google.com/o/oauth2/auth",
				"token_uri" => "https://oauth2.googleapis.com/token",
				"auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
				"client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-6u44r%40locum-backend.iam.gserviceaccount.com",
				"universe_domain" => "googleapis.com"
			],
			// 'credentials' => [
			// 	'file' => env( 'FIREBASE_CREDENTIALS' ),
			// ],
			'default_project_id' => env( 'FIREBASE_PROJECT_ID' ),
			/*
			 * ------------------------------------------------------------------------
			 * Firebase Auth Component
			 * ------------------------------------------------------------------------
			 */

			'auth' => [ 
				'tenant_id' => env( 'FIREBASE_AUTH_TENANT_ID' ),
			],

			/*
			 * ------------------------------------------------------------------------
			 * Firestore Component
			 * ------------------------------------------------------------------------
			 */

			'firestore' => [

				/*
				 * If you want to access a Firestore database other than the default database,
				 * enter its name here.
				 *
				 * By default, the Firestore client will connect to the `(default)` database.
				 *
				 * https://firebase.google.com/docs/firestore/manage-databases
				 */

				// 'database' => env('FIREBASE_FIRESTORE_DATABASE'),
			],

			/*
			 * ------------------------------------------------------------------------
			 * Firebase Realtime Database
			 * ------------------------------------------------------------------------
			 */

			'database' => [ 

				/*
				 * In most of the cases the project ID defined in the credentials file
				 * determines the URL of your project's Realtime Database. If the
				 * connection to the Realtime Database fails, you can override
				 * its URL with the value you see at
				 *
				 * https://console.firebase.google.com/u/1/project/_/database
				 *
				 * Please make sure that you use a full URL like, for example,
				 * https://my-project-id.firebaseio.com
				 */

				'url' => env( 'FIREBASE_DATABASE_URL' ),

				/*
				 * As a best practice, a service should have access to only the resources it needs.
				 * To get more fine-grained control over the resources a Firebase app instance can access,
				 * use a unique identifier in your Security Rules to represent your service.
				 *
				 * https://firebase.google.com/docs/database/admin/start#authenticate-with-limited-privileges
				 */

				// 'auth_variable_override' => [
				//     'uid' => 'my-service-worker'
				// ],

			],

			'dynamic_links' => [ 

				/*
				 * Dynamic links can be built with any URL prefix registered on
				 *
				 * https://console.firebase.google.com/u/1/project/_/durablelinks/links/
				 *
				 * You can define one of those domains as the default for new Dynamic
				 * Links created within your project.
				 *
				 * The value must be a valid domain, for example,
				 * https://example.page.link
				 */

				'default_domain' => env( 'FIREBASE_DYNAMIC_LINKS_DEFAULT_DOMAIN' ),
			],

			/*
			 * ------------------------------------------------------------------------
			 * Firebase Cloud Storage
			 * ------------------------------------------------------------------------
			 */

			'storage' => [ 

				/*
				 * Your project's default storage bucket usually uses the project ID
				 * as its name. If you have multiple storage buckets and want to
				 * use another one as the default for your application, you can
				 * override it here.
				 */

				'default_bucket' => env( 'FIREBASE_STORAGE_DEFAULT_BUCKET' ),

			],

			/*
			 * ------------------------------------------------------------------------
			 * Caching
			 * ------------------------------------------------------------------------
			 *
			 * The Firebase Admin SDK can cache some data returned from the Firebase
			 * API, for example Google's public keys used to verify ID tokens.
			 *
			 */

			'cache_store' => env( 'FIREBASE_CACHE_STORE', 'file' ),

			/*
			 * ------------------------------------------------------------------------
			 * Logging
			 * ------------------------------------------------------------------------
			 *
			 * Enable logging of HTTP interaction for insights and/or debugging.
			 *
			 * Log channels are defined in config/logging.php
			 *
			 * Successful HTTP messages are logged with the log level 'info'.
			 * Failed HTTP messages are logged with the log level 'notice'.
			 *
			 * Note: Using the same channel for simple and debug logs will result in
			 * two entries per request and response.
			 */

			'logging' => [ 
				'http_log_channel' => env( 'FIREBASE_HTTP_LOG_CHANNEL' ),
				'http_debug_log_channel' => env( 'FIREBASE_HTTP_DEBUG_LOG_CHANNEL' ),
			],

			/*
			 * ------------------------------------------------------------------------
			 * HTTP Client Options
			 * ------------------------------------------------------------------------
			 *
			 * Behavior of the HTTP Client performing the API requests
			 */

			'http_client_options' => [ 

				/*
				 * Use a proxy that all API requests should be passed through.
				 * (default: none)
				 */

				'proxy' => env( 'FIREBASE_HTTP_CLIENT_PROXY' ),

				/*
				 * Set the maximum amount of seconds (float) that can pass before
				 * a request is considered timed out
				 *
				 * The default time out can be reviewed at
				 * https://github.com/kreait/firebase-php/blob/6.x/src/Firebase/Http/HttpClientOptions.php
				 */

				'timeout' => env( 'FIREBASE_HTTP_CLIENT_TIMEOUT' ),

				'guzzle_middlewares' => [],
			],
		],
	],
];
