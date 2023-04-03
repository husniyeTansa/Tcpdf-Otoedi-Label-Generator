<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;

include "asn-type/ford/index_ford.php";

require_once __DIR__ . '/vendor/autoload.php';

$connection = new AMQPStreamConnection('10.1.1.74', 5672, 'mqadmin', 'q_9IAm-7Ieipx0PFxw_8rPpi9Y');
$channel = $connection->channel();

// $channel->queue_declare('test-queue', false, false, false, false);

$callback = function ($msg) {

    try {
        file_put_contents("C:\\xampp\htdocs\Tcpdf-Otoedi-Label-Generator\data.json", ($msg->body));
        $exec_path = __DIR__ . "/create-asn/" . $msg->body->collection['labelType'] . "/index.php";
        exec($exec_path);
    } catch (Exception $exception) {
        $error_log_file = fopen("log_error.txt", "a") or die("Unable to open file!");
        fwrite($error_log_file, $exception);
        fclose($error_log_file);
    }

};

$channel->basic_consume('test-queue', '', false, true, false, false, $callback);

while ($channel->is_open()) {
    $channel->wait();
}

$channel->close();
$connection->close();
