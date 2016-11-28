<?php
/**
 * Created by PhpStorm.
 * User: zhang han qing
 * Date: 2016/11/22
 * Time: 19:22
 */
namespace common\models\base;
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{

    public function getPages($query,$curPage,$pageSize=10,$search=null)
    {
        if ($search) {
            $query = $query->andFilerWhere($search);
        }
        $data['count'] = $query->count();
        if (!$data['count']) {
            return [
                'count' => 0, 'curPage' => $curPage, 'pageSize' => $pageSize, 'start' => 0, 'end' => 0, 'data' => []
            ];

        }
        //超过指定页数,不取curPage为当前页
        $curPage = (ceil($data['count'] / $pageSize) < $curPage) ? ceil($data['count'] / $pageSize) : $curPage;

        $data['curPage'] = $curPage;
        $data['start']=($curPage-1)*$pageSize+1;
        $data['pageSize']=$pageSize;
        $data['end']=(ceil($data['count']/$pageSize)==$curPage)
            ?$data['count']:($curPage-1)*$pageSize+$pageSize;
        $data['data']=$query->offset(($curPage-1)*$pageSize)->limit($pageSize)
            ->asArray()->all();
        return $data;
    }
}