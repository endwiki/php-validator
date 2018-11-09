# PHP Validator #

## 前言 ##

公司里的用的是 Yii 框架， Yii 习惯上使用模型校验。而其他框架大都实现了更灵活的校验类。所以自己封装了一个类似的校验类，以
方便在接口处(区别于模型中)对客户端的传值进行校验。

## 安装 ##

建议使用 composer 进行安装。

## 基本使用 ##

基本使用如下:

```
$requestParams = [
    'name' => 'admin',
    'age' => 100,
    'tel' => '18969143101',
];

class UserValidator extends \JinZhiSu\Validator
{
    protected $ruleMap = [
        'name' => ['required'],
        'age' => ['Integer', 'Min:0', 'Max:125'],
        'tel' => ['required', 'Phone'],
    ];

    protected $message = [
        'name' => '姓名必填',
        'age' => '年龄必须为整数,必须在0到125之间',
        'tel' => '手机号码格式不正确',
    ];

    protected $defaultValues = [
        'age' => 1
    ];
}

$validator = new UserValidator($requestParams);
if (!$validator->check()) {
    var_dump($validator->getLastError());
    die();
}
var_dump($validator->getData());
```