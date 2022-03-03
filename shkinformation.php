<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../BTL_QLNK/style/style.css">
</head>

<body class="bg-light">
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Trang chủ</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">   
                        </ul>
                        <form class="d-flex">
                            <button class="btn btn-outline-success" type="submit">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>
<main style="background-color: #fafafa;">
    <div class="container">
        <div class="row">
            <div class="col-md-7 pt-2 ms-auto me-auto bg-white shadow-sm">
                <h4 class="text-center">Sổ Hộ Khẩu: </h4>

            </div>
        </div>
    </div>
</main>
<?php
require "./partials-front/footer.php";
?>