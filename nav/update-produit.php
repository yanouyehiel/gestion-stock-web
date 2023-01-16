<?php
    include "db/connectDb.php";
    include "db/functions-cat.php";
    include "db/functions-pro.php";
    $categories = getCategories($con1);
    $code = $_GET['code'];
    $produit = getInfoProduit($con1, $code);

    if (isset($_POST['code'])) {
        $produit = [$code, $_POST['nom'], $_POST['stock'], $_POST['prix'], $_POST['id_cat']];
        updateProduit($con1, $code, $produit);
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
    <h2>Modification du produit</h2>

    <div class="col-3 form-bloc">
        <label for="code" class="form-label">Code :</label>
        <div class="input-group has-validation">
            <input class="form-control" type="text" name="code" id="" value="<?= $produit['code_produit'] ?>">
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="nom" class="form-label">Nom :</label>
        <div class="input-group has-validation">
            <input class="form-control" type="text" name="nom" id="" value="<?= $produit['libelle_produit'] ?>">
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="prix" class="form-label">Prix :</label>
        <div class="input-group has-validation">
            <input class="form-control" type="text" name="prix" id="" value="<?= $produit['prix_produit'] ?>">
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="stock" class="form-label">Stock :</label>
        <div class="input-group has-validation">
            <input class="form-control" type="number" name="stock" id="" value="<?= $produit['qte_produit'] ?>">
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="categorie" class="form-label">Catégorie :</label>
        <select class="form-select" name="id_cat" id="">
            <option selected value="<?= $produit['id_categorie'] ?>"><?= getNomCategorie($con1, $produit['id_categorie']) ?></option>
            <?php
                foreach ($categories as $categorie):
            ?>
            <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="col-3 form-bloc">
        <div class="d-grid gap-2 mt-3">
            <button type="submit" name="update" class="btn btn-primary">MODIFIER</button>
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