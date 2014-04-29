<?php

use Touki\IRC\Application;
use Touki\IRC\EventDispatcher;
use Touki\IRC\ResponseFactory;
use Touki\IRC\Socket;
use Touki\IRC\Request\TypedRequest;
use Touki\IRC\Event\ApplicationEvent;
use Touki\IRC\Event\MessageResponseEvent;
use Touki\IRC\EventListener\SocketListener;
use Touki\IRC\EventListener\PingListener;

require __DIR__.'/vendor/autoload.php';

$dispatcher = new EventDispatcher;

$app = new Application($dispatcher);
$factory = new ResponseFactory;
$socketListener = new SocketListener($factory);
$pingListener = new PingListener;

$app->on('app.start', function (ApplicationEvent $event, EventDispatcher $dispatcher) {
    $requester = $event->getRequester();

    $requester->send(new TypedRequest('USER', 'ToukiBot ToukiBot ToukiBot ToukiBot'));
    $requester->send(new TypedRequest('NICK', 'ToukiBot'));
});

$app->on('socket.read', array($socketListener, 'onSocketRead'));
$app->on('response.irc', array($pingListener, 'onIrcResponse'));

$app->on('response.message', function (MessageResponseEvent $event, EventDispatcher $dispatcher) {
    $message = $event->getResponse();

    echo sprintf("<<< [%s] - %s: %s%s", $message->getType(), $message->getFrom()->getNickname(), $message->getContent(), PHP_EOL);
});

$app->run('irc.onlinegamesnet.net', 6667);
