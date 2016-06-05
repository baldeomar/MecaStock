<?php
    require_once ("/var/www/MecaStock/security/sessionControle.php");
?>
<html>
    <head>
        <title>Ajout de produit</title>
        <script type="text/javascript" language="JavaScript">
            $('#retour').click(function () {

            })
        </script>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="container">
            <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
                <h1>Ajout de produit</h1>
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <?php
                        if(isset($_GET['error'])){
                            echo "<div class='has-error'>Le formulaire est incorrect, veuillez recommencer.</div>";
                        }else if(isset($_GET['success'])){
                            echo "<div class='has-success'>Le produit a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s.</div>";
                        }
                    ?>
                    <form method="post" action="ajoutProduit.php">
                        <table>
                            <tr>
                                <td>Nom produit: </td>
                                <td>
                                    <input type="text" name="nom" placeholder="NOM PRODUIT" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td>Description produit: </td>
                                <td>
                                    <input type="text" name="desc" placeholder="DESCRIPTION PRODUIT" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td>Emplacement produit: </td>
                                <td>
                                    <input type="text" name="emp" placeholder="EMPLACEMENT PRODUIT" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td>Prix produit: </td>
                                <td>
                                    <input type="text" name="prix" placeholder="PRIX PRODUIT" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Envoyer"></td>
                                <td>
                                    <button type="button" onclick="location.href='home.php'">Retour</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>