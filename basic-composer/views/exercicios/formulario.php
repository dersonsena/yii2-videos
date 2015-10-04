<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>

<h2>Formulário de Cadastro - Yii2</h2>
<hr>

<?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'nome') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'idade') ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar Dados', ['class'=>'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end() ?>