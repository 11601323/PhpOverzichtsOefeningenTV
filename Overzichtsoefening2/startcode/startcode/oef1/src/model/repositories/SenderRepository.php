<?php namespace repositories;

use entities\Message;
use model\ModelException;
use PDO;
use entities\Sender;

class SenderRepository{
	private $pdo;

	public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getSenderById($id){
	    try{
            $selectQuery = 'SELECT sender.name, message.id, message.contents FROM sender, message WHERE sender.id = message.sender_id and sender.id=:id ';
            $statement = $this->pdo->prepare($selectQuery);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();


            $sender = null;
            while( ( $row = $statement->fetch() ) !== false ) {
                if($sender == null) {
                    $sender = Sender::make($id, $row['name']);
                }
                $message = Message::make($row['id'], $row['contents']);
                $sender->addMessage($message);
            }

            if($sender == null){
                return null;
            }
            return $sender;
        } catch(\Exception $exception){
	        throw new ModelException();
        }

    }
}
