<?php
if (isset($_GET['id'])) {
    include './library/connection.php';
    $id = $_GET['id'];
    $query = "SELECT name, type, size, content FROM upload WHERE id = '$id'";
    $result = pg_query($conn, $query) or die('Error, query failed');
    list($name, $type, $size, $content) = pg_fetch_array($result);
    header("Content-Disposition: attachment; filename=$name");
    header("Content-length: $size");
    header("Content-type: $type");
    echo $content;
    pg_close($conn);
    exit;
}
?>
<html>

<head>
    <title>Download File From PostgreSQL</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
    <?php
    include './library/connection.php';
    $query = "SELECT id, name, path FROM upload";
    $result = pg_query($conn, $query) or die('Error, query failed');
    if (pg_num_rows($result) == 0) {
        echo "Database is empty <br>";
    } else {
        while (list($id, $name, $path) = pg_fetch_array($result)) {
    ?>
            <a href="<?php echo $path; ?>"><?php echo $name; ?></a><br>
    <?php
        }
    }
    pg_close($conn);
    ?>
</body>

</html>