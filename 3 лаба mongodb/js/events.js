window.onload = function() {
    for(let button of $('.side-menu-button')) {
        button.onclick = function (e) {
            for(let button of $('.side-menu-button')) {
                if ( button != e.target ) {
                    button.classList.remove('selected-button');
                }
                else {
                    button.classList.add('selected-button');
                }
            }
        }
    }
    getItems();
    document.getElementById("button-items").addEventListener('click', getItems);
    document.getElementById("button-vendors").addEventListener('click', getAllVendors);
}

