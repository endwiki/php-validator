<?php
/**
 * 字符串长度校验类
 * User: 杨起帆
 * Date: 2018/8/31
 * Time: 16:44
 */

namespace JinZhiSu;

class LengthValidator implements ValidatorInterface
{

    /**
     * 校验字符串长度
     * @param $value
     * @param $rule
     */
    public function check($value, $rule)
    {
        list($rule, $minLength, $maxLength) = explode(':', $rule);
        $valueLength = mb_strlen($value, 'utf-8');

        return boolval(!empty($value) && $valueLength >= $minLength && $valueLength <= $maxLength);
    }
}