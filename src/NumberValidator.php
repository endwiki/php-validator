<?php
/**
 * 数值校验类
 * User: 季俊潇
 * Date: 2018/7/31
 * Time: 22:33
 */
namespace JinZhiSu;

class NumberValidator implements ValidatorInterface
{

    public function check($value, $rule)
    {
       return is_numeric($value);
    }
}