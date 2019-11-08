<?php

use think\Route;

Route::get('/login','api/WechatController/login');

Route::get('/get-imgs','api/PictureController/indeximgs');
Route::get('/get-more-imgs','api/PictureController/getimgs');

Route::get('/get-videos','api/VideoController/indexvideos');
Route::get('/get-more-videos','api/VideoController/getvideos');
Route::get('/get-video-content','api/VideoController/getvideocontent');
Route::post('/collect','api/VideoController/collect');

Route::get('/get-team-content','api/TeamController/getteams');

Route::post('/userinfo','api/WechatUser/postuserinfo');

