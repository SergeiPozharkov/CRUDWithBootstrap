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
<?php

use W1020\Table;

include "../../vendor/autoload.php";

$config = [
    "servername" => "localhost",
    "username" => "root",
    "password" => "root",
    "dbname" => "guest_book",
    "table" => "ved"
];

$table = new Table($config);

$sql = "SELECT * FROM `ved` WHERE `id` = $_GET[edit]";
$row = $table->runSQL($sql);
$names = $table->allColumns();
//foreach ($row as $res) {
//    $result = $res;
//}
$comments = $table->columnComments();
$i = 0;
print_r($names);
?>
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <h1>Update</h1>
            <form action="../operation/update.php" method="post">
                <?php

                foreach ($row as $val) {
                    $value[] = $val;
                    foreach ($value as $inputValues) {
                        foreach ($inputValues as $key => $inputValue) {

                            if ($key == 'id') {
                                ?>
                                <input type="hidden"
                                    <?php for ($i = 0; $i < count($names); $i++): ?>
                                        <?php if ($names[$i] == 'id'): ?>
                                            name="<?= $names[$i] ?>"
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                       value="<?= $inputValue ?>">
                                <?php
                            } else {
                                ?>
                                <span><b></b></span>
                                <input type="text" class="form-control"
                                    <?php while ($i < count($names)): ?>
                                        <?php if ($names[$i] != 'id'): ?>
                                            name="<?= $names[$i] ?>"
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                       value="<?= $inputValue ?>"><br>
                                <?php
                            }
                        }
                    }
                }
                print_r($inputValues);
                ?>

                <!--                                <input type="hidden" name="id" value="-->
                <? // //= $result['id'] ?><!--">-->
                <!--                <span><b>FIO: </b></span> <input type="text" class="form-control" name="fio"-->
                <!--                                                 value="--><? //= $result['fio'] ?><!--"><br>-->
                <!--                <span><b>Zp: </b></span><input type="text" class="form-control" name="zp"-->
                <!--                                               value="--><? //= $result['zp'] ?><!--"><br>-->
                <input type="submit" class="btn btn-warning" value="Update">
            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>
</body>
</html>
