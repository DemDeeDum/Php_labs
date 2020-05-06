
function getItems() {
    if(localStorage['max-cost=' + $('#max-cost').val() + '&min-cost=' + $('#min-cost').val()] === undefined) {
        $.post("content/items/get_items.php", { 'max-cost' : $('#max-cost').val(), 'min-cost' : $('#min-cost').val() }, function(data) {
            $('#content').html(data);
            localStorage['max-cost=' + $('#max-cost').val() + '&min-cost=' + $('#min-cost').val()] = data;
        })
    }
    else {
        $('#content').html(localStorage['max-cost=' + $('#max-cost').val() + '&min-cost=' + $('#min-cost').val()]);
    }
}

function findMissing() {

    for(let item of document.getElementsByClassName('item')) {
        for(let child of item.children) {
            if(document.getElementById('show-missing').checked && child.getAttribute('id') === 'quantity' && parseInt(child.innerText) !== 0) {
                item.classList.add('display-none');
            }
            else {
                item.classList.remove('display-none');
            }
        }
    }

}