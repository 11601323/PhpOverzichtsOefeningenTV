<?php namespace entities;

use model\ModelException;

class Message{
	private $id;
	private $contents;

	private function __construct($id, $contents)
    {
        if($id <= 0 || empty($contents)){
            throw new ModelException("Id or contents is wrong!");
        }
        $this->id = $id;
        $this->contents = $contents;

    }

    public static function make($id, $contents){
	    return new self($id, $contents);
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
    public function getContents()
    {
        return $this->contents;
    }


}
