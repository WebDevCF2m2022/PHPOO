<?php

namespace model;

// on veut utiliser Exception
use Exception;
// on veut utiliser PDO
use PDO;

class ThemessageManager 
{
        // propriété
        private PDO $pdo;

        // constructeur qui ne contient que notre connexion à la base de données
        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }
    
        // méthode qui permet de récupérer un Theuser en fonction de son id
        public function getThemessageByidTheMessage(int $id): Themessage{
            // préparation de la requête
            $sql = "SELECT * FROM themessage WHERE idTheMessage = :id";
            $stmt = $this->pdo->prepare($sql);
            // association des paramètres
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            // exécution de la requête
            
            try{

                $stmt->execute();
                $result = $stmt->fetch();
                return new Themessage($result);

            }catch(Exception $e){

                return $e ->getMessage();
            }
        }
    
        // on charge tous les Theuser
        public function getAllThemessage(): array{
            // préparation de la requête
            $sql = "SELECT * FROM themessage";
            $stmt = $this->pdo->prepare($sql);
            // exécution de la requête
            $stmt->execute();
            // récupération du résultat
            $result = $stmt->fetchAll();
            // on crée un tableau vide
            $themessages = [];
            // on parcourt le résultat
            foreach ($result as $row){
                // on crée un objet Theuser que l'on ajoute dans le tableau
                $themessages[] = new Theuser($row);
            }
            // on retourne le tableau
            return $themessages;
        }
}