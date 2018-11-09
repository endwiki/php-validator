<?php
namespace JinZhiSu;

class InValidator implements ValidatorInterface
{

    public function check($value, $rule)
    {
        $range = mb_strcut($rule, (strpos($rule, ':') + 1));
        $rangeArr = explode(',', $range);

        return boolval(in_array($value, $rangeArr));
    }

}