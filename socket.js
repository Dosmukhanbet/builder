var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('offers-channel');

redis.on('message', function(channel, message) {

    //console.log(channel, message);
    message = JSON.parse(message);

    io.emit(channel, message);
});

server.listen(3000);