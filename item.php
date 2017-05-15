<?php

/**
 * Created by PhpStorm.
 * User: IKA
 * Date: 2017-05-15
 * Time: 10:33
 */
class item
{
    private $name;
    private $desc;
    private $pwr;
    private $type;

    function _construct($name,$type,$power,$desc){
        $this->name = $name;
        $this->desc = $desc;
        $this->pwr = $power;
        $this->type = $type;
    }

    function _toString(){
        $string = "This is a $this->type known as a $this->name of power $this->pwr , $this->desc";
        return $string;
    }

}

function read_record($name){
    $queried = retrieve_item($name);
    return new item($queried[0],$queried[1],$queried[2],$queried[3]);
}