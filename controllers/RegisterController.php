<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\forms\RegisterForm;
use app\models\User;

class RegisterController extends Controller
{
    public function actionIndex() {
        if ( !Yii::$app->user->isGuest ) {
            return $this->redirect(['account/index']);
        }

        $model = new RegisterForm();

        if ( $model->load( Yii::$app->request->post() ) ) {
            if ( $user = $model->save() ) {
                // dd(Yii::$app->request->post());
                Yii::$app->user->login( $user );
                return $this->redirect(['account/index']);
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}
