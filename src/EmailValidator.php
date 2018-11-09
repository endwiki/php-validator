<?php
/**
 * 邮箱地址校验类
 * User: 苏近之
 * Date: 2018/7/31
 * Time: 23:25
 */
namespace JinZhiSu;

class EmailValidator implements ValidatorInterface
{

    /**
     * 校验规则
     * @param mixed $value
     * @param string $rule
     * @return bool
     */
    public function check($value, $rule)
    {
        return boolval(filter_var($value, FILTER_VALIDATE_EMAIL));
    }
}