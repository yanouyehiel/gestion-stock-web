<?php
    include "db/connectDb.php";
    include "db/functions-cat.php";

    //print_r($_POST);
    if (isset($_POST["code"])) {
        saveCatP($con, $_POST['code'], $_POST['libelle']);;
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

<form method="post">
    <h2>Enregistrement d'une catégorie</h2>

    <div class="col-3 form-bloc">
        <label for="code" class="form-label">Code : <span>*</span></label>
        <div class="input-group has-validation">
            <input type="text" name="code" class="form-control" required>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="libelle" class="form-label">Libellé : <span>*</span></label>
        <div class="input-group has-validation">
            <input type="text" name="libelle" class="form-control" required>
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