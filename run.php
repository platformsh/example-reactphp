<?php

use Psr\Http\Message\ServerRequestInterface;
use React\EventLoop\Factory;
use React\Http\Response;
use React\Http\Server as HttpServer;
use React\Socket\Server as SocketServer;

require 'vendor/autoload.php';

$loop = Factory::create();

$server = new HttpServer(function (ServerRequestInterface $request) {
    return new Response(
        200,
        ['Content-Type' => 'text/plain'],
        "Hello World!\n"
    );
});

$socket = new SocketServer(getenv('PORT'), $loop);
$server->listen($socket);

$loop->run();
