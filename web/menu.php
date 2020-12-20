<?php 
define("TITLE" ,"la poma | Menu");

include('./scripts/array.php');

include('./cmps/banner.php');
include('./cmps/nav.php');

?>
<div class="menu flex col align-center justify-center text-center">
    <h1>Our Delicious Menu</h1>
    <p>Like our team, our menu is very small, but dang does it ever pack a punch!</p>
    <em>Click any menu item to lean more about it.</em>

    <ul>
        <?php 
        foreach ($menuItems as $key => $val ) {  ?>

        <li>
            <a href="dish.php?item=<?php echo $key ?>">
                <?php echo $val["name"]; ?>

            </a>
            <sup>$<?php echo $val["price"]?></sup>

        </li>

        <?php  }
    ?>
    </ul>
</div>
<img class="hr" src="./assets/img/hr.png">

<?php 

include('./cmps/details.php');
include('./cmps/footer.php');

?>