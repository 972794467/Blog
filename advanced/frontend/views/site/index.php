<?php

/* @var $this yii\web\View */
use \frontend\widgets\banner\BannerWidget;
$this->title = '博客-首页';
?>
<div class="row">
    <div class="col-lg-9">
        <?=BannerWidget::widget();?>

        <?=\frontend\widgets\post\PostWidget::widget()?>
    </div>
    <div class="col-lg-3">
        <?=\frontend\widgets\chat\ChatWidget::widget()?>
    </div>

    <!--<div class="row">
        <div class="col-lg-9">
            <?/*=\frontend\widgets\post\PostWidget::widget()*/?>
        </div>
    </div>-->

</div>
