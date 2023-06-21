<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
    <link rel="stylesheet" href="CSS/style_index.css">
    <link rel="stylesheet" href="CSS/style_formulaire.css">
    <link rel="stylesheet" href="CSS/style_liste.css">
    <!-- parceque on a dans l'index toujour -->

    <link rel="icon" type="image/x-icon" href="image/USMBA_Favicon.png">
</head>

<body>
    <div class="Heading">
        <h1>SMI6</h1>
        <h4>Faculte des science dhar mehraz, fes</h4>
        <img src="image/USMBA_LOGO.jpeg" />
        <p id="date"><?=returnDate();?></p>
    </div>
    <br>
    <hr>

    <?php
    if (isset($_SESSION['user'])) {
        include('Config/Admin.php');
        $GLOBALS['email'] = findColumnFromTableByCondition('Users', 'Email', 'id',$_SESSION['user']);
        ?>
        <p> Email :
            <?= $GLOBALS['email']; ?>
        </p>
        <p> <a style="text-decoration:none;" href="index.php?action=Deconnecter">Deconnecter</a> </p>
        <?php if (in_array($GLOBALS['email'], $admin)) {
            $_SESSION['admin'] = 'ok';
            ?>
            <p> <a style="text-decoration:none;" href="index.php?action=adminTask">Taches Administratives</a> </p>
        <?php }
    }
    ?>

    <div class="container">
        <?= $View ?>
    </div>

    <p> <a style="text-decoration:none;"  href="index.php"> Page Home </a> </p>
    
    <hr>
    <ul class="list">
        <li><a style="text-decoration:none;" href="index.php?action=Form">Ajouter une reservation</a></li>
        <li><a style="text-decoration:none;" href="index.php?action=SalleListe">la liste des reservations</a></li>
    </ul>
    <hr>
    <pre class="copy">
    &copy;copyright SMI6 2023
    Faculte des science dhar mehraz
    <a style="text-decoration:none;" href="mailto:bassoulahmed@gmail.com">bassoulahmed@gmail.com</a></pre>


</body>

</html>