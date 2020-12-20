<?php  include('./scripts/array.php')?>
<nav class="nav">
    <ul class="flex justify-center align-center">
        <?php  foreach ($navItems as $item) { ?>
        <li class="relative">
            <a href=<?php echo $item["slug"] ?>><?php echo $item["title"]?></a>
            <?php if( next( $navItems ) )  {?>
            <div class="line"></div>
            <?php } ?>
        </li>
        <?php  } ?>
    </ul>
</nav>

<div class="container">