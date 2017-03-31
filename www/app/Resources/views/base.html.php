<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?= NULL ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <title><?= $title = 1 ?></title>
    <!-- Add Bootstrap lib -->
    <link rel="stylesheet" href="/web/public/assets/bootstrap/dist/css/bootstrap.min.css" >
    <!-- Add Сss -->
    <link rel="stylesheet" href="/web/public/css/main.css" >

</head>
<body>
<div class="container-fluid">

    <header>
        <nav class="navbar navbar-default " role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">


                            <li><a href="/">Управление метками</a></li>

                            <li><a href="/search">Поиск Меток </a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </header>
    <?php $view['slots']->output('_content') ?>

</div>


<!-- Add JQ Lib-->
<script src='/web/public/assets/jquery/dist/jquery.min.js'></script>

<!-- Add BS3 js Lib-->
<script src='/web/public/assets/bootstrap/dist/js/bootstrap.min.js'></script>

<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

<!-- Add Js-->

<script src='/web/public/js/circle_constr.js'></script>

<script src='/web/public/js/main.js'></script>

</body>
</html>