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
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <h1>Insert</h1>
            <form action="../operation/insert.php" method="post">
                <span><b>FIO: </b></span> <input type="text" class="form-control" name="fio">
                <span><b>Zp: </b></span><input type="text" class="form-control" name="zp"><br>
                <input type="submit" class="btn btn-success" value="insert">
            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>

</body>
</html>
