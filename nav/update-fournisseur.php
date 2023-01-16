<?php 
    include "db/connectDb.php";
    include "db/functions-four.php";

    $id_four = $_GET['id'];
    $infoFournisseur = getFournisseurInfo($con1, $id_four);

    if (isset($_POST['nom'])) {
        $fournisseur = [$_POST['nom'], $_POST['prenom'], $_POST['telephone']];
        updateFournisseur($con1, $id_four, $fournisseur);
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
    <h2>Modification du fournisseur</h2>

    <div class="col-3 form-bloc">
        <label for="nom" class="form-label">Nom :</label>
        <div class="input-group has-validation">
            <input class="form-control" type="text" name="nom" value="<?= $infoFournisseur['nom_fournisseur'] ?>">
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="prenom" class="form-label">Prénom :</label>
        <div class="input-group has-validation">
            <input class="form-control" type="text" name="prenom" value="<?= $infoFournisseur['prenom_fournisseur'] ?>">
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="tel" class="form-label">Téléphone :</label>
        <div class="input-group has-validation">
            <input class="form-control" type="tel" name="telephone" value="<?= $infoFournisseur['tel_fournisseur'] ?>">
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