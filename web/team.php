<?php 
define("TITLE", "Team | la poma");
include('./scripts/array.php');

include('./cmps/banner.php');
include('./cmps/nav.php');
?>

<div class="team flex col align-center">

    <h1>Our Team at la poma's</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam odio ducimus quia, temporibus, repellendus delectus,
        doloribus fugiat veritatis quidem ipsa quisquam iusto tenetur rerum optio.</p>

    <img class="hr" src="./assets/img/hr.png">
    <div class="team flex align-center justify-center wrap">
        <?php 
foreach ($teamMembers as $teamMember) {
    ?>
        <div class="team-member flex align-center justify-center col">
            <img class="profile" src=<?php echo $teamMember["img"] ?>>
            <div class="title">
                <?php 
                echo $teamMember["position"] . ": " . $teamMember["name"];
            ?>
            </div>
            <?php 
            echo $teamMember["bio"];
            ?>
        </div>

        <?php }  ?>

    </div>
    <img class="hr" src="./assets/img/hr.png">
</div>

<?php 
include('./cmps/details.php');
include('./cmps/footer.php');
?>