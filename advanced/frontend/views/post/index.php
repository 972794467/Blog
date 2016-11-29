<?php
/**
 * Created by PhpStorm.
 * User: 97279
 * Date: 2016/11/22
 * Time: 18:50
 */
use frontend\widgets\post\PostWidget;
use yii\base\Widget;
?>
<div class="row">
    <div class="col-lg-9">
        <?=PostWidget::widget()?>
    </div>
    <div class="col-lg-3">
        <div class="panel">
            <?php if(!\Yii::$app->user->isGuest):?>
                <a class="btn btn-success btn-block btn-post" href="<?=\yii\helpers\Url::to(['post/create'])?>">创建文章</a>
               <!-- <?php /*if(\Yii::$app->user->identity->id==$data['user_id']):*/?>
                <a class="btn btn-success btn-block btn-post" href="<?/*=\yii\helpers\Url::to(['post/update','id'=>$data['id']])*/?>">编辑文章</a>
                --><?php /*endif;*/?>
            <?php endif;?>

        </div>





        <?=\frontend\widgets\hot\HotWidget::widget()?>

    </div>

</div>
