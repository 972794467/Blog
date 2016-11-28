<?php
/**
 * Created by PhpStorm.
 * User: zhang han qing
 * Date: 2016/11/27
 * Time: 22:25
 */
namespace frontend\widgets\post;

//文章列表组件
use common\models\Post;
use frontend\models\PostForm;
use yii\base\Widget;
use Yii;
use yii\data\Pagination;
use yii\helpers\Url;

class PostWidget extends Widget
{
    //文章列表总标题
    public $title='';
    //显示条数
    public $limit=6;
    //是否显示更多
    public $more=true;
    //是否显示分页
    public $page=true;



    public function run(){
        //获取当前页数，没有传递则默认为1
        $curPage=Yii::$app->request->get('page',1);
        $cond=['=','is_valid',Post::IS_VALID];
        $res=PostForm::getList($cond,$curPage,$this->limit);
        $result['title']=$this->title?:"最新文章";
        $result['more']=Url::to(['post/index']);
        $result['body']=$res['data']?:[];
        //是否显示分页
        if($this->page){
            $pages=new Pagination(['totalCount'=>$res['count'],'pageSize'=>$res['pageSize']]);
            $result['page']=$pages;
        }

        return $this->render('index',['data'=>$result]);
    }
}