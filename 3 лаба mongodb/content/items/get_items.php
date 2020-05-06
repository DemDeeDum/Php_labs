
<?php 
    include('../../connection.php')
?>
<link rel="stylesheet" type="text/css" href='css/items.css'>


<article class="text-center items-header">Item list</article>

<article class="container-fluid">
    <div class="row">
        <div class="col-3">
            <aside>
                <label for='max-cost'>Max cost</label>
                <input type='text' id='max-cost' class='form-control' >
                <label for='min-cost'>Min cost</label>
                <input type='text' id='min-cost' class='form-control' >
                <div>
                    <label class='mr-3'>Show missing goods</label>
                    <input type='checkbox' id='show-missing'>
                </div>
            </aside>
        </div>
        <div class="col-9">
            <section class="m-4 d-flex flex-wrap">
                <?php
                    $cursor = $items->find()->toArray();

                    if($_POST['max-cost'] != "" and preg_match("/^[1-9][0-9]{1,3}$/", $_POST['max-cost']) == 1) {
                            $cursor = array_filter($cursor, function($value) {
                            return $value['price'] < intval($_POST['max-cost'] );
                        });
                    }

                    if($_POST['min-cost'] != "" and preg_match("/^[1-9][0-9]{1,3}$/", $_POST['min-cost']) == 1) {
                            $cursor = array_filter($cursor, function($value) {
                            return $value['price'] > intval($_POST['min-cost'] );
                        });
                    }

                    foreach($cursor as $item) {
                        print "<article class='item p-2 m-2'>";
                        print "<div class='d-flex justify-content-between item-point mb-4'>";
                        echo  "<span class='blue'>" . (property_exists($item, 'category') ? $item['category'] : "<span class='gray'>unknown</span>" ) . "</span>";
                        if(property_exists($item, 'status')) {
                            if($item['status'] == 'new') {
                                echo "<span class='green'>" . $item['status'] . "</span>";
                            }
                            else {
                                echo "<span class='red'>" . $item['status'] . "</span>";
                            }
                        }
                        else {
                            echo "<span class='gray'>none</span>";
                        }
                        print "</div>";
                        print "<div class='d-flex justify-content-center mt-1 mb-1'>";
                        echo "<img width='150' height='210' src='" . $item['image'] . "' alt='device photo' >";
                        print "</div>";
                        echo "<div class='text-center item-point bold'>" .  $item['name'] . "</div>";
                        echo "<div class='text-center item-point'>" .  $item['price'] . "grn </div>";
                        echo "<div class='text-center item-point'>" . (property_exists($item, 'vendor') ? $item['vendor'] : "<span class='red'>unknown</span>" ) . "</div>";
                        echo "<div class='text-center item-point'>Reviews : " .  (property_exists($item, 'reviews') ? count($item['reviews']) : 0) . "</div>";
                        echo "<div id='quantity' class='text-center item-point'>" . $item['quantity'] . " in stock</div>";
                        print "</article>";
                    }  
                ?>
            </section>
        </div>
    </div>
</article>

<script defer >
    document.getElementById("min-cost").addEventListener('change', getItems);
    document.getElementById("max-cost").addEventListener('change', getItems);
    document.getElementById("show-missing").addEventListener('change', findMissing);
</script>