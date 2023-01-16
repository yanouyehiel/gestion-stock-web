<?php
    include "db/connectDb.php";
    include "db/functions-cat.php";
    include "db/functions-pro.php";
    $categories = getCategories($con1);

    if (isset($_POST['code'])) {
        $produit = [$_POST['code'], $_POST['nom'], $_POST['stock'], $_POST['prix'], $_POST['id_cat']];
        saveProduit($con, $produit);
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
    <h2>Enregistrement d'un produit</h2>

    <div class="col-3 form-bloc">
        <label for="code" class="form-label">Code : <span>*</span></label>
        <div class="input-group has-validation">
            <input class="form-control" type="text" name="code" required>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="nom" class="form-label">Nom : <span>*</span></label>
        <div class="input-group has-validation">
            <input class="form-control" type="text" name="nom" id="" required>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="prix" class="form-label">Prix : <span>*</span></label>
        <div class="input-group has-validation">
            <input class="form-control" type="text" name="prix" id="" required>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="stock" class="form-label">Stock : <span>*</span></label>
        <div class="input-group has-validation">
            <input class="form-control" type="number" name="stock" id="" required>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="prix" class="form-label">Catégorie : <span>*</span></label>
        <select class="form-select" name="id_cat" id="" required>
            <option value="">--selectionnez--</option>
            <?php
                foreach ($categories as $categorie):
            ?>
            <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="col-3 form-bloc">
        <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-success">ENREGISTRER</button>
            <button type="reset" class="btn btn-primary">RESET</button>
        </div>
    </div>
    <?php
        if(isset($_SESSION['erreur'])){
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                ".$_SESSION['erreur']."
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            unset($_SESSION['erreur']);
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