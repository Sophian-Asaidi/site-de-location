<?php
require_once '../class/bien.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addBien'])) {
    $data = [
        ':nom' => $_POST['nom'],
        ':rue' => $_POST['rue'],
        ':cop' => $_POST['cop'],
        ':vil' => $_POST['vil'],
        ':sup' => $_POST['sup'],
        ':nbCouchage' => $_POST['nb_couchage'],
        ':nbPiece' => $_POST['nb_piece'],
        ':nbChambre' => $_POST['nb_chambre'],
        ':descriptif' => $_POST['descriptif'],
        ':ref_bien' => $_POST['ref_bien'],
        ':statu' => $_POST['statu_bien'],
        ':idType' => $_POST['id_type_bien']
    ];
    Bien::insertBien($data);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBien'])) {
    $id = $_POST['id'];
    $data = [':id' => $id];    
    if (!empty($_POST['nom'])) {
        $data[':nom'] = $_POST['nom'];
    }
    if (!empty($_POST['rue'])) {
        $data[':rue'] = $_POST['rue'];
    }
    if (!empty($_POST['cop'])) {
        $data[':cop'] = $_POST['cop'];
    }
    if (!empty($_POST['vil'])) {
        $data[':vil'] = $_POST['vil'];
    }
    if (!empty($_POST['sup'])) {
        $data[':sup'] = $_POST['sup'];
    }
    if (!empty($_POST['nb_couchage'])) {
        $data[':nbCouchage'] = $_POST['nb_couchage'];
    }
    if (!empty($_POST['nb_piece'])) {
        $data[':nbPiece'] = $_POST['nb_piece'];
    }
    if (!empty($_POST['nb_chambre'])) {
        $data[':nbChambre'] = $_POST['nb_chambre'];
    }
    if (!empty($_POST['descriptif'])) {
        $data[':descriptif'] = $_POST['descriptif'];
    }
    if (!empty($_POST['ref_bien'])) {
        $data[':ref_bien'] = $_POST['ref_bien'];
    }
    if (!empty($_POST['statu_bien'])) {
        $data[':statu'] = $_POST['statu_bien'];
    }
    if (!empty($_POST['id_type_bien'])) {
        $data[':idType'] = $_POST['id_type_bien'];
    }
    Bien::updateBien($id, $data);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBien'])) {
    $id = $_POST['delete_id'];
    Bien::deleteBien($id);
}

$biens = Bien::getAllBiens();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gestion des Biens</title>
    </head>
    <body>
        <h1>Liste des Biens</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Rue</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Surface</th>
                <th>Nombre de Couchages</th>
                <th>Nombre de Pièces</th>
                <th>Nombre de Chambres</th>
                <th>Descriptif</th>
                <th>Référence</th>
                <th>Statut</th>
                <th>Type de Bien</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($biens as $bien) : ?>
                <tr>
                    <td><?= $bien['id_bien'] ?></td>
                    <td><?= $bien['nom_bien'] ?></td>
                    <td><?= $bien['rue_bien'] ?></td>
                    <td><?= $bien['cop_bien'] ?></td>
                    <td><?= $bien['vil_bien'] ?></td>
                    <td><?= $bien['sup_bien'] ?></td>
                    <td><?= $bien['nb_couchage'] ?></td>
                    <td><?= $bien['nb_piece'] ?></td>
                    <td><?= $bien['nb_chambre'] ?></td>
                    <td><?= $bien['descriptif'] ?></td>
                    <td><?= $bien['ref_bien'] ?></td>
                    <td><?= $bien['statu_bien'] ?></td>
                    <td><?= $bien['id_type_bien'] ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="delete_id" value="<?= $bien['id_bien'] ?>">
                            <button type="submit" name="deleteBien">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Ajouter un Bien</h2>
        <form method="post">
            <input type="text" name="nom" placeholder="Nom du Bien" required>
            <input type="text" name="rue" placeholder="Adresse" required>
            <input type="text" name="cop" placeholder="Code Postal" required>
            <input type="text" name="vil" placeholder="Ville" required>
            <input type="text" name="sup" placeholder="Surface" required>
            <input type="text" name="nb_couchage" placeholder="Nombre de Couchages" required>
            <input type="text" name="nb_piece" placeholder="Nombre de Pièces" required>
            <input type="text" name="nb_chambre" placeholder="Nombre de Chambres" required>
            <input type="text" name="descriptif" placeholder="Descriptif" required>
            <input type="text" name="ref_bien" placeholder="Référence" required>
            <input type="text" name="statu_bien" placeholder="Statut" required>
            <input type="text" name="id_type_bien" placeholder="ID du Type de Bien" required>
            <button type="submit" name="addBien">Ajouter</button>
        </form>

        <h2>Modifier un Bien</h2>
        <form method="post">
            <input type="text" name="id" placeholder="ID du Bien à mettre à jour" required>
            <input type="text" name="nom" placeholder="Nouveau Nom" required>
            <input type="text" name="rue" placeholder="Nouvelle Adresse" required>
            <input type="text" name="cop" placeholder="Nouveau Code Postal" required>
            <input type="text" name="vil" placeholder="Nouvelle Ville" required>
            <input type="text" name="sup" placeholder="Nouvelle Surface">
            <input type="text" name="nb_couchage" placeholder="Nouveau Nombre de Couchages" required>
            <input type="text" name="nb_piece" placeholder="Nouveau Nombre de Pièces" required>
            <input type="text" name="nb_chambre" placeholder="Nouveau Nombre de Chambres"required>
            <input type="text" name="descriptif" placeholder="Nouveau Descriptif"required>
            <input type="text" name="ref_bien" placeholder="Nouvelle Référence" required>
            <input type="text" name="statu_bien" placeholder="Nouveau Statut" required>
            <input type="text" name="id_type_bien" placeholder="Nouvel ID du Type de Bien" required>
            <button type="submit" name="updateBien">Mettre à jour</button>
        </form>
    </body>
</html>
