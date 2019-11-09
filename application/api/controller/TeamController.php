<?php

namespace app\api\controller;

use app\admin\model\Team;
use app\common\controller\Api;

class TeamController extends Api{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    public function getTeams(){

       $teams = Team::all();
       if(empty($teams)){
           $this->own_error('40001','数据为空');
       }

       $data = [];
       foreach ($teams as $v){
          $data[] = $v->toArray();
       }

       return $this->own_result($data);
    }
}