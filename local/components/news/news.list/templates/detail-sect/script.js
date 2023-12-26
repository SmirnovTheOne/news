$(document).ready(function () {
    let btnEdit = $("#btn-edit");
    let btnSave = $("#btn-save").hide();
    let formInputs = $('#form input');

    btnEdit.on("click", function () {
        btnSave.show(500);
        btnEdit.hide(500);
        formInputs.removeAttr('disabled').removeAttr('readonly');
    });
    btnSave.on("click", function () {
        btnSave.hide(500);
        btnEdit.show(500);
        formInputs.attr('disabled').attr('readonly');
    });
});

