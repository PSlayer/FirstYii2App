<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Device';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="row">
        <div class="col-lg-4">
            <h1>Name</h1>
            <p> <?=$device->name?></p>
            <h1>Description</h1>
            <p> <?=$device->description?></p>
            <h1>Serial</h1>
            <p> <?=$device->serial_number?></p>
            <h1>Storrage</h1>
            <p> <?=$device->storeName?></p>
        </div>
    </div>
</div>