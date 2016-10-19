<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 2016-10-19
 * Time: 00:17
 */

@include "connect.php";

$result = mysqli_query($conn, 'SELECT * FROM `users` ORDER BY `points` DESC');
mysqli_close($conn);
foreach($result as $key => $h) { ?>
        <?=$key?>:<?=$h["name"]?>:<?=$h["points"]?>.
<?php
} ?>
