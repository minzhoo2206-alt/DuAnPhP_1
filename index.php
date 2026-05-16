<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include 'lab1-bai1.php';

    foreach ($product as $item) {
        echo "<div>";
        echo "<h2>" . $item['name'] . "</h2>";
        echo "<p>Price: $" . $item['price'] . "</p>";
        echo "<img src='" . $item['img'] . "' alt='" . $item['name'] . "' style='width:200px;'>";
        echo "<p>" . $item['desc'] . "</p>";
        echo "</div><hr>";
    }

    ?>


</body>

</html>