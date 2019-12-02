<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AccountController extends Controller
{
    public function actionIndex() {
        if ( Yii::$app->user->isGuest ) {
            return $this->redirect(['register/index']);
        }

        $user = Yii::$app->user->identity;
        return $this->render('index', ['user' => $user]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(['register/index']);
    }

}
