<?php

namespace app\api\controller;

use app\common\controller\api;
use helper\TokenHepler;
use helper\WechatHelper;
use think\Log;
use think\Request;
use app\admin\model\WechatUser;

class WechatController extends api
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    function grantOpenID(Request $request)
    {
        $code = $request->get('code');
        if (empty($code)) {
            return $this->error(['code'=>40001], '未接收到参数 code');
        }

        //TODO
        $ret = WechatHelper::grantOpenID($code, $appid, $secret);

        if (empty($ret)) {
            return $this->error(['code'=>40001]);
        }

        $openid = $ret['openid'];
        $jwt = TokenHepler::genToken($openid);
        $ret['my_session_token'] = $jwt;

        return $this->result($ret);
    }

}
