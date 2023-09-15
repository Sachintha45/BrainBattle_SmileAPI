
<?php 
    $con = mysqli_connect("localhost","root","","brainbattle");
    $query = "SELECT * FROM score ORDER BY scores DESC LIMIT 10";
    $result = mysqli_query($con,$query);
?>
<?php 
    while($player = mysqli_fetch_array($result))
    {
    ?>
<table >
    <tr>
        <td>
            <?php echo '<span>'.$player['username']; '</span>' ?>
        </td>
        <td>
        <?php echo '<span>'.$player['scores']; '</span>' ?>
        </td>
    </tr>
</table>
     <?php } ?>


