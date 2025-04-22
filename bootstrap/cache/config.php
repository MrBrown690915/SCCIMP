<?php return array (
  2 => 'broadcasting',
  4 => 'concurrency',
  5 => 'cors',
  8 => 'hashing',
  14 => 'view',
  'app' => 
  array (
    'name' => 'SC-CIMP',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://127.0.0.1:8000',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'es',
    'fallback_locale' => 'es',
    'faker_locale' => 'es_ES',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:HIepZgNu7X30uLcJx0w6eAtQHIaszLi/sOLqt7c2F54=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
      'store' => 'database',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Uri' => 'Illuminate\\Support\\Uri',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'cache' => 
  array (
    'default' => 'database',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'cache',
        'lock_connection' => NULL,
        'lock_table' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\wamp64\\www\\SCCIMP\\storage\\framework/cache/data',
        'lock_path' => 'C:\\wamp64\\www\\SCCIMP\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'sc_cimp_cache_',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'sccimp',
        'prefix' => '',
        'foreign_key_constraints' => true,
        'busy_timeout' => NULL,
        'journal_mode' => NULL,
        'synchronous' => NULL,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'sccimp',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => 'InnoDB',
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'sccimp',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'sccimp',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'sccimp',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 
    array (
      'table' => 'migrations',
      'update_date_on_publish' => true,
    ),
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'sc_cimp_database_',
        'persistent' => false,
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => 'C:\\wamp64\\www\\SCCIMP\\storage\\fonts',
      'font_cache' => 'C:\\wamp64\\www\\SCCIMP\\storage\\fonts',
      'temp_dir' => 'C:\\Users\\CARLOS~1\\AppData\\Local\\Temp',
      'chroot' => 'C:\\wamp64\\www\\SCCIMP',
      'allowed_protocols' => 
      array (
        'data://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'artifactPathValidation' => NULL,
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'letter',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => false,
      'allowed_remote_hosts' => NULL,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\wamp64\\www\\SCCIMP\\storage\\app/private',
        'serve' => true,
        'throw' => false,
        'report' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\wamp64\\www\\SCCIMP\\storage\\app/public',
        'url' => 'http://127.0.0.1:8000/storage',
        'visibility' => 'public',
        'throw' => false,
        'report' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
        'report' => false,
      ),
    ),
    'links' => 
    array (
      'C:\\wamp64\\www\\SCCIMP\\public\\storage' => 'C:\\wamp64\\www\\SCCIMP\\storage\\app/public',
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\wamp64\\www\\SCCIMP\\storage\\logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\wamp64\\www\\SCCIMP\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'C:\\wamp64\\www\\SCCIMP\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'log',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'scheme' => NULL,
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '2525',
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'local_domain' => '127.0.0.1',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'SC-CIMP',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\wamp64\\www\\SCCIMP\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'database',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\wamp64\\www\\SCCIMP\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'sc_cimp_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'host' => 'api-mt1.pusher.com',
          'port' => 443,
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => '12',
      'verify' => true,
      'limit' => NULL,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
      'verify' => true,
    ),
    'rehash_on_login' => true,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\wamp64\\www\\SCCIMP\\resources\\views',
    ),
    'compiled' => 'C:\\wamp64\\www\\SCCIMP\\storage\\framework\\views',
  ),
  'localization-private' => 
  array (
    'plugins' => 
    array (
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\actions' => 
      array (
        0 => 'LaravelLang\\Actions\\Plugins\\Main',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\attributes' => 
      array (
        0 => 'LaravelLang\\Attributes\\Plugins\\Laravel',
        1 => 'LaravelLang\\Attributes\\Plugins\\Lumen',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\http-statuses' => 
      array (
        0 => 'LaravelLang\\HttpStatuses\\Plugins\\Main',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\lang' => 
      array (
        0 => 'LaravelLang\\Lang\\Plugins\\Breeze\\Master',
        1 => 'LaravelLang\\Lang\\Plugins\\Breeze\\V2',
        2 => 'LaravelLang\\Lang\\Plugins\\Cashier\\Stripe\\Master',
        3 => 'LaravelLang\\Lang\\Plugins\\Cashier\\Stripe\\V15',
        4 => 'LaravelLang\\Lang\\Plugins\\Fortify\\Master',
        5 => 'LaravelLang\\Lang\\Plugins\\Fortify\\V1',
        6 => 'LaravelLang\\Lang\\Plugins\\Jetstream\\Master',
        7 => 'LaravelLang\\Lang\\Plugins\\Jetstream\\V5',
        8 => 'LaravelLang\\Lang\\Plugins\\Laravel\\Master',
        9 => 'LaravelLang\\Lang\\Plugins\\Laravel\\V11',
        10 => 'LaravelLang\\Lang\\Plugins\\Laravel\\V12',
        11 => 'LaravelLang\\Lang\\Plugins\\Nova\\DuskSuite\\Main',
        12 => 'LaravelLang\\Lang\\Plugins\\Nova\\LogViewer\\Main',
        13 => 'LaravelLang\\Lang\\Plugins\\Nova\\V4',
        14 => 'LaravelLang\\Lang\\Plugins\\Nova\\V5',
        15 => 'LaravelLang\\Lang\\Plugins\\Spark\\Paddle',
        16 => 'LaravelLang\\Lang\\Plugins\\Spark\\Stripe',
        17 => 'LaravelLang\\Lang\\Plugins\\UI\\Master',
        18 => 'LaravelLang\\Lang\\Plugins\\UI\\V4',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\moonshine' => 
      array (
        0 => 'LaravelLang\\MoonShine\\Plugins\\V3',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\starter-kits' => 
      array (
        0 => 'LaravelLang\\StarterKits\\Plugins\\Livewire',
        1 => 'LaravelLang\\StarterKits\\Plugins\\React',
        2 => 'LaravelLang\\StarterKits\\Plugins\\Vue',
      ),
    ),
    'packages' => 
    array (
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\actions' => 
      array (
        'class' => 'LaravelLang\\Actions\\Plugin',
        'name' => 'laravel-lang/actions',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\attributes' => 
      array (
        'class' => 'LaravelLang\\Attributes\\Plugin',
        'name' => 'laravel-lang/attributes',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\http-statuses' => 
      array (
        'class' => 'LaravelLang\\HttpStatuses\\Plugin',
        'name' => 'laravel-lang/http-statuses',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\lang' => 
      array (
        'class' => 'LaravelLang\\Lang\\Plugin',
        'name' => 'laravel-lang/lang',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\moonshine' => 
      array (
        'class' => 'LaravelLang\\MoonShine\\Plugin',
        'name' => 'moonshine/moonshine',
      ),
      'C:\\wamp64\\www\\SCCIMP\\vendor\\laravel-lang\\starter-kits' => 
      array (
        'class' => 'LaravelLang\\StarterKits\\Plugin',
        'name' => 'laravel-lang/starter-kits',
      ),
    ),
    'models' => 
    array (
      'directory' => 'C:\\wamp64\\www\\SCCIMP\\app',
    ),
    'map' => 
    array (
      'af' => 
      array (
        'type' => 'Latn',
        'regional' => 'af_ZA',
      ),
      'sq' => 
      array (
        'type' => 'Latn',
        'regional' => 'sq_AL',
      ),
      'am' => 
      array (
        'type' => 'Ethi',
        'regional' => 'am_ET',
      ),
      'ar' => 
      array (
        'type' => 'Arab',
        'regional' => 'ar_AE',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'hy' => 
      array (
        'type' => 'Armn',
        'regional' => 'hy_AM',
      ),
      'as' => 
      array (
        'type' => 'Beng',
        'regional' => 'as_IN',
      ),
      'az' => 
      array (
        'type' => 'Latn',
        'regional' => 'az_AZ',
      ),
      'bm' => 
      array (
        'type' => 'Latn',
        'regional' => 'bm_ML',
      ),
      'bho' => 
      array (
        'type' => 'Deva',
        'regional' => 'bho_IN',
      ),
      'eu' => 
      array (
        'type' => 'Latn',
        'regional' => 'eu_ES',
      ),
      'be' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'be_BY',
      ),
      'bn' => 
      array (
        'type' => 'Beng',
        'regional' => 'bn_BD',
      ),
      'bs' => 
      array (
        'type' => 'Latn',
        'regional' => 'bs_BA',
      ),
      'bg' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'bg_BG',
      ),
      'en_CA' => 
      array (
        'type' => 'Latn',
        'regional' => 'en_CA',
      ),
      'ca' => 
      array (
        'type' => 'Latn',
        'regional' => 'ca_ES',
      ),
      'ceb' => 
      array (
        'type' => 'Latn',
        'regional' => 'ceb_PH',
      ),
      'km' => 
      array (
        'type' => 'Khmr',
        'regional' => 'km_KH',
      ),
      'zh_CN' => 
      array (
        'type' => 'Hans',
        'regional' => 'zh_CN',
      ),
      'zh_HK' => 
      array (
        'type' => 'Hans',
        'regional' => 'zh_HK',
      ),
      'zh_TW' => 
      array (
        'type' => 'Hans',
        'regional' => 'zh_TW',
      ),
      'hr' => 
      array (
        'type' => 'Latn',
        'regional' => 'hr_HR',
      ),
      'cs' => 
      array (
        'type' => 'Latn',
        'regional' => 'cs_CZ',
      ),
      'da' => 
      array (
        'type' => 'Latn',
        'regional' => 'da_DK',
      ),
      'doi' => 
      array (
        'type' => 'Deva',
        'regional' => 'doi_IN',
      ),
      'nl' => 
      array (
        'type' => 'Latn',
        'regional' => 'nl_NL',
      ),
      'en' => 
      array (
        'type' => 'Latn',
        'regional' => 'en_GB',
      ),
      'eo' => 
      array (
        'type' => 'Latn',
        'regional' => 'eo_001',
      ),
      'et' => 
      array (
        'type' => 'Latn',
        'regional' => 'et_EE',
      ),
      'ee' => 
      array (
        'type' => 'Latn',
        'regional' => 'ee_GH',
      ),
      'fi' => 
      array (
        'type' => 'Latn',
        'regional' => 'fi_FI',
      ),
      'fr' => 
      array (
        'type' => 'Latn',
        'regional' => 'fr_FR',
      ),
      'fy' => 
      array (
        'type' => 'Latn',
        'regional' => 'fy_NL',
      ),
      'gl' => 
      array (
        'type' => 'Latn',
        'regional' => 'gl_ES',
      ),
      'ka' => 
      array (
        'type' => 'Geor',
        'regional' => 'ka_GE',
      ),
      'de' => 
      array (
        'type' => 'Latn',
        'regional' => 'de_DE',
      ),
      'de_CH' => 
      array (
        'type' => 'Latn',
        'regional' => 'de_CH',
      ),
      'el' => 
      array (
        'type' => 'Grek',
        'regional' => 'el_GR',
      ),
      'gu' => 
      array (
        'type' => 'Gujr',
        'regional' => 'gu_IN',
      ),
      'ha' => 
      array (
        'type' => 'Latn',
        'regional' => 'ha_NG',
      ),
      'haw' => 
      array (
        'type' => 'Latn',
        'regional' => 'haw',
      ),
      'he' => 
      array (
        'type' => 'Hebr',
        'regional' => 'he_IL',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'hi' => 
      array (
        'type' => 'Deva',
        'regional' => 'hi_IN',
      ),
      'hu' => 
      array (
        'type' => 'Latn',
        'regional' => 'hu_HU',
      ),
      'is' => 
      array (
        'type' => 'Latn',
        'regional' => 'is_IS',
      ),
      'ig' => 
      array (
        'type' => 'Latn',
        'regional' => 'ig_NG',
      ),
      'id' => 
      array (
        'type' => 'Latn',
        'regional' => 'id_ID',
      ),
      'ga' => 
      array (
        'type' => 'Latn',
        'regional' => 'ga_IE',
      ),
      'it' => 
      array (
        'type' => 'Latn',
        'regional' => 'it_IT',
      ),
      'ja' => 
      array (
        'type' => 'Jpan',
        'regional' => 'ja_JP',
      ),
      'kn' => 
      array (
        'type' => 'Knda',
        'regional' => 'kn_IN',
      ),
      'kk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'kk_KZ',
      ),
      'rw' => 
      array (
        'type' => 'Latn',
        'regional' => 'rw_RW',
      ),
      'ko' => 
      array (
        'type' => 'Hang',
        'regional' => 'ko_KR',
      ),
      'ku' => 
      array (
        'type' => 'Latn',
        'regional' => 'ku_TR',
      ),
      'ckb' => 
      array (
        'type' => 'Arab',
        'regional' => 'ckb_IQ',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'ky' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'ky_KG',
      ),
      'lo' => 
      array (
        'type' => 'Laoo',
        'regional' => 'lo_LA',
      ),
      'lv' => 
      array (
        'type' => 'Latn',
        'regional' => 'lv_LV',
      ),
      'ln' => 
      array (
        'type' => 'Latn',
        'regional' => 'ln_CD',
      ),
      'lt' => 
      array (
        'type' => 'Latn',
        'regional' => 'lt_LT',
      ),
      'lg' => 
      array (
        'type' => 'Latn',
        'regional' => 'lg_UG',
      ),
      'lb' => 
      array (
        'type' => 'Latn',
        'regional' => 'lb_LU',
      ),
      'mk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'mk_MK',
      ),
      'mai' => 
      array (
        'type' => 'Deva',
        'regional' => 'mai_IN',
      ),
      'mg' => 
      array (
        'type' => 'Latn',
        'regional' => 'mg_MG',
      ),
      'ml' => 
      array (
        'type' => 'Mlym',
        'regional' => 'ml_IN',
      ),
      'ms' => 
      array (
        'type' => 'Latn',
        'regional' => 'ms_MY',
      ),
      'mt' => 
      array (
        'type' => 'Latn',
        'regional' => 'mt_MT',
      ),
      'mr' => 
      array (
        'type' => 'Deva',
        'regional' => 'mr_IN',
      ),
      'mi' => 
      array (
        'type' => 'Latn',
        'regional' => 'mi_NZ',
      ),
      'mni_Mtei' => 
      array (
        'type' => 'Beng',
        'regional' => 'mni_IN',
      ),
      'mn' => 
      array (
        'type' => 'Mong',
        'regional' => 'mn_MN',
      ),
      'my' => 
      array (
        'type' => 'Mymr',
        'regional' => 'my_MM',
      ),
      'ne' => 
      array (
        'type' => 'Deva',
        'regional' => 'ne',
      ),
      'nb' => 
      array (
        'type' => 'Latn',
        'regional' => 'nb_NO',
      ),
      'nn' => 
      array (
        'type' => 'Latn',
        'regional' => 'nn_NO',
      ),
      'oc' => 
      array (
        'type' => 'Latn',
        'regional' => 'oc_FR',
      ),
      'or' => 
      array (
        'type' => 'Orya',
        'regional' => 'or_IN',
      ),
      'om' => 
      array (
        'type' => 'Latn',
        'regional' => 'om_ET',
      ),
      'ps' => 
      array (
        'type' => 'Arab',
        'regional' => 'ps_AF',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'fa' => 
      array (
        'type' => 'Arab',
        'regional' => 'fa_IR',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'fil' => 
      array (
        'type' => 'Latn',
        'regional' => 'fil_PH',
      ),
      'pl' => 
      array (
        'type' => 'Latn',
        'regional' => 'pl_PL',
      ),
      'pt' => 
      array (
        'type' => 'Latn',
        'regional' => 'pt_PT',
      ),
      'pt_BR' => 
      array (
        'type' => 'Latn',
        'regional' => 'pt_BR',
      ),
      'pa' => 
      array (
        'type' => 'Guru',
        'regional' => 'pa_IN',
      ),
      'qu' => 
      array (
        'type' => 'Latn',
        'regional' => 'qu_PE',
      ),
      'ro' => 
      array (
        'type' => 'Latn',
        'regional' => 'ro_RO',
      ),
      'ru' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'ru_RU',
      ),
      'sa' => 
      array (
        'type' => 'Deva',
        'regional' => 'sa_IN',
      ),
      'sc' => 
      array (
        'type' => 'Latn',
        'regional' => 'sc_IT',
      ),
      'gd' => 
      array (
        'type' => 'Latn',
        'regional' => 'gd_GB',
      ),
      'sr_Cyrl' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'sr_RS',
      ),
      'sr_Latn' => 
      array (
        'type' => 'Latn',
        'regional' => 'sr_RS',
      ),
      'sr_Latn_ME' => 
      array (
        'type' => 'Latn',
        'regional' => 'sr_Latn_ME',
      ),
      'sn' => 
      array (
        'type' => 'Latn',
        'regional' => 'sn_ZW',
      ),
      'sd' => 
      array (
        'type' => 'Arab',
        'regional' => 'sd_PK',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'si' => 
      array (
        'type' => 'Sinh',
        'regional' => 'si_LK',
      ),
      'sk' => 
      array (
        'type' => 'Latn',
        'regional' => 'sk_SK',
      ),
      'sl' => 
      array (
        'type' => 'Latn',
        'regional' => 'sl_SI',
      ),
      'so' => 
      array (
        'type' => 'Latn',
        'regional' => 'so_SO',
      ),
      'es' => 
      array (
        'type' => 'Latn',
        'regional' => 'es_ES',
      ),
      'su' => 
      array (
        'type' => 'Latn',
        'regional' => 'su_ID',
      ),
      'sw' => 
      array (
        'type' => 'Latn',
        'regional' => 'sw_KE',
      ),
      'sv' => 
      array (
        'type' => 'Latn',
        'regional' => 'sv_SE',
      ),
      'tl' => 
      array (
        'type' => 'Latn',
        'regional' => 'tl_PH',
      ),
      'tg' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'tg_TJ',
      ),
      'ta' => 
      array (
        'type' => 'Taml',
        'regional' => 'ta_IN',
      ),
      'tt' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'tt_RU',
      ),
      'te' => 
      array (
        'type' => 'Telu',
        'regional' => 'te_IN',
      ),
      'ti' => 
      array (
        'type' => 'Ethi',
        'regional' => 'ti_ET',
      ),
      'th' => 
      array (
        'type' => 'Thai',
        'regional' => 'th_TH',
      ),
      'tr' => 
      array (
        'type' => 'Latn',
        'regional' => 'tr_TR',
      ),
      'tk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'tk_TM',
      ),
      'ak' => 
      array (
        'type' => 'Latn',
        'regional' => 'ak_GH',
      ),
      'ug' => 
      array (
        'type' => 'Arab',
        'regional' => 'ug_CN',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'uk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'uk_UA',
      ),
      'ur' => 
      array (
        'type' => 'Arab',
        'regional' => 'ur_PK',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'uz_Cyrl' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'uz_UZ',
      ),
      'uz_Latn' => 
      array (
        'type' => 'Latn',
        'regional' => 'uz_UZ',
      ),
      'vi' => 
      array (
        'type' => 'Latn',
        'regional' => 'vi_VN',
      ),
      'cy' => 
      array (
        'type' => 'Latn',
        'regional' => 'cy_GB',
      ),
      'xh' => 
      array (
        'type' => 'Latn',
        'regional' => 'xh_ZA',
      ),
      'yi' => 
      array (
        'type' => 'Hebr',
        'regional' => 'yi_001',
      ),
      'yo' => 
      array (
        'type' => 'Latn',
        'regional' => 'yo_NG',
      ),
      'zu' => 
      array (
        'type' => 'Latn',
        'regional' => 'zu_ZA',
      ),
    ),
  ),
  'localization' => 
  array (
    'inline' => false,
    'align' => true,
    'aliases' => 
    array (
    ),
    'smart_punctuation' => 
    array (
      'enable' => false,
      'common' => 
      array (
        'double_quote_opener' => '“',
        'double_quote_closer' => '”',
        'single_quote_opener' => '‘',
        'single_quote_closer' => '’',
      ),
      'locales' => 
      array (
        'fr' => 
        array (
          'double_quote_opener' => '«&nbsp;',
          'double_quote_closer' => '&nbsp;»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
        'ru' => 
        array (
          'double_quote_opener' => '«',
          'double_quote_closer' => '»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
        'uk' => 
        array (
          'double_quote_opener' => '«',
          'double_quote_closer' => '»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
        'be' => 
        array (
          'double_quote_opener' => '«',
          'double_quote_closer' => '»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
      ),
    ),
    'routes' => 
    array (
      'names' => 
      array (
        'parameter' => 'locale',
        'header' => 'Accept-Language',
        'cookie' => 'Accept-Language',
        'session' => 'Accept-Language',
        'column' => 'locale',
      ),
      'name_prefix' => 'localized.',
      'redirect_default' => false,
    ),
    'models' => 
    array (
      'suffix' => 'Translation',
      'filter' => 
      array (
        'enabled' => true,
      ),
      'helpers' => 'C:\\wamp64\\www\\SCCIMP\\vendor/_laravel_lang',
    ),
    'translators' => 
    array (
      'channels' => 
      array (
        'google' => 
        array (
          'translator' => '\\LaravelLang\\Translator\\Integrations\\Google',
          'enabled' => true,
          'priority' => 1,
        ),
        'deepl' => 
        array (
          'translator' => '\\LaravelLang\\Translator\\Integrations\\Deepl',
          'enabled' => false,
          'priority' => 2,
          'credentials' => 
          array (
            'key' => '',
          ),
        ),
        'yandex' => 
        array (
          'translator' => '\\LaravelLang\\Translator\\Integrations\\Yandex',
          'enabled' => false,
          'priority' => 3,
          'credentials' => 
          array (
            'key' => '',
            'folder' => '',
          ),
        ),
      ),
      'options' => 
      array (
        'preserve_parameters' => true,
      ),
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
        'output_encoding' => '',
        'test_auto_detect' => true,
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => NULL,
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'guess',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
      'cells' => 
      array (
        'middleware' => 
        array (
        ),
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
      'default_ttl' => 10800,
    ),
    'transactions' => 
    array (
      'handler' => 'db',
      'db' => 
      array (
        'connection' => NULL,
      ),
    ),
    'temporary_files' => 
    array (
      'local_path' => 'C:\\wamp64\\www\\SCCIMP\\storage\\framework/cache/laravel-excel',
      'local_permissions' => 
      array (
      ),
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
