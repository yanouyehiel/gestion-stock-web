<?php

    //Enregistrement
    function saveFournisseur($con, $nom, $prenom, $telephone)
    {
        $req = "INSERT INTO fournisseur (nom_fournisseur, prenom_fournisseur, tel_fournisseur) VALUES ('$nom', '$prenom', '$telephone')";
        if (mysqli_query($con, $req)) {
            $_SESSION['success'] = "Inscription du nouveau fournisseur réussie !";
        } else {
            $_SESSION['error'] = "Erreur requête :".$req;
        }
    }

    //Lister les fournisseurs
    function getFournisseur($con1)
    {
        $stmt = $con1->prepare("SELECT * FROM fournisseur");
        $stmt->execute();

        return $stmt;
    }

    function getFournisseurInfo($con1, $id)
    {
        $stmt = $con1->prepare("SELECT * FROM fournisseur WHERE id_fournisseur=".$id);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }
    
    //Mise à jour d'un fournisseur
    function updateFournisseur($con, $id, $fournisseur)
    {
        try {
            $req = "UPDATE fournisseur SET nom_fournisseur='$fournisseur[0]', prenom_fournisseur='$fournisseur[1]', tel_fournisseur='$fournisseur[2]' WHERE id_fournisseur='$id'";
            $stmt = $con->prepare($req);
            $stmt->execute();

            $_SESSION['success'] = "Modification réussie !";
        } catch (PDOException $th) {
            $_SESSION['error'] = "Erreur requête :".$th->getMessage();
        }
    }
?>