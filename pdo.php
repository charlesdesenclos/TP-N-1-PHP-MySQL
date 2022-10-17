<?php 
        try 
    {
        $bdd = new PDO("mysql:host=mysql-dupontreuetheo.alwaysdata.net;dbname=dupontreuetheo_sitegps;charset=utf8","272593_theo", "Mozart2106@");   
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>