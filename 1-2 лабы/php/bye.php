<?php
        include "database.php";
        header('Content-Type: text/xml; charset=utf-8');
        header("Cache-Control: no-cache, must-revalidate");
        
        echo '<?xml version="1.0" encoding="utf8" ?>';
        echo "<root>";
        $text = "Bye, $login!";
        print "<text>$text</text>";   
        echo "</root>";
    ?>