<?php

namespace frontend\behavior;

use yii\base\Model;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
* 测试行为
*/
class MyBehavior extends Behavior 
{ 
    public $param1 = 'LLF';


    public function say()
    {
        echo '哈哈哈哈哈';
    }
}

