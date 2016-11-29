<?php
/**
 * Created by PhpStorm.
 * User: zhang han qing
 * Date: 2016/11/29
 * Time: 20:11
 */
namespace frontend\widgets\tag;

use common\models\Tags;
use yii\base\Widget;

class TagWidget extends Widget
{
    public $title='';
    public $limit=20;
    public function run()
    {
        $res=Tags::find()
            ->orderBy(['post_num'=>SORT_DESC])
            ->limit($this->limit)
            ->all();
        $result['title']=$this->title?:'标签云';
        $result['body']=$res?:[];

        return $this->render('index',['data'=>$result]);
    }
}