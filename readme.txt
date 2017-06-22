Building a Realtime Chat App with Laravel 5.4 and VueJS (with Pusher)
https://jplhomer.org/2017/01/building-realtime-chat-app-laravel-5-4-vuejs/

Laravel Echo Server
https://github.com/tlaverdure/laravel-echo-server

------------------------------

Для Pusher:

    Файл: .env
BROADCAST_DRIVER=pusher

    Файл: resources/assets/js/bootstrap.js

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '1d91fea598d48b36c899',
    cluster: 'eu',
    encrypted: true
});

------------------------------

Для Socket.io:

    Файл: .env

BROADCAST_DRIVER=redis


    Файл: resources/assets/js/bootstrap.js

window.Echo = new Echo({
    broadcaster:  'socket.io',
    host: 'http://' + window.location.hostname + ':6001'
});

    Файл: laravel-echo-server.json
(должны быть одинаковы, как в resources/assets/js/bootstrap.js)
"authHost": "http://laravel-first.loc",
"host": "laravel-first.loc",
"databaseConfig": {
	"redis" : {
		"port": "6379",
		"host": "localhost"
	}
},

    Файл: resources/views/layouts/app.blade.php (вставить перед </head>)
<!-- socket.io -->
<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
------------------------------