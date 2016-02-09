<?php

namespace app\classes\components;

use yii\base\Component;

class MyComponent extends Component
{
    public $string;

    public function printString()
    {
        echo $this->string;
    }
}