<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $this->title = 'Регистрация';
?>

<?php
    $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal'],
        'method' => 'post',
        'action' => ['register/index'],
    ]);
?>
<div class="form-group row">
    <h1>Регистрация</h1>
</div>

<div class="form-group row">
    <?= $form->field($model, 'user_type')->radioList(
            ['0' => 'Физ. лицо', '1' => 'ИП', '2' => 'Юр. лицо']
        )->label(false);
    ?>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <?= $form->field($model, 'first_name')->textInput()->label('Имя') ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <?= $form->field($model, 'middle_name')->textInput()->label('Отчество') ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <?= $form->field($model, 'second_name')->textInput()->label('Фамилия') ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <?= $form->field($model, 'email')->textInput()->label('Email') ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <?= $form->field($model, 'tin')->textInput()->label('ИНН') ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <?= $form->field($model, 'company_name')->textInput()->label('Название компании') ?>
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-4">
        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <?= $form->field($model, 'password_repeat')->passwordInput()->label('Подтверждение пароля') ?>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php
    ActiveForm::end();
?>
