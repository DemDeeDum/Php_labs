'use strict';
var port = process.env.PORT || 1337;
var http = require('http');
var io = require('socket.io')(http);


http.createServer(port, function (req, res) {
    if (req.url == '/') {
        res.sendFile(__dirname + "/index.html");
    }
});

io.on('connection', function (socket) {
   
    socket.on('send message', function (msg) {
        io.emit('receive message', msg);
    });
});

http.listen(port, function () {
    console.log('listening on *:' + port);
});
