<?php 
    include "db/connectDb.php";
    include "db/functions-four.php";

    $fournisseurs = getFournisseur($con1);
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
</style>

<table class="tableau-style">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $num = 1;
            foreach ($fournisseurs as $fournisseur):
        ?>
        <tr>
            <td><?= $num ?></td>
            <td><?= $fournisseur['nom_fournisseur'] ?></td>
            <td><?= $fournisseur['prenom_fournisseur'] ?></td>
            <td><?= $fournisseur['tel_fournisseur'] ?></td>
            <td style="display: flex;">
                <a style="margin-right: 10px" class="btn btn-success" href="index.php?page=update-fournisseur&id=<?= $fournisseur['id_fournisseur'] ?>">Modifier</a>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $fournisseur['id_fournisseur'] ?>">
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