<?php
/**
 * Created by PhpStorm.
 * User: zhang han qing
 * Date: 2016/11/28
 * Time: 22:37
 */
namespace frontend\widgets\chat;
//留言板
use common\models\Feeds;
use frontend\models\FeedForm;
use Yii;
use yii\base\Widget;

class ChatWidget extends Widget
{
    public function run()
    {
        $feed=new FeedForm();
        $data['feed']=$feed->getList();
        return $this->render('index',['data'=>$data]);
    }
}