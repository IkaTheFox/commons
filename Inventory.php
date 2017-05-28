<?php

/**
 * Created by PhpStorm.
 * User: IKA
 * Date: 2017-05-25
 * Time: 13:35
 */
require_once ('db.php');

class Inventory
{
    var $items;
    function __construct($CustomerID)
    {
        $db = connect();
        $SQLCommand = 'SELECT i.itemName, i.itemType, i.itemPower, i.itemDescription, inv.Equipped FROM
        `inventory` AS inv, `item` AS i WHERE 
        inv.Item=i.itemName AND
        inv.Owner=:ID;';
        $input = $db->prepare($SQLCommand);
        $input->bindParam(':ID',$CustomerID);
        $input->execute();
        $this->items = $input->fetchAll();
    }

    function getitems(){
        return $this->items;
    }
    function getitem($row){
        return $this->items[$row];
    }
    function count(){
        return count($this->items);
    }
}