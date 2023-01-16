<?php 
    include "db/connectDb.php";
    include "db/functions-cat.php";
    include "db/functions-pro.php";

    if (isset($_POST['code'])) {
        deleteProduit($con1, $_POST['code']);
        $produits = getProduits($con1);
    } else {
        $produits = getProduits($con1);
    }
?>

<style>
    .tableau-style{
        border-collapse: collapse; /*Cela permet de fusionner les bordures*/
        min-width: 800px;
        width: auto;
        box-shadow: 0 5px 50px rgba(0,0,0,0.15);
        border: 1px solid #ddd;
        margin: 100px auto;
        /*cursor: pointer;
        border: 2px solid midnightblue;*/
    }
    thead tr{
        background-color: midnightblue;
        /*#3a3a3a;*/
        color: #fff;
        font-size: 20px;
        text-align: center;
    }
    th, td{
        padding: 30px 50px;
    }
    tbody tr, td, th{
        border: 1px solid #ddd;
    }
    tbody tr:nth-child(even){
        background-color: #f3f3f3;
    }
    tbody tr:last-of-type{
        border-bottom: 2px solid midnightblue;
    }
    h3{
        font-weight: bold;
        text-align: center;
        text-decoration: underline;
    }
</style>
    <h3> Liste des Produits </h3>
<table class="tableau-style">
    <thead>
        <tr>
            <th>#</th>
            <th>Code</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Catégorie</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $num = 1;
            foreach ($produits as $produit):
        ?>
        <tr>
            <td><?= $num ?></td>
            <td><?= $produit['code_produit'] ?></td>
            <td><?= $produit['libelle_produit'] ?></td>
            <td><?= $produit['qte_produit'] ?></td>
            <td><?= $produit['prix_produit'] ?></td>
            <td><?= getNomCategorie($con1, $produit['id_categorie']) ?></td>
            <td style="display: flex;">
                <a style="margin-right: 10px" class="btn btn-success" href="index.php?page=update-produit&code=<?= $produit['code_produit'] ?>">Modifier</a>
                <form method="post">
                    <input type="hidden" name="code" value="<?= $produit['code_produit'] ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</a>
                </form>
            </td>
        </tr>
        <?php
            $num++;
            endforeach;
        ?>
    </tbody>
</table>
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