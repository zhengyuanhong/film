<?php

namespace app\api\controller;

use app\admin\model\Picture;
use app\common\controller\Api;
use think\Request;

class PictureController extends  Api{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    public function indexImgs(Request $request){
        $picture = new Picture();
        $res = $picture->where('showswitch',1)->limit(10)->order('updatetime','desc')->select();

        $data = [];
        if(empty($res)){
            return $this->own_result($data);
        }
        /** @var Picture $v */
        foreach($res as $v){
            $temp['id'] = $v['id'];
            $temp['url'] = $v['img_url'];
            $data[] = $temp;
        }
        return $this->own_result($data);
    }

    function getImgs(Request $request){
        $page = $request->get('page',1);
        $pages_size = $request->get('pages_size',20);
        $type = $request->get('type',0)+1;

        $data = [];

        $query = new Picture();
        $total = $query->count();
        $offset = ($page-1)*$pages_size;
        if($offset +1 >$total){
            return $this->own_result($data);
        }

        $rows = $query->where('category',$type)->where('showswitch',1)->limit($offset,$pages_size)->order('updatetime','desc')->select();
        /** @var Picture $v */
        foreach($rows as $v){
            $data[] = $v->toArray();
        }
        return $this->own_result($data);
    }
}