var io = require('socket.io')(6001);

io.on('connection', function(socket){

    console.log('New connection:', socket.id);

    socket.on('message', function(data){
        socket.broadcast.send(data);
    });

    // socket.send('Message from server');

    // socket.emit('server-info', {version: .1});

    // socket.broadcast.send('New user');

    // join to room
    // socket.join('vip', function(error){
    //     console.log(socket.rooms);
    // });

    // socket.to('').emit('server-info', {version: .1});

});

// var cfg = require('./config.json');
// var tw = require('node-tweet-stream')(cfg);
// tw.track('socket.io');
// tw.track('javascript');
// tw.on('tweet', function(tweet){
//     io.emit('tweet', tweet);
// });
