<?php $view->extend('::base.html.php') ?>

<div class="row" xmlns="http://www.w3.org/1999/html">

        <div class="col-xs-12 col-md-6">

            <?php $view['slots']->output('_content') ?>

        </div>

        <div id="map" class="col-xs-12 col-md-6 map" data-type-map = 'app' ></div>
    </div>
    <div class="row">
    <div  class="col-xs-12 ">

        <form>
            <div class="col-xs-12 col-sm-3">
                <input id="name-placemark" class="form-control" type="text" placeholder="Название Метки" value=""  required>
            </div>
            <div class="col-xs-12 col-sm-3">
                <input id="latitube-field" class="form-control coords" type="" placeholder="Широта" value=""  required>
            </div>
            <div class="col-xs-12 col-sm-3">
                <input id="longtube-field" class="form-control coords" type="text" placeholder="Долгота" value=""  required>
            </div>
            <div class="col-xs-12 col-sm-3">
                <input name = "add"  id='actionPlacemark' class="btn" type="submit"  value="Добавить Метку" />
            </div>
        </form>

    </div>
</div>