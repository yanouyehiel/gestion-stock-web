<?php 
    include "db/connectDb.php";
    include "db/functions-clt.php";

    $id_clt = $_GET['id'];
    $infoClient = getInfoClient($con1, $id_clt);

    if (isset($_POST['nom'])) {
        $client = [$_POST['nom'], $_POST['prenom'], $_POST['tel']];
        updateClient($con1, $id_clt, $client);
    }
    
?>

<style>
    .form-bloc {
        margin-bottom: 20px;
        margin-left: 37%;
    }
    h2 {
        text-decoration: underline;
        margin-bottom: 40px;
    }
    span {
        color: red
    }
    form {
        border: 1px solid black;
        align-items: center !important;
        text-align: center !important;
        justify-content: center;
    }
</style>

<form class="container" method="post">
    <h2>Modification du client</h2>

    <div class="col-3 form-bloc">
        <label for="" class="form-label">Nom : </label>
        <div class="input-group has-validation">
            <input type="text" name="nom" class="form-control" value="<?= $infoClient['nom_client'] ?>">
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="" class="form-label">Prénom : </label>
        <div class="input-group has-validation">
            <input type="text" name="prenom" class="form-control" value="<?= $infoClient['prenom_client'] ?>">
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="" class="form-label">Téléphone : </label>
        <div class="input-group has-validation">
            <input type="text" name="tel" class="form-control" value="<?= $infoClient['tel_client'] ?>">
        </div>
    </div>
    <div class="col-3 form-bloc">
        <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-primary">MODIFIER</button>
        </div>
    </div>
    <?php
        if(isset($_SESSION['error'])){
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                ".$_SESSION['error']."
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo "
            <div class='alert alert-info alert-dismissible fade show' role='alert'>
                ".$_SESSION['success']."
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            unset($_SESSION['success']);
        }
    ?>
</form>