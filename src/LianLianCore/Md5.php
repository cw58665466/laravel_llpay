<?php
/**
 * Created by PhpStorm.
 * User: cscjj2008
 * Date: 17/3/31
 * Time: 上午11:36
 */

namespace Junjiesang\Llpay\LianlianCore;


class Md5
{
    /**
     * 签名字符串
     * @param $prestr 需要签名的字符串
     * @param $key 私钥
     * return 签名结果
     */
    static public function md5Sign($prestr, $key) {
        $logstr = $prestr."&key=************************";
        $prestr = $prestr ."&key=". $key;
        //file_put_contents("log.txt","签名原串:".$logstr."\n", FILE_APPEND);
        return md5($prestr);
    }

    /**
     * 验证签名
     * @param $prestr 需要签名的字符串
     * @param $sign 签名结果
     * @param $key 私钥
     * return 签名结果
     */
    function md5Verify($prestr, $sign, $key) {
        $logstr = $prestr."&key=************************";
        $prestr = $prestr ."&key=". $key;
        //file_put_contents("log.txt","prestr:".$logstr."\n", FILE_APPEND);
        $mysgin = md5($prestr);
        //file_put_contents("log.txt","1:".$mysgin."\n", FILE_APPEND);
        if($mysgin == $sign) {
            return true;
        }
        else {
            return false;
        }
    }
}