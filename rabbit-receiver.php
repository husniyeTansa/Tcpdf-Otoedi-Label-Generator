<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once __DIR__.'/vendor/autoload.php';

$connection = new AMQPStreamConnection('10.1.1.74', 5672, 'mqadmin', 'q_9IAm-7Ieipx0PFxw_8rPpi9Y');
$channel = $connection->channel();

// $channel->queue_declare('test-queue', false, false, false, false);

$callback = function ($msg){

    file_put_contents("C:\\xampp\htdocs\Tcpdf-Otoedi-Label-Generator\data2.json", ($msg->body));
  //  exec("php C:\\xampp\htdocs\Tcpdf-Otoedi-Label-Generator\index.php");
};


$channel->basic_consume('test-queue', '', false, true, false, false, $callback);


while ($channel->is_open()) {
    $channel->wait();
}
$channel->close();
$connection->close();
?>