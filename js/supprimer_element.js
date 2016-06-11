function SuppressionElementModalController(mParameters) {
    this._sIdElement;
    this._mParameters = {
        sUrl              : '',
        fnOnDeleteSuccess : function (sIdElement, sMessage) {},
        fnOnDeleteError   : function (sIdElement, sMessage) {},
        fnOnDeleteComplete: function (sIdElement) {}
    }

    $.extend(this._mParameters, mParameters);

    var controller = this;
    $("#modalSupprimerProduitAnnuler").unbind('click').click(function () {
        controller._hide();
    });
    $("#modalSupprimerProduitValider").unbind('click').click(function () {
        controller._delete(controller._sIdElement);
        controller._hide();
    });
}

SuppressionElementModalController.prototype.show = function (sIdElement) {
    if (sIdElement && sIdElement != '') {
        this._sIdElement = sIdElement;
        $('#modalSupprimerProduit').modal('show');
    }
}

SuppressionElementModalController.prototype._hide = function () {
    this._sIdElement = null;
}

SuppressionElementModalController.prototype._delete = function (sIdElement) {
    var sUrl = this._mParameters.sUrl + '?id=' + sIdElement;
    var fnOnDeleteSuccess = this._mParameters.fnOnDeleteSuccess;
    var fnOnDeleteError = this._mParameters.fnOnDeleteError;
    var fnOnDeleteComplete = this._mParameters.fnOnDeleteComplete;
    $.ajax({
        type       : 'GET',
        url        : sUrl,
        contentType: 'text/plain; charset=utf-8',
        dataType   : 'text',
        error      : function (jqXHR, sTextStatus, sErrorThrow) {
            fnOnDeleteError(sIdElement, sTextStatus);
        },
        success    : function (jqXHR, sTextStatus, sErrorThrown) {
            fnOnDeleteSuccess(sIdElement, sTextStatus);
        },
        complete   : function (jqXHR, sTextStatus) {
            fnOnDeleteComplete(sIdElement);
        }
    });
}
