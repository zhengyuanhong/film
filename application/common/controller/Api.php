<?php

namespace app\common\controller;

use app\admin\model\WechatUser;
use app\api\helper\TokenHelper;
use app\api\helper\WechatHelper;
use think\Controller;
use think\Request;

class Api extends Controller
{

    protected $request = null;
    protected $allow = ['login'];
    protected $jwt = null;

    protected function _initialize()
    {
        $this->request = Request::instance();
        $action = $this->request->action();
        if(!in_array($action,$this->allow)){
            $jwt = $this->request->header('AUTH-TOKEN');
            $result = TokenHelper::validateToken($jwt);
            if($result == false){
                die('202');
            }
            $this->request->user = WechatUser::get(['openid'=>$result['uuid']]);
        }
    }

    function own_result($res = [])
    {
        $data = [
            'error_code' => '0000',
            'error_message' => 'success',
            'data' => $res,
            'server_time' => time(),
        ];

        return json($data, 200, ['Allow-Origin' => '*']);
    }

    function own_error($error_code, $customMessage = '')
    {
        $message = $customMessage ? $customMessage : $error_code['code'];
        $data = [
            'error_code' => $error_code['code'],
            'error_message' => $message,
            'data' => [],
            'server_time' => time(),
        ];

        return json([$data, 200, 'Allow-Origin' => '*']);
    }

}
