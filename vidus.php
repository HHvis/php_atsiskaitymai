        <?php
//index.php

$connect = new PDO("mysql:host=localhost;dbname=ziniupatikrinimas", "root", "");

$message = '';

if (isset($_POST["add_to_cart"])) {
    if (isset($_COOKIE["shopping_cart"])) {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);

        $cart_data = json_decode($cookie_data, true);
    } else {
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'item_id');

    if (in_array($_POST["hidden_id"], $item_id_list)) {
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]["item_id"] == $_POST["hidden_id"]) {
                $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
            }
        }
    } else {
        $item_array = array(
            'item_id' => $_POST["hidden_id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $cart_data[] = $item_array;
    }


    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    header("location:vidus.php?success=1");
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]['item_id'] == $_GET["id"]) {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header("location:vidus.php?remove=1");
            }
        }
    }
    if ($_GET["action"] == "clear") {
        setcookie("shopping_cart", "", time() - 3600);
        header("location:vidus.php?clearall=1");
    }
}

if (isset($_GET["success"])) {
    $message = '
	<div class="alert alert-success alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
}

if (isset($_GET["remove"])) {
    $message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Item removed from Cart
	</div>
	';
}
if (isset($_GET["clearall"])) {
    $message = '
	<div class="alert alert-success alert-dismissible">
		<a href="vidus.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Your Shopping Cart has been cleared
	</div>
	';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Parduotuve </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
                <br />

            <h3 align="center">
                <a href="index.php">ATSIJUNGTI</a></h3>
        
            <h3 align="center">
                <a href="testas.php">ATLIKITE TESTA</a></h3>
      
<?php
$query = "SELECT * FROM produktai ORDER BY ID DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
    ?>
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <form method="post">
                        <div style="border:1px solid #333; background-color:#FBF7EF; border-radius:8px; padding:10px;" align="left">
                            <img src="images/<?php echo $row["nuotrauka"]; ?>" class="img-responsive w-25 p-3" /><br />

                            <h4 class="text-info"><?php echo $row["pavadinimas"]; ?></h4>

                            <h4 class="text-danger"> EUR <?php echo $row["kaina"]; ?></h4>

                            <input type="text" name="quantity" value="1" class="form-control" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row["pavadinimas"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row["kaina"]; ?>" />
                            <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <?php
            }
            ?>


            <div style="clear:both"></div>
            <br />
            <h3 align="left">Uzsakymas</h3>
            <div class="table-responsive">
<?php echo $message; ?>
                <div align="right">
                    <a href="vidus.php?action=clear"><b>Panaikinti krepseli</b></a>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Produkto pavadinimas</th>
                        <th width="10%">Kiekis</th>
                        <th width="20%">Kaina</th>
                        <th width="15%">Visa kaina</th>
                        <th width="5%">Trinti</th>
                    </tr>
            <?php
            if (isset($_COOKIE["shopping_cart"])) {
                $total = 0;
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                foreach ($cart_data as $keys => $values) {
                    ?>
                            <tr>
                                <td><?php echo $values["item_name"]; ?></td>
                                <td><?php echo $values["item_quantity"]; ?></td>
                                <td>EUR <?php echo $values["item_price"]; ?></td>
                                <td>EUR <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                                <td><a href="vidus.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>                            </tr>
        <?php
        $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
    ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <td align="right">EUR <?php echo number_format($total, 2); ?></td>
                            <td></td>
                        </tr>
                        <?php
                    } else {
                        echo '
				<tr>
					<td colspan="5" align="center">No Item in Cart</td>
				</tr>
				';
                    }
                    ?>
                </table>
                            <?php 
            if (isset($_COOKIE["shopping_cart"])) {
            $total > 0;
            $link=mysqli_connect("localhost","root","","ziniupatikrinimas");
            $sql="INSERT INTO cart_userid (vartotojo_vardas, prekes_id) VALUES('".$_COOKIE["vardas"]."','".$values["item_id"]."')";
            mysqli_query($link, $sql);     
            echo ("<button onclick=\"location.href='pabaiga.php'\">Baigti apsipirkima</button>");
            } 

            ?> 
            </div>
        </div>
        <br />
       
    </body>
</html>
