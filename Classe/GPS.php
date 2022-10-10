<?php
class GPS
{
    //Private
    private $_id;
    private $_latitude;
    private $_longitude;


    //Public
    public function __construct($id, $latitude, $longitude)
    {
        $this->_id = $id;
        $this->_latitude = $latitude;
        $this->_longitude = $longitude;
    }
    //Fonction qui permet d'ajouter des coordonnées en base de données elle attend en paramètre un nom, latitude et la longitude
    public function addcoordonnees($latitude, $longitude)
    {
        $this->_bdd->query("INSERT INTO GPS (`id`, `latitude`, `longitude`) VALUES ('".$id."','".$latitude."','"..$longitude"')");
    }

    


    //function qui permet de récuper l'id du bateau elle prend en parametre l'id du bateau et return rien
    public function getbateau($id)
    {
        $idbateau = $this->_bdd->query("SELECT * FROM `bateau` WHERE `id` = '$id'");
        $data = $idbateau->fetch();
        $this->_idBateau = $data["id"];
      
    }
    
    
    

    //Fonction qui permet de mettre à jour les coordonnées GPS elle attend en paramètre latitude et la longitude
    public function updatecoordonnees($latitude, $longitude)
    {
        $requpdatecoordonnees = $this->_bdd->prepare("UPDATE GPS SET `latitude`='".$latitude."',`longitude`='".$longitude."'");
        $requpdatecoordonnees->execute();
    }
    

    //function qui permet de suprimer des bateau en base elle attend en parametre l'id du bateau
    public function removeBateau($id)
    {
        $this->_bdd->query("DELETE FROM `bateau` WHERE `id` ='".$id."'");
    }

    //function qui permet de suprimer des coordoner en base elle attend en parametre l'id de la cordonner
    public function removeGPS($id)
    {
        $this->_bdd->query("DELETE FROM GPS WHERE `id` = '".$id."'");
    }
   

   
    


    //Fonction qui retourne latitude
    public function getlatitude()
    {
        return $this->_latitude;
    }
    //Fonction qui retourne longitude
    public function getlongitude()
    {
        return $this->_longitude;
    }
   
    //fonction qui return l'id de la cordonner
    public function getid(){
        return $this->_id;
    }

  
}
?>