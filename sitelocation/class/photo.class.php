<?php

require_once '../include/bdd.inc.php';

class Photo
{
    private $id_photo;
    private $nom_photo;
    private $lien_photo;
    private $id_bien;
    private $con;

    public function __construct($id_photo, $nom_photo, $lien_photo, $id_bien, $con)
    {
        $this->id_photo = $id_photo;
        $this->nom_photo = $nom_photo;
        $this->lien_photo = $lien_photo;
        $this->id_bien = $id_bien;
        $this->con = $con;
    }

    public function getIdPhoto()
    {
        return $this->id_photo;
    }

    public function getNomPhoto()
    {
        return $this->nom_photo;
    }

    public function getLienPhoto()
    {
        return $this->lien_photo;
    }

    public function getIdBien()
    {
        return $this->id_bien;
    }

    public function getAllPhotos()
    {
        try {
            $sql = "SELECT * FROM photo";
            $stmt = $this->con->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
        }
    }

    public function getOnePhoto($id)
    {
        $data = [':id' => $id];
        $sql = "SELECT * FROM photo WHERE id_photo = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertPhoto($nom_photo, $lien_photo, $id_bien)
    {
        $data = [
            ':nom_photo' => $nom_photo,
            ':lien_photo' => $lien_photo,
            ':id_bien' => $id_bien,
        ];
        $sql = "INSERT INTO photo (nom_photo, lien_photo, id_bien) VALUES (:nom_photo, :lien_photo, :id_bien)";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($data);
    }

    public function updatePhoto($id_photo, $nom_photo, $lien_photo, $id_bien)
    {
        $data = [
            ':id_photo' => $id_photo,
            ':nom_photo' => $nom_photo,
            ':lien_photo' => $lien_photo,
            ':id_bien' => $id_bien,
        ];
        $sql = "UPDATE photo SET nom_photo = :nom_photo, lien_photo = :lien_photo, id_bien = :id_bien WHERE id_photo = :id_photo";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($data);
    }

    public function deletePhoto($id_photo)
    {
        $data = [':id_photo' => $id_photo];
        $sql = "DELETE FROM photo WHERE id_photo = :id_photo";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($data);
    }
}
?>

