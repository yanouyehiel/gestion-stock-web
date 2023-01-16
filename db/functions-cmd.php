<?php 

    //Ajouter une commande
    function addCommande($con, $code, $id_client)
    {
        $set = '0123456789';
        $num = substr(str_shuffle($set), 0, 8);
        $date = date('Y-m-d');

        $req = "INSERT INTO commande (num_commande, date_commande, id_client, code_produit) VALUES ('$num', '$date', '$id_client', '$code')";
        $stmt = $con->prepare($req);
        $stmt->execute();

        $_SESSION['success'] = 'Commande validée !';
    }

    function getCommandes($con)
    {
        $stmt = $con->prepare("SELECT * FROM commande");
        $stmt->execute();

        return $stmt;
    }

?>