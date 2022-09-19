<?php 
        
      
        try 
    {
        $bdd = new PDO("mysql:host=192.168.65.102;dbname=Site-GPS;charset=utf8","root", "root");

        
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
       

    
?>