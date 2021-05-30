<?php

use entities\Message;
use entities\Sender;
use repositories\SenderRepository;
use model\ModelException;
require_once 'vendor/autoload.php';

$user = 'root';
$password = 'root';
$database = 'examenwa2019';
$server = '192.168.33.22';
$pdo = null;
try {
    $pdo = new PDO("mysql:host=$server;dbname=$database", $user, $password);
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    $senderRepository = new SenderRepository($pdo);
    $id = (int)$_GET['senderid'];
    $sender = $senderRepository->getSenderById($id);
    if($sender == null){
        print($id . " niet gevonden");
    }
    else {
        $countMessages = $sender->countNumberOfMessages();
        print("Sender met name " . $sender->getName() . " heeft " . $countMessages . " berichten:" . "</br>");
        for($i = 0; $i < $countMessages; $i++){
            print($sender->getMessageByIndex($i)->getContents() . "</br>");
        }
    }
}
catch(PDOException $exception){
    throw new ModelException();
}


