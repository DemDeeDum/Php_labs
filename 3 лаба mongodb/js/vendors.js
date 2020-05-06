function getAllVendors() {
    if(localStorage['vendors'] === undefined) {
        $.post("content/vendors/get_vendors.php", null, function(data) {
            $('#content').html(data);
            localStorage['vendors'] = data;
        })
    }
    else {
        $('#content').html(localStorage['vendors']);
    }
}