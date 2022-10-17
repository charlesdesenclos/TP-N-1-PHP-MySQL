<?php

class User
{
    private $id_;
    private $pseudo_;
    

    public function __construct($Newid, $Newpseudo)
    {
        $this->id_ = $Newid;
        $this->pseudo_ = $Newpseudo;
           
           
    }
    //permet de se connecter avec connection
    public function connection($pseudo,$password)
        {
            $RequetSQL = "SELECT * FROM user WHERE pseudo ='".$pseudo."' AND password = '".$password."'";
            $resultat = $GLOBALS['bdd'] -> query($RequetSQL);
           
            if ( $resultat-> rowCount() > 0 )
            {
                echo"Vous êtes connectés";
                $_SESSION['Connexion'] = true;
                echo $_SESSION['pseudo'] = $pseudo;
                $_SESSION['connectionValide'] = true;

                
               
                return true;

            }
            else 
            {
                   
                return false;

            }

        }
        //s'occuper de déconnecter l'utilisateurs
        public function deconnexion()
        {
            session_start(); // demarrage de la session
            session_destroy(); // on détruit la/les session(s), soit si vous utilisez une autre session
            header('Location: index.php'); // On redirige
            die();
        }

        // inscription permet de s'inscrire

        public function inscription($pseudo, $password)
        {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);

            // On vérifie si l'utilisateur existe
            $check = $GLOBALS['bdd']->prepare('SELECT pseudo password FROM utilisateurs WHERE pseudo = ?');
            $check->execute(array($pseudo));
            $data = $check->fetch();
            $row = $check->rowCount();

            
                    
            $comptevalide = false;
            if($row == 0)
            {
                $RequetSQL = "INSERT INTO utilisateurs (pseudo, password) VALUES ('".$pseudo."','".$password."')";
                $resultat = $GLOBALS['bdd'] -> query($RequetSQL);
                return $comptevalide = true;
            }
            
        }

        

/*
        // Modification_User permet de modifier les utilisateurs
        public function Modification_user($pseudo, $password)
        {
            
            $requeteuser = $this->_BDD->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
            $requeteuser->execute(array($pseudo));
            $userExist = $requeteuser->rowCount();
            if ($userExist != 1) {
                if ($password == $confmdp) {
                    $req = "UPDATE utilisateurs SET pseudo = '".$pseudo."', password = '".$password."'";
                    $this->_BDD->query($req);
                    header("Location:admin.php");
                    return "modification réussite";
                } else {
                    return "Le Mots de passe n'est pas le même";
                }
            } else if ($this->_login == $pseudo) {
                if ($password == $confmdp) {
                    $req = "UPDATE utilisateurs SET pseudo = '".$pseudo."', password = '".$password."'";
                    $this->_BDD->query($req);
                    header("Location:admin.php");
                    return "modification réussite";
                } else {
                    return "Le Mots de passe n'est pas le même";
                }
            } else {
                return "Se login est déja utiliser par une autre personne";
            }
        }*/
}


?>