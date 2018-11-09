<?php
/**
 * Json 格式字符串校验类
 * User: 杨起帆
 * Date: 2018/8/29
 * Time: 9:05
 */

namespace JinZhiSu;

class JsonValidator implements ValidatorInterface
{

    /**
     * 校验是否为 Json 格式字符串
     * @param mixed $value 待校验的值
     * @param array $rule 校验的规则
     * @return bool
     */
    public function check($value, $rule)
    {
        // 解决前端传数组报错的问题
        if(is_array($value)){
            return true;
        }
        $result = json_decode($value);
        // 解决空数组校验失败的问题
        if(is_array($result)){
            return true;
        }
        // 解决因为因为输入错误字符串或布尔值导致的验证通过
        if(is_null($result) || is_bool($result)){
            return false;
        }

        // 解决因为空字符导致校验通过的问题
        return boolval(!empty($result) && json_last_error() === JSON_ERROR_NONE);
    }
}