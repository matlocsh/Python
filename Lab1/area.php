
<!DOCTYPE html>
<html>
<head>
    <title>Rectangle Area Calculator</title>
</head>
<body>
    <h1>Rectangle Area Calculator Shayla Matlock</h1>
    <p>Enter the length and width of a rectangle to calculate its area.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="length">Length:</label>
        <input type="number" id="length" name="length" required><br><br>
        <label for="width">Width:</label>
        <input type="number" id="width" name="width" required><br><br>
        <input type="submit" value="Calculate Area">
    </form>
    
    
    <?php
function calculate_rectangle_area($length, $width) {
    return $length * $width;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    $length = $_POST["length"];
    $width = $_POST["width"];
    $area = calculate_rectangle_area($length, $width);
    echo "The area of the rectangle is: " . $area;
    exit; // Stop further execution after displaying the result
}
?>

</body>
</html>
