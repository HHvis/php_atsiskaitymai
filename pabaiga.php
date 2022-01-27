
<?php
            if (isset($_COOKIE["shopping_cart"])) {
                $total = 0;
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                foreach ($cart_data as $keys => $values) {
                    ?>
                            <tr>
                                <td>Prekes pavadinimas: <?php echo $values["item_name"]; ?></td><br>
                                <td>Kiekis: <?php echo $values["item_quantity"]; ?></td><br>
                                <td>Kaina: <?php echo $values["item_price"]; ?></td><br>
                            </tr>
        <?php
        $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
    ?>
                        <tr>
                            <td colspan="3" align="right">Is Viso</td>
                            <td align="right"><?php echo number_format($total, 2); ?></td><br>
                            <td></td>
                        </tr>
<?php
} 
echo "<br>";
echo "Aciu, kad pirkote";
echo "<br>";

?>
                <div align="left">
                    <a href="vidus.php?action=clear"><b>Grizti i parduotuve</b></a>
                </div>
<?php
if (isset($_COOKIE["shopping_cart"])) {
$total > 0;
$link=mysqli_connect("localhost","root","","ziniupatikrinimas");
$sql="DELETE FROM `cart_userid` WHERE `vartotojo_vardas`;";
mysqli_query($link, $sql);
setcookie("shopping_cart", 0, time()+ 0);
}
?>


                        

                        





