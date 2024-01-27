<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Devices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="row">
        <?php foreach ($devices as $device):?>
            <div class="col-lg-4">
                <h2> <?=$device->name?></h2>

                <p> <?=$device->serial_number?></p>
                <p><a class="btn btn-default" href="/device/device/?id=<?=$device->id?>">open</a></p>
            </div>
        <?php endforeach?>
    </div>
</div>