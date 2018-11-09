<?php
/**
 * 最大值校验类
 * User: 杨起帆
 * Date: 2018/8/31
 * Time: 17:03
 */

namespace JinZhiSu;

class MaxValidator implements ValidatorInterface
{

    /**
     * 规则校验
     * @param string $value
     * @param string $rule
     * @return bool
     */
    public function check($value, $rule)
    {
        list($rule, $max) = explode(':', $rule);

        return boolval(is_numeric($value) && $value <= $max);
    }
}