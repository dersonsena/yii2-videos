<?php

namespace app\classes\filters;

use yii\base\ActionFilter;

class TempoAcaoFilter extends ActionFilter
{
    private $start;
    public $message = 'Sua action demorou:';

    public function beforeAction($action)
    {
        $this->start = microtime(true);
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        $time = microtime(true) - $this->start;

        echo "<p>{$this->message} {$time} segundos.</p>";

        return parent::afterAction($action, $result);
    }
}