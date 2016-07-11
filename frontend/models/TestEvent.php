<?php
namespace frontend\models;

use yii\base\Component;

class TestEvent extends Component
{
    public $name;               // 事件名
    public $sender;             // 事件发布者，通常是调用了 trigger() 的对象或类。
    public $handled = false;    // 是否终止事件的后续处理
    public $data;               // 事件相关数据

    private static $_events = [];

    public static function on($class, $name, $handler, $data = null,
        $append = true)
    {
        // ... ...
        // 用于绑定事件handler
    }

    public static function off($class, $name, $handler = null)
    {
        // ... ...
        // 用于取消事件handler绑定
    }

    public static function hasHandlers($class, $name)
    {
        // ... ...
        // 用于判断是否有相应的handler与事件对应
    }

    public static function trigger($class, $name, $event = null)
    {
        // ... ...
        // 用于触发事件
    }
}