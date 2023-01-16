<?php

    //Enregistrement
    function saveCatP($con, $codeCat, $libelleCat)
    {
        $req = "INSERT INTO categorie (nom_categorie, code_categorie) VALUES ('$libelleCat', '$codeCat')";
        if (mysqli_query($con, $req)) {
            $_SESSION['success'] = "Insertion catégorie réussie !";
        } else {
            $_SESSION['error'] = "Erreur requête :".$req;
        }
    }

    //Lister les catégories
    function getCategories($con)
    {
        $stmt = $con->prepare("SELECT * FROM categorie");
        $stmt->execute();

        return $stmt;
    }

    //Envoie une catégorie précise
    function getNomCategorie($con, $id)
    {
        $stmt = $con->prepare("SELECT * FROM categorie WHERE id_categorie=".$id);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row['nom_categorie'];
    }

    //Mise à jour
    function updateCatP($con, $idCat, $codeCat, $libelleCat)
    {
        $req = "UPDATE categorie SET code_categorie='$codeCat', nom_categorie='$libelleCat' WHERE id_categorie='$idCat'";
        if (mysqli_query($con, $req)) {
            $_SESSION['success'] = "Mise à jour catégorie réussie !";
        } else {
            $_SESSION['error'] = "Erreur requête :".$req;
        }
    }
?>