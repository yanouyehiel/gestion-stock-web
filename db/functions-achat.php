<?php

    //Enregistrer une commande auprès du fournisseur
    function saveCommande($con, $commande)
    {
        try {
            $date = date('Y-m-d H:i:s');
            $req = "INSERT INTO livrer (code_produit, id_fournisseur, date_livrer, qte_livrer) VALUES ('$commande[0]', '$commande[1]', '$date', '$commande[2]')";
            $stmt = $con->prepare($req);
            $stmt->execute();

            $_SESSION['success'] = 'Votre commande est bien envoyé !';
        } catch (PDOException $th) {
            $_SESSION['error'] =  'Une erreur est survenue :'.$th->getMessage();
        }
    }
    
    function getCommandes($con)
    {
        try {
            $req = "SELECT * FROM livrer";
            $stmt = $con->prepare($req);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $th) {
            $_SESSION['error'] =  'Une erreur est survenue :'.$th->getMessage();
        }
    }

    function getInfoFournisseur($con, $id)
    {
        try {
            $req = "SELECT * FROM fournisseur WHERE id_fournisseur=".$id;
            $stmt = $con->prepare($req);
            $stmt->execute();
            $row = $stmt->fetch();

            return $row;
        } catch (PDOException $th) {
            $_SESSION['error'] =  'Une erreur est survenue :'.$th->getMessage();
        }
    }

?>