<?php

namespace app\admin\model;

use think\Model;


class Focus extends Model
{

  // 表名
    protected $table = 'focus';

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    static function isOrNoCollect($user_id, $video_id)
    {
        $res = self::where('user_id', $user_id)->where('video_id', $video_id)->find();
        if (empty($res)) {
            $res = new self;
            $res->user_id = $user_id;
            $res->video_id = $video_id;
            $res->save();

            $video = Video::get($video_id);
            $video->setInc('collet_num', rand(1, 10));
            $video->save();
        } else {
            $res->delete();
        }
    }

    static function isCollect($user_id, $video_id)
    {
        $res = self::where('user_id', $user_id)->where('video_id', $video_id)->find();
        if (!empty($res)) {
            return true;
        }
    }


}
