<?php 

try{
    $pdo = new PDO('mysql:host=localhost;dbname=sos','root','');
    //echo'Connection Successful!';

    
}catch(PDOException $f){
    
    echo $f->getmessage();
}


?>