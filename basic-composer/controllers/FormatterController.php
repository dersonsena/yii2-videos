<?php

namespace app\controllers;

use app\classes\components\MyFormatter;
use Yii;
use yii\web\Controller;

class FormatterController extends Controller
{
    public function actionIndex()
    {
        $appLang = Yii::$app->language;

        /** @var MyFormatter $formatter */
        $formatter = Yii::$app->formatter;

        echo "<h2>{$appLang}</h2>";

        echo "
            <p>CEP: {$formatter->asCep('60332000')}</p>
            <p>CNPJ: {$formatter->asCnpj('12345678909876')}</p>
            <p>CPF: {$formatter->asCpf('01234567890')}</p>
            <p>Size (Tamanhos): {$formatter->asShortSize(102400, 2)}</p>
            <p>Moedas: {$formatter->asCurrency(12345.67)}</p>
            <p>Datas Formato PHP: {$formatter->asDate("2016-03-20")}</p>
            <p>Datas Formato: {$formatter->asDate("2016-03-20")}</p>
            <p>Datas: {$formatter->asDate("2016-03-20", 'full')}</p>
            <p>Datas: {$formatter->asDate("2016-03-20", 'long')}</p>
            <p>Datas: {$formatter->asDate("2016-03-20", 'medium')}</p>
            <p>Datas: {$formatter->asDate("2016-03-20", 'short')}</p>
            <p>NText: {$formatter->asNtext("Kilderson\nPinheiro\nde\nSena")}</p>
            <p>E-mails: {$formatter->asEmail('dersonsena@gmail.com')}</p>
            <p>Booleans: {$formatter->asBoolean(true)}</p>
            <p>Percentuais: {$formatter->asPercent(0.12345, 2)}</p>
        ";
    }
}