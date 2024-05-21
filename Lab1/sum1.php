<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP to Python Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #ff69b4; /* Pink */
        }
        form {
            margin-top: 50px;
            text-align: center;
        }
        label {
            font-weight: bold;
            color: #ff69b4; /* Pink */
        }
        input[type="text"], select {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ff69b4; /* Pink */
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #ff69b4; /* Pink */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ff1493; /* Darker Pink */
        }
        .result {
            margin-top: 20px;
            text-align: center;
            color: #ff69b4; /* Pink */
        }
    </style>
</head>
<body>
    <h1>Shayla Matlock</h1>
    <form method="POST">
        <label for="num1">Number 1:</label>
        <input type="text" id="num1" name="num1" required>
        <br><br>
        <label for="num2">Number 2:</label>
        <input type="text" id="num2" name="num2" required>
        <br><br>
        <label for="operation">Operation:</label>
        <select id="operation" name="operation" required>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];

    // Validate inputs
    if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "<div class='result'><h3>Error:</h3><p>Please enter valid numbers.</p></div>";
    } else {
        // Prepare the command to run the Python script
        $command = escapeshellcmd("python3 sum.py " . escapeshellarg($num1) . " " . escapeshellarg($num2) . " " . escapeshellarg($operation));

        // Execute the Python script and capture the output
        $output = shell_exec($command);

        // Display the result
        if ($output !== null) {
            echo "<div class='result'><h3>Result:</h3><p>The $operation is $output</p></div>";
        } else {
            echo "<div class='result'><h3>Error:</h3><p>Please enter valid numbers and a valid operation (add/subtract).</p></div>";
        }
    }
}
?>
</body>
</html>
