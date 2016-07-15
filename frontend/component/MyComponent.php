<?php
/**
 * 测试自定义组件
 * @authors Your Name (you@example.org)
 * @date    2016-07-13 14:46:57
 * @version $Id$
 */

namespace frontend\component;

use yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class MyComponent extends Component 
{
    public $attr;

    public function testMyComponent()
    {
        echo $this->attr.'hello , bye`';
    }    
   
}