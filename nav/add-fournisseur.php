<?php
    include "db/connectDb.php";
    include "db/functions-four.php";

    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['tel'];
        saveFournisseur($con, $nom, $prenom, $telephone);
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

<form action="" method="post">
    <h2>Enregistrement d'un nouveau fournisseur</h2>

    <div class="col-3 form-bloc">
        <label for="" class="form-label">Nom : <span>*</span></label>
        <div class="input-group has-validation">
            <input type="text" name="nom" class="form-control" required>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="" class="form-label">Prénom : <span>*</span></label>
        <div class="input-group has-validation">
            <input type="text" name="prenom" class="form-control" required>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="" class="form-label">Téléphone : <span>*</span></label>
        <div class="input-group has-validation">
            <input type="text" name="tel" class="form-control" required>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-success">ENREGISTRER</button>
            <button type="reset" class="btn btn-primary">RESET</button>
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