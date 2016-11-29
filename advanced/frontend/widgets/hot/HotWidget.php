<?php
/**
 * Created by PhpStorm.
 * User: zhang han qing
 * Date: 2016/11/29
 * Time: 19:21
 */
namespace frontend\widgets\hot;
use yii\base\Widget;
use common\models\Post;
use common\models\PostExtends;
use Yii;
use yii\db\Query;

class HotWidget extends Widget
{
    public $title='';
    public $limit=6;
    public function run()
    {
        $res=(new Query())->select('a.browser,b.id,b.title')->from(['a'=>PostExtends::tableName()])
            ->join('LEFT JOIN',['b'=>Post::tableName()],'a.post_id=b.id')
            ->where('b.is_valid='.Post::IS_VALID)
            ->orderBy(['browser'=>SORT_DESC,'id'=>SORT_DESC])
            ->limit($this->limit)
            ->all();
        $result['title']=$this->title?:'热门浏览';
        $result['body']=$res?:[];

        return $this->render('index',['data'=>$result]);
    }

}