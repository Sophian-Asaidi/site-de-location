<?php

require_once '../include/bdd.inc.php';

class Reservation {

    private $id_reservation;
    private $dad_resa;
    private $daf_resa;
    private $commentaire;
    private $moderation;
    private $annulation;
    private $id_bien;
    private $id_client;
    private $con;

    public function __construct($id_reservation, $dad_resa, $daf_resa, $commentaire, $moderation, $annulation, $id_bien, $id_client, $con) {
        $this->id_reservation = $id_reservation;
        $this->dad_resa = $dad_resa;
        $this->daf_resa = $daf_resa;
        $this->commentaire = $commentaire;
        $this->moderation = $moderation;
        $this->annulation = $annulation;
        $this->id_bien = $id_bien;
        $this->id_client = $id_client;
        $this->con = $con;
    }

    public function getIdReservation() {
        return $this->id_reservation;
    }

    public function getDadResa() {
        return $this->dad_resa;
    }

    public function getDafResa() {
        return $this->daf_resa;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function getModeration() {
        return $this->moderation;
    }

    public function getAnnulation() {
        return $this->annulation;
    }

    public function getIdBien() {
        return $this->id_bien;
    }

    public function getIdClient() {
        return $this->id_client;
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM reservation";
            $stmt = $this->con->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
        }
    }

    public function getOne($id) {
        $data = [':id' => $id];
        $sql = "SELECT * FROM reservation WHERE id_reservation = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($dad_resa, $daf_resa, $commentaire, $moderation, $annulation, $id_bien, $id_client) {
        $data = [
            ':dad_resa' => $dad_resa,
            ':daf_resa' => $daf_resa,
            ':commentaire' => $commentaire,
            ':moderation' => $moderation,
            ':annulation' => $annulation,
            ':id_bien' => $id_bien,
            ':id_client' => $id_client,
        ];
        $sql = "INSERT INTO reservation (dad_resa, daf_resa, commentaire, moderation, annulation, id_bien, id_client) VALUES (:dad_resa, :daf_resa, :commentaire, :moderation, :annulation, :id_bien, :id_client)";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id_reservation, $dad_resa, $daf_resa, $commentaire, $moderation, $annulation, $id_bien, $id_client) {
        $data = [
            ':id_reservation' => $id_reservation,
            ':dad_resa' => $dad_resa,
            ':daf_resa' => $daf_resa,
            ':commentaire' => $commentaire,
            ':moderation' => $moderation,
            ':annulation' => $annulation,
            ':id_bien' => $id_bien,
            ':id_client' => $id_client,
        ];
        $sql = "UPDATE reservation SET dad_resa = :dad_resa, daf_resa = :daf_resa, commentaire = :commentaire, moderation = :moderation, annulation = :annulation, id_bien = :id_bien, id_client = :id_client WHERE id_reservation = :id_reservation";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id_reservation) {
        $data = [':id_reservation' => $id_reservation];
        $sql = "DELETE FROM reservation WHERE id_reservation = :id_reservation";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($data);
    }

}
