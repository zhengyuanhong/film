<?php

namespace app\admin\model;

use think\Model;


class Video extends Model
{


    // 表名
    protected $table = 'video';

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'category_text'
    ];


    public function getCategoryList()
    {
        return ['1' => __('Category 1'), '2' => __('Category 2'), '3' => __('Category 3')];
    }


    public function getCategoryTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['category']) ? $data['category'] : '');
        $list = $this->getCategoryList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    public function team()
    {
        return $this->hasOne('Team', 'id', 'team_uid');
    }
    public function getUpdateTimeAttr($value)
    {
        return date("Y-m-d H:i:s", $value);
    }

    public function getCreateTimeAttr($value)
    {
        return date("Y-m-d H:i:s", $value);
    }



}
