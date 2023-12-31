<?php

require_once '../include/bdd.inc.php';

class Bien {

    private $id_bien;
    private $nom_bien;
    private $rue_bien;
    private $cop_bien;
    private $vil_bien;
    private $sup_bien;
    private $nb_couchage;
    private $nb_piece;
    private $nb_chambre;
    private $descriptif;
    private $ref_bien;
    private $statu_bien;
    private $id_type_bien;

    // constructeur
    public function __construct($id, $nom, $rue, $cop, $vil, $sup, $nbCouchage, $nbPiece, $nbChambre, $descriptif, $statu, $idType) {
        $this->id_bien = $id;
        $this->nom_bien = $nom;
        $this->rue_bien = $rue;
        $this->cop_bien = $cop;
        $this->vil_bien = $vil;
        $this->sup_bien = $sup;
        $this->nb_couchage = $nbCouchage;
        $this->nb_piece = $nbPiece;
        $this->nb_chambre = $nbChambre;
        $this->descriptif = $descriptif;
        $this->ref_bien = $ref_bien;
        $this->statu_bien = $statu;
        $this->id_type_bien = $idType;
    }

    // récupérer l' ID du bien
    public static function getBienById($id) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "SELECT * FROM biens WHERE id_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // insérer un bien
    public static function insertBien($data) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "INSERT INTO biens (nom_bien, rue_bien, cop_bien, vil_bien, sup_bien, nb_couchage, nb_piece, nb_chambre, descriptif, ref_bien, statu_bien, id_type_bien) VALUES (:nom, :rue, :cop, :vil, :sup, :nbCouchage, :nbPiece, :nbChambre, :descriptif, :ref_bien, :statu, :idType)";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

    // mettre à jour un bien
    public static function updateBien($id, $data) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $data[':id'] = $id;
        $sql = "UPDATE biens SET nom_bien = :nom, rue_bien = :rue, cop_bien = :cop, vil_bien = :vil, sup_bien = :sup, nb_couchage = :nbCouchage, nb_piece = :nbPiece, nb_chambre = :nbChambre, descriptif = :descriptif, ref_bien = :ref_bien, statu_bien = :statu, id_type_bien = :idType WHERE id_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

    // supprimer un bien avec l' ID
    public static function deleteBien($id) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "DELETE FROM biens WHERE id_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    // récupérer tous les biens
    public static function getAllBiens() {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "SELECT * FROM biens";
        $stmt = $con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>
