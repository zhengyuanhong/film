<?php
namespace helper;

use think\Log;

class WechatHelper{

    static function grantOpenID($code, $appid, $secret)
    {
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
        Log::info(__METHOD__ . ' url: ' . $url);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array("Cache-Control: no-cache"),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        Log::info(__METHOD__ . ' response: ' . $response);

        if ($err) {
            Log::error(__METHOD__ . ' err: ' . $err);
            return [];
        }

        $result = json_decode($response, true);
        if (empty($result['openid'])) {
            Log::error('登录凭证校验 - 错误，没有获得 openid、session_key', $result);
            return [];
        }

        if (isset($result['unionid'])) {
            Log::info('产生 unionid', $result);
        }

        return $result;
    }
}
