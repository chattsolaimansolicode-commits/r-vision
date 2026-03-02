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

echo $messages;
