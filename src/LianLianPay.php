<?php

/**
 * Created by PhpStorm.
 * User: cscjj2008
 * Date: 17/3/31
 * Time: 上午10:38
 */
namespace Junjiesang\Llpay;

use Junjiesang\Llpay\LianlianCore\Submit;
/**
 * Class LianLianPay
 * @package Junjiesang\Llpay
 */
class LianLianPay
{

    /**
     * @var array
     */
    protected $attributes = [];
    /**
     * @var array
     */
    protected $config = [];
    /**
     * Application constructor.
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->attributes = [
            'user_config' =>[
                "oid_partner" => trim($config['oid_partner']),
                "app_request" => trim($config['app_request']),
                "sign_type" => trim($config['sign_type']),
                "valid_order" => trim($config['valid_order']),
            ]
        ];
    }


    /**
     * Magic access..
     *
     * @param string $method
     * @param array  $args
     *
     * @return Notice
     */
    public function __call($method, $args)
    {
        $map = [
            'data' => 'user',
        ];

        if (0 === stripos($method, 'with') && strlen($method) > 4) {
            $method = lcfirst(substr($method, 4));
        }

        if (0 === stripos($method, 'and')) {
            $method = lcfirst(substr($method, 3));
        }

        if (isset($map[$method])) {
            $this->attributes[$map[$method]] = array_shift($args);
        }

        return $this;
    }
    /**
     * @param $val
     * @return mixed
     */
    public function make(){
        $submit = new Submit($this->config);
        $user = array_merge($this->attributes['user_config'],$this->attributes['user']);
        return $submit->buildRequestForm($user,"post", "确认");
    }

    /**
     * @param $val
     * @param $value
     * @return bool
     */
    public function check($val,$value){
        return $val === $value;
    }
}