<?php
/**
 * Created by PhpStorm.
 * User: zhang han qing
 * Date: 2016/11/28
 * Time: 18:23
 */
namespace frontend\widgets\banner;

use Yii;
use yii\bootstrap\Widget;

class BannerWidget extends Widget {
    public $item=[];

    public function init()
    {
        if(empty($this->item)) {
            $this->item = [
                ['label' => 'demo', 'image_url' => '/statics/images/banner/b_0.jpg', 'url' => ['site/index'],'html'=>'','active'=>'active'],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/b_1.jpg', 'url' => ['site/index'],'html'=>''],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/b_2.jpg', 'url' => ['site/index'],'html'=>''],

            ];
        }
    }
    public function run()
    {
        $data['items']=$this->item;

        return $this->render('index',['data'=>$data]);
    }
}