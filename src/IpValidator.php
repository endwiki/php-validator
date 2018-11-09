<?php
/**
 * IP 校验类
 * User: 季俊潇
 * Date: 2018/7/31
 * Time: 23:26
 */

namespace JinZhiSu;

class IpValidator implements ValidatorInterface
{

    public function check($value, $rule)
    {
        $pattern = '/^(?:(?:2(?:[0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9])\.){3}(?:(?:2([0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9]))$/';

        return boolval(preg_match($pattern, $value));
    }
}