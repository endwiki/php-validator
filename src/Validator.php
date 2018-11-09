<?php
/**
 * 验证器类
 * User: 苏近之
 * Date: 2018/11/9
 * Time: 10:39
 */

namespace JinZhiSu;

class Validator
{
    protected $data = [];
    protected $ruleMap = [];
    protected $message = [];
    protected $defaultValues = [];
    protected $lastError = '';

    public function __construct($data)
    {

        $this->data = $data;
    }

    public function check()
    {
        if (!count($this->data)) {
            $this->lastError = '没有接收到传参';
            return false;
        }
        // 遍历规则
        foreach ($this->ruleMap as $field => $rules) {
            // 检查是否必填
            if (in_array('required', $rules) && !isset($this->data[$field])) {
                if (!isset($this->message[$field])) {
                    $this->lastError = '字段验证错误!';
                    return false;
                }
                $this->lastError = $this->message[$field];
                return false;
            }
            // 如果该字段不存在并且设置了默认值
            if ((!isset($this->data[$field]) || $this->data[$field] === '')
                && isset($this->defaultValues[$field])) {
                $this->data[$field] = $this->defaultValues[$field];
                continue;
            }
            // 检查其他规则
            if (isset($this->data[$field])) {
                if (!$this->eachRule($rules, $this->data[$field])) {
                    if (!isset($this->message[$field])) {
                        $this->lastError = '字段校验错误';
                    } else {
                        $this->lastError = $this->message[$field];
                    }
                    return false;
                }
            }
        }
        return true;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $rules
     * @param $value
     * @return bool
     */
    public function eachRule($rules, $value)
    {
        foreach ($rules as $index => $rule) {
            if ($rule === 'required') {
                continue;
            }
            // 处理匿名函数
            if (is_array($rule)) {
                return boolval(call_user_func($rule));
            }

            $class = $rule;
            if (strpos($class, ':')) {
                $class = substr($class, 0, strpos($class, ':'));
            }
            $validator = '\\JinZhiSu\\' . ucfirst($class) . 'Validator';
            if (!(new $validator)->check($value, $rule)) {
                return false;
            }
        }
        return true;
    }

    /**
     * 获取最近的错误
     * @return string
     */
    public function getLastError()
    {
        return $this->lastError;
    }
}