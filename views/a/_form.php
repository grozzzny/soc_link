<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<p>Модуль для отображения ссылок.</p>
<p>Ознакомиться с иконками вы сможете по ссылке: <a target="_blank" href="http://fontawesome.io/icons/">http://fontawesome.io/icons/</a></p>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'options' => ['class' => 'model-form']
]); ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'link') ?>
<?= $form->field($model, 'icon') ?>

<?= Html::submitButton(Yii::t('easyii', 'Save'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>