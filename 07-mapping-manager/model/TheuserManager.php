<?php

namespace model;

// on veut utiliser Exception
use Exception;
// on veut utiliser PDO
use PDO;


// Classe Manager de Theuser
class TheuserManager
{
    // propriété
    private PDO $pdo;

    // constructeur qui ne contient que notre connexion à la base de données
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // méthode qui permet de récupérer un Theuser en fonction de son id
    public function getTheuserByIdTheUser(int $id): Theuser{
        // préparation de la requête
        $sql = "SELECT * FROM theuser WHERE idTheUser = :id";
        $stmt = $this->pdo->prepare($sql);
        // association des paramètres
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        // exécution de la requête
        $stmt->execute();
        // récupération du résultat
        $result = $stmt->fetch();
        // si on a un résultat, on hydrate un objet Theuser et on le retourne
        if($result){
            return new Theuser($result);
        }else{
            throw new Exception("Aucun Theuser ne correspond à l'id $id");
        }
    }

    // on charge tous les Theuser
    public function getAllTheuser(): array{
        // préparation de la requête
        $sql = "SELECT * FROM theuser";
        $stmt = $this->pdo->prepare($sql);
        // exécution de la requête
        $stmt->execute();
        // récupération du résultat
        $result = $stmt->fetchAll();
        // on crée un tableau vide
        $theusers = [];
        // on parcourt le résultat
        foreach ($result as $row){
            // on crée un objet Theuser que l'on ajoute dans le tableau
            $theusers[] = new Theuser($row);
        }
        // on retourne le tableau
        return $theusers;
    }

}