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
        <!-- 留言板-->
        <?=\frontend\widgets\chat\ChatWidget::widget()?>

        <!-- 热门浏览-->
        <?=\frontend\widgets\hot\HotWidget::widget()?>

        <!-- 标签云-->
        <?=\frontend\widgets\tag\TagWidget::widget()?>

    </div>

    <!--<div class="row">
        <div class="col-lg-9">
            <?/*=\frontend\widgets\post\PostWidget::widget()*/?>
        </div>
    </div>-->

</div>
