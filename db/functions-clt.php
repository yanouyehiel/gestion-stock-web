<?php

    function saveClient($con, $client)
    {
        $req = "INSERT INTO client (nom_client, prenom_client, tel_client) VALUES ('$client[0]', '$client[1]', '$client[2]')";
        if (mysqli_query($con, $req)) {
            $_SESSION['success'] = "Insertion client réussie !";
        } else {
            $_SESSION['error'] = "Erreur requête :".$req;
        }
    }

    function getClients($con)
    {
        $stmt = $con->prepare("SELECT * FROM client");
        $stmt->execute();

        return $stmt;
    }

    function getInfoClient($con, $id)
    {
        $stmt = $con->prepare("SELECT * FROM client WHERE id_client=".$id);
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row;
    }

    function updateClient($con, $id, $client)
    {
        try {
            $req = "UPDATE client SET nom_client='$client[0]', prenom_client='$client[1]', tel_client='$client[2]' WHERE id_client='$id'";
            $stmt = $con->prepare($req);
            $stmt->execute();

            $_SESSION['success'] = "Modification réussie !";
        } catch (PDOException $th) {
            $_SESSION['error'] = "Erreur requête :".$th->getMessage();
        }
    }

    function removeClient($con, $id)
    {
        try {
            $req = "DROP FROM client WHERE id_client=".$id;
            $stmt = $con->prepare($req);
            $stmt->execute();

            $_SESSION['success'] = "Client supprimé !";
        } catch (PDOException $th) {
            $_SESSION['error'] = "Erreur requête :".$th->getMessage();
        }
    }

?>