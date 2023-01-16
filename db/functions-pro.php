<?php 

    //Enregistrement
    function saveProduit($con, $produit)
    {
        $req = "INSERT INTO produit (code_produit, libelle_produit, qte_produit, prix_produit, id_categorie) VALUES ('$produit[0]', '$produit[1]', '$produit[2]', '$produit[3]', '$produit[4]')";
        if (mysqli_query($con, $req)) {
            $_SESSION['success'] = "Insertion produit réussie !";
        } else {
            $_SESSION['error'] = "Erreur requête :".$req;
        }
    }

    //Lister les produits
    function getProduits($con1)
    {
        $stmt = $con1->prepare("SELECT * FROM produit");
        $stmt->execute();

        return $stmt;
    }

    //Donner les informations d'un produit
    function getInfoProduit($con, $code)
    {
        $stmt = $con->prepare("SELECT * FROM produit WHERE code_produit=".$code);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }

    //Mise à jour d'un produit
    function updateProduit($con, $code, $produit)
    {
        try {
            $req = "UPDATE produit SET code_produit='$produit[0]', libelle_produit='$produit[1]', qte_produit='$produit[2]', prix_produit='$produit[3]', id_categorie='$produit[4]' WHERE code_produit='$code'";
            $stmt = $con->prepare($req);
            $stmt->execute();

            $_SESSION['success'] = "Modification réussie !";
        } catch (PDOException $th) {
            $_SESSION['error'] = "Erreur requête :".$th->getMessage();
        }
    }

    //Supprimer un produit
    function deleteProduit($con, $code)
    {
        try {
            $stmt = $con->prepare("DELETE FROM produit WHERE code_produit=".$code);
            $stmt->execute();

            $_SESSION['success'] = "Suppression réussie !";
        } catch (PDOException $th) {
            $_SESSION['error'] = "Erreur requête :".$th->getMessage();
        }
    }

?>