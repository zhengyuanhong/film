<?php

namespace helper;

use firebase\JWT;
use think\Log;

class TokenHepler
{
    const DURATION = 31536000; // 86400 * 365 = 31536000
    const LEEWAY = 60; // $leeway in seconds
    const key = 'zhengyuanhong';

    static function getToken($openid)
    {
        $token = [
            'iat' => time(),
            'exp' => time() + self::DURATION,
            'uuid' => $openid,
        ];

        Log::info('token存入数据库');
        $jwt_token = JWT::encode($token, self::key);

        return $jwt_token;
    }

    static function freshToken($token){
        JWT::$leeway = self::LEEWAY;
        $decoded = JWT::decode($token,self::key,['HS256']);
        $decoded_array = (array)$decoded;
        $new_token = self::getToken($decoded_array['uuid']);

        self::saveOrUpdateUserToken($decoded_array['uuid']);

        return $new_token;
    }

    static function saveOrUpdateUserToken($openid){
        //TODO 把token 存入数据库中
       return true;
    }

    static function getUserToken($openid)
    {
        // TODO 获取数据库内容 返回array

        return $openid;
    }

    static function validateToken($token)
    {
        JWT::$leeway = self::LEEWAY;
        try {
            $decoded = JWT::decode($token,self::key,['HS256']);
            $decoded_array = (array)$decoded;
            $cacheJwt = self::getUserToken($decoded_array['uuid']);
            if($token !== $cacheJwt){
                return false;
            }
        }catch (\Exception $e){
            Log::error('token 错误:'.$token.'||'.$e->getMessage());
            return false;
        }
    }
}


