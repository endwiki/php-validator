<?php
/**
 * 最小值校验类
 * User: 杨起帆
 * Date: 2018/8/31
 * Time: 17:08
 */

namespace JinZhiSu;

class MinValidator implements ValidatorInterface
{

    /**
     * 校验
     * @param mixed $value
     * @param string $rule
     * @return bool
     */
    public function check($value, $rule)
    {
       list($rule, $mix) = explode(':', $rule);

       return boolval(is_numeric($value) && $rule >= $mix);
    }
}