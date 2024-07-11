<?php
$servername = "localhost";
$username = "root";
$password = "#ravi!$#1802";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, grade FROM students";
$result = $conn->query($sql);
$students = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
} else {
    echo "No records found.";
    exit;
}
echo "<h2>Unsorted Students Records</h2>";
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Grade</th></tr>";
foreach ($students as $student) {
    echo "<tr>
    <td>{$student['id']}</td>
    <td>{$student['name']}</td>
    <td>{$student['grade']}</td>
    </tr>";
}
echo "</table>";
function selectionSort(&$array, $key) {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($array[$j][$key] < $array[$minIndex][$key]) {
                $minIndex = $j;
            }
        }
        $temp = $array[$i];
        $array[$i] = $array[$minIndex];
        $array[$minIndex] = $temp;
    }
}
selectionSort($students, 'id');
echo "<h2>Sorted Student Records by ID  </h2>";
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Grade</th></tr>";
foreach ($students as $student) {
    echo "<tr>
    <td>{$student['id']}</td>
    <td>{$student['name']}</td>
    <td>{$student['grade']}</td>
    </tr>";
}
echo "</table>";
$conn->close();
?>