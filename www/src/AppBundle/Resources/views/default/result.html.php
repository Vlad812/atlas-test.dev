<?php $view->extend('::base.html.php') ?>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <table id="resultTable" class="table">

            <thead>
                <tr>
                    <th>Метка</th>
                    <th>Расстояние / км </th>
                </tr>
            </thead>
            <tbody>
                <? foreach($res as $v ): ?>
                    <tr data-place-id = "<?= $v['id'] ?>">
                        <td><?= $v['name'] ?></td>
                        <td><?= number_format($v['dist'], 2); ?></td>
                    </tr>
                <? endforeach ?>
            </tbody>

        </table>
    </div>
    <div id="resultMap" class="col-xs-12 col-md-6 map" data-type-map = "result"></div>
</div>

<script>

    var searchArea = {
        'lat' : <?= $area['lat'] ?>,
        'lon' : <?= $area['lon'] ?>,
        'radius' : <?= $area['radius'] ?>
    };

    var resJson = {
        "type": "FeatureCollection",
        "features": [
                <? foreach($res as $v ): ?>
                    {
                        "type": "Feature", "id": <?= $v['id'] ?> ,
                        "geometry": {"type": "Point", "coordinates": [<?= $v['lat'] ?> , <?= $v['lon'] ?>] },
                        "properties":{"balloonContent": "Содержимое балуна", "clusterCaption": "Еще одна метка", "hintContent": "<?= $v['name'] ?>"}
                    },
                <? endforeach ?>
        ]
    };
</script>