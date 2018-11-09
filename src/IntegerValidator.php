<?php
/**
 * 整形数值校验类
 * User: 杨起帆
 * Date: 2018/9/1
 * Time: 9:40
 */

namespace JinZhiSu;

class IntegerValidator implements ValidatorInterface
{

    /**
     * 校验规则
     * @param mixed $value
     * @param string $rule
     * @return bool
     */
    public function check($value, $rule)
    {
        // FIXME: 判断错误
        return boolval(($value + 0) === (int)$value);
    }
}