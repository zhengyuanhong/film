<?php

namespace app\api\helper;

use \firebase\JWT;
use think\Log;
use app\admin\model\WechatUser;

class TokenHelper
{
    const DURATION = 31536000; // 86400 * 365 = 31536000
    const LEEWAY = 60; // $leeway in seconds
    const key = 'zhengyuanhong';

    static function genToken($openid)
    {
        $token = [
            'iat' => time(),
            'exp' => time() + self::DURATION,
            'uuid' => $openid,
        ];

        Log::info('token存入数据库');
        $jwt_token = JWT::encode($token, self::key);

        self::saveOrUpdateUserToken($openid, $jwt_token);

        return $jwt_token;
    }

    static function freshToken($token)
    {
        JWT::$leeway = self::LEEWAY;
        $decoded = JWT::decode($token, self::key, ['HS256']);
        $decoded_array = (array)$decoded;
        $new_token = self::genToken($decoded_array['uuid']);

        self::saveOrUpdateUserToken($decoded_array['uuid'], $new_token, 'update');

        return $new_token;
    }

    static function saveOrUpdateUserToken($openid, $token, $option = 'save')
    {

        if ($option == 'update') {
            $user = new Wechatuser();
            $user->where('openid', $openid)->update(['token', $token]);
            return true;
        }
        return false;
    }

    static function getUserToken($openid)
    {
        $user = WechatUser::get(['openid' => $openid]);
        $token = $user->token;
        Log::info('============token======'.$token);
        return $token;
    }

    static function validateToken($token)
    {
        JWT::$leeway = self::LEEWAY;
        try {
            $decoded = JWT::decode($token, self::key, ['HS256']);
            $decoded_array = (array)$decoded;
            $cacheJwt = self::getUserToken($decoded_array['uuid']);
            if ($token !== $cacheJwt) {
                return false;
            }
        } catch (\Exception $e) {
            Log::error('token 错误:' . $token . '||' . $e->getMessage());
            return false;
        }
        return $decoded_array;
    }
}


