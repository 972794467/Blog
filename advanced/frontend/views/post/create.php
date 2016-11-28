<?php
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: zhang han qing
 * Date: 2016/11/22
 * Time: 19:57
 */
$this->title='创建';
$this->params['breadcrumbs'][]=['label'=>'文章','url'=>['post/index'] ];
$this->params['breadcrumbs'][]=$this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="panel-title box-title"></div>
        <span>创建文章</span>

    </br>
    <div class="panel-body">
        <?php $form=\yii\bootstrap\ActiveForm::begin()?>
        <?=$form->field($model,'title')->textinput(['maxlength'=>true]) ?>
        <?=$form->field($model,'cat_id')->dropDownList($cat) ?>


        <?= $form->field($model, 'label_img')->widget('common\widgets\file_upload\FileUpload',[
            //标签图
            'config'=>[

            ]
        ]) ?>

        </br>
        <?= $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor',[
            'options'=>[
                'initialFrameWidth' => 850,
                'initialFrameHeight' => 400,
                //'toolbars'=>[],

            ]
        ]) ?>
        </br>
        <?=$form->field($model,'tags')->widget('common\widgets\tags\TagWidget') ?>



       <div class="form-group">
           <?=Html::submitButton("发布",['class'=>'btn btn-success'])?>
       </div>

        <?php \yii\bootstrap\ActiveForm::end()?>
    </div>
    </div>
    <div class="col-lg-3">
        <div class="panel-title box-title">
            <span>注意事项</span>
        </div>
        <div class="panel-body">
            <p>1</p>
            <p>2</p>
        </div>


    </div>
</div>
