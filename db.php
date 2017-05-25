<?php
function connect()
{
    return new PDO('mysql:host=localhost:3306;dbname=myfirstdb',"root","root");
}

function validate_user($username, $password)
{
    try{
        $sqlCommand = "SELECT * FROM customers WHERE NICK = :username";

        $db = connect();
        $input = $db->prepare($sqlCommand);
        $input->bindParam(':username',$username);
        $input->execute();
        $result = $input->fetchAll();
        foreach ($result as $row)
        {
            $crypted = crypt($password,$row["Salt"]);
            $salt =  $row["Salt"];

            if($crypted === $row["Password"])
            {
                return $row["ID"];
            }
        }
    }catch(PDOException $ex){
        return -1;
    }

    return -1;
}

function new_user($username,$password,$email){
    try{
        require_once('mail.php');
        $sqlCommand = "INSERT INTO `customers`(`Nick`, `Password`,`Salt`, `Email`) VALUES (:username,:password,:salt,:email)";
        $db = connect();

        $salt = substr(str_shuffle(MD5(microtime())), 0, 10);

        $crypted = crypt($password,$salt);

        $input = $db->prepare($sqlCommand);
        $input->bindParam(':username',$username);
        $input->bindParam(':password',$crypted);
        $input->bindParam(':salt',$salt);
        $input->bindParam(':email',$email);

        $input->execute();
        $result = $input->fetchAll();


        if($result === false ) return false;
        send_email($email,"Welcome to Project.php!","Hello, I'm Ika, and welcome to Project.php. Thank you so much for signing up, I hope you'll enjoy!");
        return true;
    }catch(PDOException $ex){
        return false;
    }
}

function query_database($SQLCommand)
{
    $db = connect();
    return $db->query($SQLCommand);
}


function insert_item($Name,$Type,$Power,$Description)
{
    $Command = "INSERT INTO item VALUES('$Name','$Type','$Power','$Description')";
    $db = connect();
    $input = $db->prepare($Command);
    $input->execute();
    return;
}

function retrieve_item($Name)
{
    return query_database("SELECT * FROM item WHERE itemName = '$Name'");
}
?>