<?php
/**
 * 域名验证类
 * User: 杨起帆
 * Date: 2018/8/31
 * Time: 17:20
 */

namespace JinZhiSu;

class UrlValidator implements ValidatorInterface
{

    /**
     * 规则校验
     * @param mixed $value
     * @param string $rule
     * @return bool
     */
    public function check($value, $rule)
    {
        return filter_var($value,  FILTER_VALIDATE_URL);
    }
}