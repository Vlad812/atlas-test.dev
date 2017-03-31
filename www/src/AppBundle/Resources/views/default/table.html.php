<?php $view->extend('AppBundle::layout.html.php') ?>

<table class="table">

    <thead>
        <tr>
            <th>Метка</th>
            <th>Широта</th>
            <th>Долгота</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <? foreach($name as $v ): ?>
        <tr data-id = "<?= $v->getId() ?> ">

            <td class = "name-placemark"><?= $v->getName() ?></td>
            <td class = "lat-placemark"><?= $v->getLat() ?></td>
            <td class = "lon-placemark"><?= $v->getLon() ?></td>
            <td class="action-edit"> Edit </td>
            <td class="action-del" >Del</td>

        </tr>
    <? endforeach ?>

</table>
<div class = "pagination">
    <?= $pagin ?>
</div>