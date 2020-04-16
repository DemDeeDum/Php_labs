<?php

include "database.php";
 
 ?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="UTF-8">
		<title>
			User form
        </title>
        <style>
            
            .content-between {
                display: flex;
                justify-content: space-between;
            }
            .select-input {
                width: 10cm;
            }
            .content-around {
                display: flex;
                justify-content: space-around;
            }
            .range-input {
                width: 10cm;
            }
            .range-label,
            .input[type='text'] {
                width: 4cm;
            }
            label {
                width: 6cm;
            }
            select {
                width: 3cm;
                font-size: .4cm;
            }
            .content-center {
                display: flex;
                justify-content: center;
            }
            .text-center {
                text-align: center;
            }
            header {
                font-size: 1cm;
            }
            form {
                font-size: .6cm;
            }
            main {
                margin: 1cm;
            }
            form>div {
                margin-top: 5mm;
            }
            button[type="button"] {
                font-size: .5cm;
            }
            .items {
            }
            .items>span {
                border: 1mm solid gainsboro;
                padding: 5mm;
                width: 4cm;
                overflow: auto;
            }
            
            .attributes {
                margin-top: 1cm;
                font-weight: bold;
            }
            
            .big-text {
                font-size: .8cm;
                padding: .5cm;
            }
            header button {
                width: 3cm;
            }
            .head {
                width: 5cm;
            }
            

        </style>

	</head>

	<body>
        <header>
            <div class="content-around">
                <button type='button' id='hello' >Hello!</button>
                <span class="big-text head text-center" id='ajax-text'>Press on button</span>
                <button type='button' id='bye' >Bye!</button>
            </div>
            <div class="text-center">User <?php echo $login ?> </div>
        </header>
        <main>
            <div class="content-center">
		        <form>
                    <div class='content-between select-input'>
                        <label>Choose a vendor:</label>
                        <select id="vendors" name="vendor">
                            <option value="none" selected>None</option>
                            <?php 
                                $result = mysqli_query($link, "SELECT * FROM `vendors` ");
                                while($vendor = mysqli_fetch_assoc($result))
                                {
                                    $vendor_name = $vendor['name'];
                                    $vendor_id = $vendor['ID_Vendor'];
                                    echo "<option value=\"$vendor_id\">$vendor_name</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class='content-between select-input'>
                        <label>Choose a category:</label>
                        <select id="categories" name="category">
                            <option value="none" selected>None</option>
                            <?php 
                                $result = mysqli_query($link,"SELECT * FROM `categories`");
                                while($category = mysqli_fetch_assoc($result))
                                {
                                    $category_name = $category['name'];
                                    $category_id = $category['ID_Category'];
                                    echo "<option value=\"$category_id\">$category_name </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="text-center">Set the price range</div>
                    <div class="content-around range-input"> 
                        <div class='range-label text-center'>Min</div>
                        <div class='range-label text-center'>Max</div>
                    </div>
                    <div class='content-around range-input'>
                        
                        <input  type="text" id="low-price" name="low-price" />
                        <input type="text" id="top-price" name="top-price" />
                    </div>
                    <div>
                        <button type='button' id='search' >Search</button>   
                    </div>
                </form>
            </div>
            <div class='content-center attributes items'>
                <span>Name</span>
                <span> Price</span>
                <span>Brand</span>
                <span>Type</span>
                <span>Quality</span>
                <span>Quantity</span>
            </div>
            <div id='results'>
                <div class='big-text text-center'>Search for something...</div>
            </div>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            'use strict';
            $('#search').on('click', 
            function () {
                    let ajax = new XMLHttpRequest ();
                    let vendor = $('#vendors').val();
                    let category = $('#categories').val();
                    let lowPrice = $('#low-price').val();
                    let topPrice = $('#top-price').val();
                    ajax.open('POST', 'search.php');
                    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    ajax.send('vendor=' + vendor + '&category=' + category + '&low-price=' + lowPrice + '&top-price=' + topPrice);
                    ajax.onreadystatechange = function() {
                        if (ajax.readyState == 4) {
                            if(ajax.status == 200) {
                                let resultContainer = document.getElementById('results');
                                resultContainer.innerHTML = "";
                                let arr = JSON.parse(ajax.responseText);
                                for(let good of arr) {
                                    let div = document.createElement('div');
                                    div.classList.add('content-center');
                                    div.classList.add('items');
                                    let spanName = document.createElement('span');
                                    spanName.innerText = good.name;
                                    div.appendChild(spanName);
                                    let spanPrice = document.createElement('span');
                                    spanPrice.innerText = good.price + "$"; 
                                    div.appendChild(spanPrice);
                                    let spanBrand = document.createElement('span');
                                    spanBrand.innerText = good.brand;
                                    div.appendChild(spanBrand);
                                    let spanType = document.createElement('span');
                                    spanType.innerText = good.type;
                                    div.appendChild(spanType);
                                    let spanQuality = document.createElement('span');
                                    spanQuality.innerText = good.quality;
                                    div.appendChild(spanQuality);
                                    let spanQuantity = document.createElement('span');
                                    spanQuantity.innerText = good.quantity;
                                    div.appendChild(spanQuantity);
                                    resultContainer.appendChild(div);
                                }
                                if(resultContainer.innerHTML == "") {
                                    resultContainer.innerHTML = "<div class='big-text text-center'>Nothing was found</div>";
                                }
                            }
                        }
                    }

                }); 
        </script>
        <script>
            $('#hello').on('click', 
            function () {
                let ajax = new XMLHttpRequest ();
                ajax.open('POST', 'hello.php');
                ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4) {
                        if(ajax.status == 200) {
                            $('#ajax-text').text(ajax.responseText);
                        } 
                    }
                };                  
                ajax.send(null);  
            });
        </script>
        <script>
            $('#bye').on('click', 
            function () {
                let ajax = new XMLHttpRequest ();
                ajax.open('POST', 'bye.php');
                ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4) {
                        if(ajax.status == 200) {
                            $('#ajax-text').text(ajax.responseXML.firstChild.firstChild.firstChild.nodeValue);
                        } 
                    }
                };                  
                ajax.send(null);  
            });
        </script>


	</body>
</html>