<?php 
    include('../../connection.php')
?>
<link rel="stylesheet" type="text/css" href='css/vendors.css'>


<article class="vendor-header">Our vendors</article>


<?php 
    $cursor = $items->distinct('vendor');
    $vendor_cursor = $vendors->find();
    foreach($vendor_cursor as $vendor) {
        if (in_array($vendor['name'], $cursor)) {
            print "<article class='mt-4'>";
            print "<div class='row'>";
            print "<div col='col-3'>";
            echo "<img width='200' height='150' alt='" . $vendor['name'] . " icon' src='" . $vendor['image'] . "'>";
            print "</div>";
            print "<div class='col-8'>";
            echo "<div class='vendor-name bold pl-3'>" . $vendor['name']. "</div>";
            echo "<div class='vendor-desc pl-3'>" . $vendor['info'] . "</div>";
            print "</div>";
            print "</div>";
            print "</article>";
        }
    }

?>


