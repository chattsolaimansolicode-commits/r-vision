<?php
$messages = "";

if (isset($_POST['ok'])) {

    $note = $_POST['note'];

    if (!empty($note)) {

        if (is_numeric($note) && $note >= 0 && $note <= 20) {

            if ($note >= 10) {
                $messages = "Admitted";
            } else {
                $messages = "Not Admitted";
            }

        } else {
            $messages = "Please enter a number between 0 and 20";
        }

    } else {
        $messages = "Field cannot be empty";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade Check</title>
</head>
<body>

<h2>Enter your grade</h2>

<form method="post">
    <label>Note (:</label>
    <input type="text" name="note" placeholder="Enter your note">
    <button type="submit" name="ok">Submit</button>
</form>

<p><?php echo $messages; ?></p>

</body>
</html>
