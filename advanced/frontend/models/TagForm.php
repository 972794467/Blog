<?php
/**
 * Created by PhpStorm.
 * User: zhang han qing
 * Date: 2016/11/24
 * Time: 15:33
 */
namespace frontend\models;
use yii\base\Model;
use common\models\Tags;

class TagForm extends Model{
    public  $id;
    public $tags;
    public function rules(){
        return [
          ['tags','required'],
            ['tags','each','rule'=>['string']]
        ];
    }
    //保存标签集合
    public function saveTags(){
        $ids=[];
        if(!empty($this->tags)){
            foreach ($this->tags as $tag){
                $ids[]=$this->_saveTag($tag);
            }
        }
        return $ids;
    }
    //保存标签
    public function _saveTag($tag){
      $model=new Tags();
        $res=$model->find()->where(['tag_name'=>$tag])->one();
        if(!$res){
            $model->tag_name=$tag;
            $model->post_num=1;
            if(!$model->save()) {
                throw new \Exception('保存标签失败');
            }
            return $model->id;
            }else{
                //加一
                $res->updateCounters(['post_num'=>1]);
            }
        return $res->id;
    }
}