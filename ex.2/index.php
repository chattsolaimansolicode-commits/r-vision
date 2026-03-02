<form method="post">
    <label>Enter a number:</label>
    <input type="number" name="nb">
    <button type="submit">Find Divisors</button>


</form>

<?php
if (isset($_POST["nb"])) {

    $nb = $_POST["nb"];

    if ($nb == "") {
        echo "Please enter a number.";
    } elseif ($nb <= 0) {
        echo "Number must be positive.";
    } else {
        echo "<h3>Divisors:</h3>";

        for ($i = 1; $i <= $nb; $i++) {
            if ($nb % $i == 0) {
                echo $i . "<br>";
            }
        }
    }
}
?>