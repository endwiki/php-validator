<?php
/**
 * Created by PhpStorm.
 * User: end_wiki
 * Date: 2018/7/31
 * Time: 23:22
 */
namespace JinZhiSu;

class StringValidator implements ValidatorInterface
{

    public function check($value, $rule)
    {
        return is_string($value);
    }
}