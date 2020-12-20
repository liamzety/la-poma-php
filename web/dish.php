<?php 
define("TITLE" ,"la poma | Dish");
include('./scripts/array.php');
function strip_bad_chars($input) {
    $output = preg_replace('/[^a-zA-Z0-9_-]/', '', $input);
    return $output;
}

if(isset($_GET['item'])) {
    $menuItem = strip_bad_chars($_GET['item']);
    $dish = $menuItems[$menuItem];
}

function getTip($dish) {
    return asDollars($dish['price'] / 10) ;
}
function asDollars($value) {
    if ($value<0) return "-".asDollars(-$value);
    return '$' . number_format($value, 2);
  }
include('./cmps/banner.php');
include('./cmps/nav.php');

?>

<div class="dish flex col justify-center">
    <h1>
        <?php echo $dish["name"]?>

        <sup>$ <?php echo $dish["price"]?></sup>
        <span class="price">
        </span>
    </h1>
    <p> <?php echo $dish["desc"] ?> </p>
    <p>
        <strong>Suggested beverage</strong> <em><?php echo $dish["drink"] ?></em> <br>
        <em>Suggested Tip: <?php echo getTip($dish) ?></em>

    </p>
    <img class="hr" src="./assets/img/hr.png">

    <button><a href="menu.php">Back to Menu</a></button>
</div>

<?php 
include('./cmps/details.php');
include('./cmps/footer.php');
?>