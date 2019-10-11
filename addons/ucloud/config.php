<?php

return array (
  0 => 
  array (
    'name' => 'public_key',
    'title' => 'public_key',
    'type' => 'string',
    'content' => 
    array (
    ),
    'value' => 'F7s1YLEKGLDOZB98IeydSQgBoMft7sCWgz0aRQl0',
    'rule' => 'required',
    'msg' => '',
    'tip' => '请前往产品与服务 > API密钥 中获取',
    'ok' => '',
    'extend' => '',
  ),
  1 => 
  array (
    'name' => 'private_key',
    'title' => 'private_key',
    'type' => 'string',
    'content' => 
    array (
    ),
    'value' => '3-ki2HEFbdupXAMeA6ZpOhD3yjoHX5cSeshV9UuJMdDPBFgyDDDJAY1W6GYHXBN7',
    'rule' => 'required',
    'msg' => '',
    'tip' => '请前往产品与服务 > API密钥 中获取',
    'ok' => '',
    'extend' => '',
  ),
  2 => 
  array (
    'name' => 'bucket',
    'title' => 'bucket',
    'type' => 'string',
    'content' => 
    array (
    ),
    'value' => 'imagesfilm',
    'rule' => 'required',
    'msg' => '',
    'tip' => 'Ucloud的空间名',
    'ok' => '',
    'extend' => '',
  ),
  3 => 
  array (
    'name' => 'uploadurl',
    'title' => '上传接口地址',
    'type' => 'string',
    'content' => '',
    'value' => 'http://imagesfilm.cn-bj.ufileos.com',
    'rule' => 'required',
    'msg' => '',
    'tip' => 'UCloud存储空间域名',
    'ok' => '',
    'extend' => '',
  ),
  4 => 
  array (
    'name' => 'cdnurl',
    'title' => 'CDN地址',
    'type' => 'string',
    'content' => 
    array (
    ),
    'value' => 'http://imagesfilm.ufile.ucloud.com.cn',
    'rule' => 'required',
    'msg' => '',
    'tip' => 'CDN加速域名',
    'ok' => '',
    'extend' => '',
  ),
  5 => 
  array (
    'name' => 'uploadmode',
    'title' => '上传模式',
    'type' => 'select',
    'content' => 
    array (
      'client' => '客户端直传(速度快,无备份)',
      'server' => '服务器中转(占用服务器带宽,有备份)',
    ),
    'value' => 'client',
    'rule' => '',
    'msg' => '',
    'tip' => '',
    'ok' => '',
    'extend' => '',
  ),
  6 => 
  array (
    'name' => 'savekey',
    'title' => '保存文件名',
    'type' => 'string',
    'content' => 
    array (
    ),
    'value' => '/uploads/{year}{mon}{day}/{filemd5}{.suffix}',
    'rule' => 'required',
    'msg' => '',
    'tip' => '',
    'ok' => '',
    'extend' => '',
  ),
  7 => 
  array (
    'name' => 'expire',
    'title' => '上传有效时长',
    'type' => 'string',
    'content' => 
    array (
    ),
    'value' => '600',
    'rule' => 'required',
    'msg' => '',
    'tip' => '',
    'ok' => '',
    'extend' => '',
  ),
  8 => 
  array (
    'name' => 'maxsize',
    'title' => '最大可上传',
    'type' => 'string',
    'content' => 
    array (
    ),
    'value' => '10M',
    'rule' => 'required',
    'msg' => '',
    'tip' => '',
    'ok' => '',
    'extend' => '',
  ),
  9 => 
  array (
    'name' => 'mimetype',
    'title' => '可上传后缀格式',
    'type' => 'string',
    'content' => 
    array (
    ),
    'value' => 'jpg,png,bmp,jpeg,gif,zip,rar,xls,xlsx',
    'rule' => 'required',
    'msg' => '',
    'tip' => '',
    'ok' => '',
    'extend' => '',
  ),
  10 => 
  array (
    'name' => 'multiple',
    'title' => '多文件上传',
    'type' => 'bool',
    'content' => 
    array (
    ),
    'value' => '0',
    'rule' => 'required',
    'msg' => '',
    'tip' => '',
    'ok' => '',
    'extend' => '',
  ),
  11 => 
  array (
    'name' => 'syncdelete',
    'title' => '附件删除时是否同步删除文件',
    'type' => 'bool',
    'content' => 
    array (
    ),
    'value' => '0',
    'rule' => 'required',
    'msg' => '',
    'tip' => '',
    'ok' => '',
    'extend' => '',
  ),
);
