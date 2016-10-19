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
?> <table> <?php
foreach($result as $key => $h) { ?>
    <tr>
        <td><?=$key?></td> <td><?=$h["name"]?></td> <td><?=$h["points"]?></td>
    </tr>
<?php
} ?>
    </table>
