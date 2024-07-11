<!DOCTYPE html>
<html>
<head>
    <title>Calculation Result</title>
</head>
<body>
    <h2>Calculation Result</h2>

    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Error: Division by zero.";
                }
                break;
            default:
                $result = "Invalid Operation";
                break;
        }

        echo "<h3>Result: $result</h3>";
    } else {
        echo "<h3>Error: Form not submitted correctly.</h3>";
    }
    ?>

    <a href="cal.html">Go Back</a>
</body>
</html>
