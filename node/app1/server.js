var http = require('http');

var server = http.createServer(function(req, res) {
res.writeHead(200);
res.end('Hi everybody!');
});
server.listen(9090);
console.log('Server running at http://APP_PRIVATE_IP_ADDRESS:8080/');