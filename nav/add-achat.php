<?php
    include "db/connectDb.php";
    include "db/functions-achat.php";
    include "db/functions-pro.php";
    include "db/functions-four.php";

    $produits = getProduits($con1);
    $fournisseurs = getFournisseur($con1);

    if (isset($_POST["code_produit"])) {
        $commande = [$_POST['code_produit'], $_POST['id_four'], $_POST['qte']];
        saveCommande($con, $commande);
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
    <h2>Commander un produit</h2>

    <div class="col-3 form-bloc">
        <label for="" class="form-label">Produit : <span>*</span></label>
        <div class="input-group has-validation">
            <select name="code_produit" id="" class="form-select" required>
                <option selected value="">--selectionnez un produit--</option>
                <?php foreach ($produits as $produit): ?>
                <option value="<?= $produit['code_produit'] ?>"><?= $produit['libelle_produit'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="" class="form-label">Fournisseur : <span>*</span></label>
        <div class="input-group has-validation">
            <select name="id_four" id="" class="form-select" required>
                <option selected value="">--selectionnez un fournisseur--</option>
                <?php foreach ($fournisseurs as $fournisseur): ?>
                <option value="<?= $fournisseur['id_fournisseur'] ?>"><?= $fournisseur['nom_fournisseur'] . ' ' . $fournisseur['prenom_fournisseur'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <label for="" class="form-label">Quantite : <span>*</span></label>
        <div class="input-group has-validation">
            <input type="number" name="qte" class="form-control" required>
        </div>
    </div>
    <div class="col-3 form-bloc">
        <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-success">COMMANDER</button>
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