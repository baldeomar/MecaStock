<?php
    require_once ("security/sessionControle.php");
    require_once ("include/inc_confirm_supprimer_produit.php");
?>
<html>
    <head>
        <title>Liste des produits</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/supprimer_element.js"></script>
        <script>
            var oTable;
            var modalSuppression;
            $(document).ready(function () {
                modalSuppression = new SuppressionElementModalController({
                    sUrl              : 'supprimerProduit.php',
//                    fnOnDeleteSuccess : function () { displayMessage('Produit supprim&eacute; avec succ&egrave;', "success"); },
//                    fnOnDeleteError   : function () { displayMessage('Une erreur est survenue, le produit n\'a pas &eacute;', "danger"); },
                    fnOnDeleteComplete: function () {
                        $('#modalSupprimerProduit').modal('hide');
                        refreshTable('#datatable', 'search.php');
                    }
                });
                oTable = $('#datatable').dataTable({
                    "bProcessing": true,
                    "sAjaxSource": 'search.php',
                    "oLanguage": {
                        "sUrl": "ressources/datatable_french.txt"
                    },
                    "aoColumns": [
                        {
                            sTitle: "Nom du produit",
                            mData: 'nom'
                        },
                        {
                            sTitle: "Description",
                            mData: 'desc'
                        },
                        {
                            sTitle: "Emplacement",
                            mData: 'emp'
                        },
                        {
                            sTitle: "Prix",
                            mData: 'prix'
                        },
                        {
                            sTitle: '',
                            mData: 'del',
                            bSortable: false,
                            "mRender": function (data, type, row) {
                                return deleteProduit(data, type, row);
                            }
                        }
                    ]
                });
            });

            var deleteProduit = function (data, type, row) {
                return "<a class='glyphicon glyphicon-remove-circle' onclick='modalSuppression.show(\""+row.id+"\")'></a>";
            }

            function refreshTable(tableId, urlData){
                $.getJSON(urlData, null, function( json ){
                    table = $(tableId).dataTable();
                    oSettings = table.fnSettings();
                    table.fnClearTable(this);
                    for(var i = 0; i < json.aaData.length; i++){
                        table.oApi._fnAddData(oSettings, json.aaData[i]);
                    }
                    oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
                    table.fnDraw();
                });
            }
        </script>
    </head>
    <body>
        <h1>Liste des produits</h1>
        <table id="datatable">
            <tbody></tbody>
        </table>
        <button type="button" onclick="location.href='home.php'">Retour</button>
    </body>
</html>