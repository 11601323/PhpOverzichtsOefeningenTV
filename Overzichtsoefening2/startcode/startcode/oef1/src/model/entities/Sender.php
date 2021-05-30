<?php namespace entities;

use model\ModelException;

class Sender
{
    private $id;
    private $name;
    private $messages;

    private function __construct($id, $name)
    {
        if ($id <= 0 || empty($name)) {
            throw new ModelException("Id or name is wrong!");
        }
        $this->id = $id;
        $this->name = $name;
        $this->messages = [];

    }

    public static function make($id, $name)
    {
        return new self($id, $name);
    }

    public function addMessage(Message $message){
        array_push($this->messages, $message);
    }

    public function countNumberOfMessages() : int{
        return count($this->messages);
    }

    public function getMessageByIndex($index){
        return $this->messages[$index];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }




}
