var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('offers-channel');

redis.on('message', function(channel, message) {

    message = JSON.parse(message);
    console.log(message);
    io.emit(channel + '-' + message.jobid, message);
});


redis.subscribe('invites-channel');
redis.on('message', function(channel, message) {

    message = JSON.parse(message);
    console.log(message + 'ok');
    io.emit(channel + '-' + message, message);
});

server.listen(3000);