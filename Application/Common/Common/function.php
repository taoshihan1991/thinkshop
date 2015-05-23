<?php
//格式化时间
function timeFormat($time){
	$now=time();
	//传递时间与当前时间秒相差
	$diff=$now-$time;
	$str='';
	switch($diff){
		case $diff<60:
			$str=$diff.'秒前';
		break;

		case $diff<3600:
			$str=floor($diff/60).'分钟前';
		break;

		case $diff<(3600*24):
			$str=floor($diff/3600).'小时前';
		break;

		case $diff<(3600*24*30):
			$str=floor($diff/3600/24).'天前';
		break;

		case $diff<(3600*24*30*12):
			$str=floor($diff/3600/24/30).'个月前';
		break;

		default:
			$str=floor($diff/3600/24/30/12).'年前';
	}

	return $str;
} 