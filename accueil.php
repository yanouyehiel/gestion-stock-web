<?php
    include "db/connectDB.php";
    include "db/functions-pro.php";
    include "db/functions-cmd.php";
    include "db/functions-clt.php";

    $produits = getProduits($con1);
    $clients = getClients($con1);

    if (isset($_POST['code'])){
        addCommande($con1, $_POST['code'], $_POST['id_client']);
    }
?>

<style>
    .container {
        margin-top: 80px
    }

    h3{
        text-align: center;
        justify-content: center;
        text-decoration: underline;
        margin-bottom: 20px
    }
</style>

<div class="container">
    <h3>ARTICLES</h3>
    <div class="row">
        <?php foreach ($produits as $produit): ?>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/card.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produit['libelle_produit'] ?></h5>
                            <p class="card-text"><?= $produit['prix_produit'] ?> FCFA</p>
                            <form method="post">
                                <input type="hidden" name="code" value="<?= $produit['code_produit'] ?>">
                                <select class="form-select" name="id_client" required>
                                    <option value="">--selectionnez un client--</option>
                                    <?php foreach ($clients as $client): ?>
                                    <option value="<?= $client['id_client'] ?>"><?= $client['nom_client'] .' '. $client['prenom_client'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Commander</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
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
</div>