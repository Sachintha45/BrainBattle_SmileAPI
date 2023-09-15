<?php
$response = brainbattle();

$question = $response['question'];
$solution = $response['solution'];

?>

<img src="<?php echo $question; ?>" className="img-thumbnail" alt="question" />

<?php
if (isset($_POST['buttonValue'])) {
    $buttonValue = $_POST['buttonValue'];

    if ($buttonValue == $solution) {
        $response = brainbattle();
        $question = $response['question'];
        $solution = $response['solution'];
        echo '<script>alert("Done");</script>';
    } else {
        echo '<script>alert("Wrong");</script>';
        die();
    }
}
?>
</div>
<div class="ans-btn mx-auto">
    <div class="row">
        <?php for ($i = 0; $i <= 9; $i++) { ?>
            <div class="col-md-2 col-lg-2 mx-1">
                <div class="p-2">
                    <button class="btn" name="buttonValue" value="<?php echo $i; ?>"><?php echo $i; ?></button>
                </div>
            </div>
        <?php } ?>