<?php

namespace app\admin\model;

use think\Model;


class Team extends Model
{
    // 表名
    protected $table = 'team';

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];

    public function getUpdateTimeAttr($value)
    {
        return date("Y-m-d H:i:s", $value);
    }

    public function getCreateTimeAttr($value)
    {
        return date("Y-m-d H:i:s", $value);
    }


}
