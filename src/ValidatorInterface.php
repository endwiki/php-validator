<?php
/**
 * 验证接口类
 * User: 季俊潇
 * Date: 2018/7/31
 * Time: 22:29
 */
namespace JinZhiSu;

interface ValidatorInterface
{
    public function check($value, $rule);
}

