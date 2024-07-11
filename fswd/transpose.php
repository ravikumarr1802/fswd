<!DOCTYPE html>
<html>
<head>
    <title>Matrix Transpose Result</title>
</head>
<body>
    <h2>Matrix Transpose Result</h2>

    <?php
    if (isset($_POST['submit'])) {
        $rows = $_POST['rows'];
        $cols = $_POST['cols'];
        $matrix_input = $_POST['matrix'];

        // Convert the input string into a matrix array
        $matrix = array();
        $rows_data = explode(",", $matrix_input);
        foreach ($rows_data as $row) {
            $matrix[] = explode(" ", trim($row));
        }

        // Check if the input matrix dimensions match the provided rows and columns
        if (count($matrix) != $rows || count($matrix[0]) != $cols) {
            echo "<h3>Error: The provided matrix dimensions do not match the input matrix data.</h3>";
        } else {
            // Calculate the transpose of the matrix
            $transpose = array();
            for ($i = 0; $i < $cols; $i++) {
                $transpose[$i] = array();
                for ($j = 0; $j < $rows; $j++) {
                    $transpose[$i][$j] = $matrix[$j][$i];
                }
            }

            // Display the transposed matrix
            echo "<h3>Original Matrix:</h3>";
            foreach ($matrix as $row) {
                echo implode(" ", $row) . "<br>";
            }

            echo "<h3>Transposed Matrix:</h3>";
            foreach ($transpose as $row) {
                echo implode(" ", $row) . "<br>";
            }
        }
    } else {
        echo "<h3>Error: Form not submitted correctly.</h3>";
    }
    ?>

    <a href="mt.html">Go Back</a>
</body>   </html>
