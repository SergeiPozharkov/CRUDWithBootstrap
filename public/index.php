<?php

use W1020\HTML\Pagination;
use W1020\HTML\Table as htmlTable;
use W1020\Table;

include "../vendor/autoload.php";

$config = [
    "servername" => "localhost",
    "username" => "root",
    "password" => "root",
    "dbname" => "guest_book",
    "table" => "ved"
];

$table = new Table($config);
$table->setPageSize(3);
$page = (int)($_GET['page'] ?? 1);
if (isset($_GET['del'])) {
    $table->del($_GET['del']);
    header("Location: ?");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?= (new htmlTable())
    ->setData($table->getPage($page))
    ->addColumn(fn($v) => "<a href='?del=$v[id]' class='btn btn-danger'>Delete</a>")
    ->addColumn(fn($v) => "<a href='show/showUpdate.php?edit=$v[id]' class='btn btn-warning'>Edit</a>")
    ->setClass("table table-success table-striped")
    ->html() ?>

<?= (new Pagination())
    ->setPageCount($table->pageCount())
    ->setActivePage($page)
    ->html() ?>
<br>
<a href="show/showInsert.php" class="btn btn-success">Insert</a>
</body>
</html>