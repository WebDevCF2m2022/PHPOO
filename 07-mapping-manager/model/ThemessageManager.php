<?php

namespace model;

use Exception;
use PDO;

class ThemessageManager
{
    // attribut
    private PDO $pdo;

    // constructeur qui ne contient que notre connexion à la base de données
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // méthode qui permet de récupérer un Themessage en fonction de son id
    public function getThemessageByIdTheMessage(int $id): Themessage{
        // préparation de la requête
        $sql = "SELECT * FROM themessage WHERE idTheMessage = :id";
        $stmt = $this->pdo->prepare($sql);
        // association des paramètres
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        // exécution de la requête
        $stmt->execute();
        // récupération du résultat
        $result = $stmt->fetch();
        // si on a un résultat, on hydrate un objet Themessage et on le retourne
        if($result){
            return new Themessage($result);
        }else{
            throw new Exception("Aucun Themessage ne correspond à l'id $id");
        }
    }

    // on charge tous les Themessage
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
            // on crée un objet Themessage que l'on ajoute dans le tableau
            $themessages[] = new Themessage($row);
        }
        // on retourne le tableau
        return $themessages;
    }

}