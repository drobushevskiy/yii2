<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;

    $this->title = 'Личный кабинет';
?>

<div class="form-group row">
    <h1>Личный кабинет пользователя</h1>
    <h2>Добро пожаловать, <?= Html::encode($user->first_name.' '.$user->middle_name.' '.$user->second_name) ?></h2>
</div>

<?php
echo Html::a('Выйти', Url::to('index.php?r=account/logout', true))
?>
