<!DOCTYPE html>
<html>
<head>
    <title>Matrix Addition Result</title>
</head>
<body>
    <h2>Matrix Addition Result</h2>

    <?php
    if (isset($_POST['submit'])) {
        $rowsA = $_POST['rowsA'];
        $colsA = $_POST['colsA'];
        $matrixA_input = $_POST['matrixA'];

        $rowsB = $_POST['rowsB'];
        $colsB = $_POST['colsB'];
        $matrixB_input = $_POST['matrixB'];

        // Convert the input strings into matrix arrays
        $matrixA = array();
        $rowsA_data = explode(",", $matrixA_input);
        foreach ($rowsA_data as $row) {
            $matrixA[] = explode(" ", trim($row));
        }

        $matrixB = array();
        $rowsB_data = explode(",", $matrixB_input);
        foreach ($rowsB_data as $row) {
            $matrixB[] = explode(" ", trim($row));
        }

        // Check if the matrices have the same dimensions
        if (count($matrixA) != $rowsA || count($matrixA[0]) != $colsA || count($matrixB) != $rowsB || count($matrixB[0]) != $colsB) {
            echo "<h3>Error: The provided matrix dimensions do not match the input matrix data.</h3>";
        } elseif ($rowsA != $rowsB || $colsA != $colsB) {
            echo "<h3>Error: Matrices must have the same dimensions for addition.</h3>";
        } else {
            // Perform matrix addition
            $result = array();
            for ($i = 0; $i < $rowsA; $i++) {
                for ($j = 0; $j < $colsA; $j++) {
                    $result[$i][$j] = $matrixA[$i][$j] + $matrixB[$i][$j];
                }
            }

            // Display the matrices and the result
            echo "<h3>Matrix A:</h3>";
            foreach ($matrixA as $row) {
                echo implode(" ", $row) . "<br>";
            }

            echo "<h3>Matrix B:</h3>";
            foreach ($matrixB as $row) {
                echo implode(" ", $row) . "<br>";
            }

            echo "<h3>Result (Matrix A + Matrix B):</h3>";
            foreach ($result as $row) {
                echo implode(" ", $row) . "<br>";
            }
        }
    } else {
        echo "<h3>Error: Form not submitted correctly.</h3>";
    }
    ?>

    <a href="ma.html">Go Back</a>
</body>
</html>
