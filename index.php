
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="POST">
            Product Search - Input your keyword (s):<input name="keySearch" type="text">
            <input type="submit" name="submit" value="ค้นหา">
        </form>
        <br><br>
        
        <table border="2px">
        <?php
        echo "------------------------------------------------------------------------------<br>";
        $file = "product.txt";
        $keySearch = $_POST['keySearch'];
        $fopen = fopen($file, "r");
        $fread = fread($fopen, filesize($file));
        fclose($fopen);
        $remove = "\n";
        $split = explode($remove, $fread);
        $array[] = null;
        $tab = "\t";
        foreach ($split as $string) {
            $row = explode($tab, $string);
            array_push($array, $row);
        }
        /* echo "<pre>";
          print_r($array);
          echo "</pre>"; */
        echo "Your keyword:    ".$keySearch;
        echo "<br><br>";
        $all = strlen($keySearch);
        //echo $all;
        //echo "<br><br>";
        $blank = $lastSpace = strrpos($keySearch," ");
        echo $blank;
        echo "<br><br>";
        echo "Keyword 1:   ".substr($keySearch, 0, $blank);
        echo "<br><br>";
        echo "Keyword 2:   ".substr($keySearch, $blank, $all);
        echo "<br><br>";
        echo "ตารางที่ 1 ข้อมูลรายชื่อสินค้า";
        $results = array();
        $rowArray = sizeof($array);
        for ($i = 0; $i <= $rowArray - 1; $i++) {
            foreach ($array[$i] as $value) {

                if (strpos($value, $keySearch) !== false) {
                    $results[] = $value;
                }
            }
        }
        if (empty($results)) {
            echo 'No matches found.';
        } else {
            $Row = 1;
            foreach ($results as $value) {
                echo "<tr><td>".$Row++."<td>".$value."</td></td></tr>";
            }
        }
?>
        </table>
    </body>
</html>
