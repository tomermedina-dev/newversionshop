function isNumber(evt) {
    var sp_val = $("#service_price").val();
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }
    if (charCode === 46 && sp_val.split('.').length === 2) {
        return false;
    }
    return true;
}
