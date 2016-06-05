<?php
    require_once ("security/sessionControle.php");
?>
<html>
    <head>
        <title>Liste des produits</title>
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#datatable').dataTable({
                    "bProcessing": true,
                    "sAjaxSource": 'search.php',
                    "aoColumns": [
                        {
                            mData: 'nom'
                        },
                        {
                            mData: 'desc'
                        },
                        {
                            mData: 'emp'
                        },
                        {
                            mData: 'prix'
                        }
                    ]
                });
            });
        </script>
    </head>
    <body>
        <h1>Liste des produits</h1>
        <table id="datatable">
            <thead>
            <tr>
                <th>
                    Nom du produit
                </th>
                <th>
                    Description
                </th>
                <th>
                    Emplacement
                </th>
                <th>
                    Prix
                </th>
            </tr>
            </thead>
            </thead>
            <tbody></tbody>
        </table>
        <button type="button" onclick="location.href='home.php'">Retour</button>
    </body>
</html>