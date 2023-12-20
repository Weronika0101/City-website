<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
</head>
<body>

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'web';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

$last_name_filter = isset($_GET['last_name']) ? quotemeta($_GET['last_name']) : '';

$sql = "SELECT * FROM users WHERE last_name LIKE '$last_name_filter%'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Błąd kwerendy: " . mysqli_error($conn));
}

echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Hasło</th>
            <th>Imię</th>
            <th>Nazwisko</th>
        </tr>";

while ($row = mysqli_fetch_row($result)) {
    echo "<tr>
            <td>{$row[0]}</td>
            <td>{$row[1]}</td>
            <td>{$row[2]}</td>
            <td>{$row[3]}</td>
            <td>{$row[4]}</td>
          </tr>";
}

echo "</table>";

mysqli_close($conn);
?>

<form method="get" action="">
    <label for="last_name">Nazwisko:</label>
    <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($last_name_filter); ?>">
    <input type="submit" value="Filtruj">
</form>

</body>
</html>
