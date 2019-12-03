<?php

namespace app\models\forms;

use yii\base\Model;
use app\models\User;

class RegisterForm extends Model
{
    public $first_name, $middle_name, $second_name;
    public $email;
    public $tin;
    public $company_name;
    public $password, $password_repeat;
    public $user_type = 0;

    public function attributeLabels() {
        return [
            'first_name'      => 'Имя',
            'middle_name'     => 'Отчество',
            'second_name'     => 'Фамилия',
            'email'           => 'Email',
            'tin'             => 'ИНН',
            'company_name'    => 'Название компании',
            'password'        => 'Пароль',
            'password_repeat' => 'Подтверждение пароля',
            'user_type'       => 'Тип пользователя',
        ];
    }

    public function rules() {
        return [
            [['first_name', 'second_name', 'middle_name', 'email', 'tin', 'company_name'], 'trim'],
            [['first_name', 'second_name', 'middle_name', 'email', 'password', 'password_repeat'], 'required'],
            [['first_name', 'second_name', 'middle_name'], 'string', 'max' => 50, 'min' => 2],
            // [['first_name', 'second_name', 'middle_name'], 'match', 'pattern' => '/[^a-zA-Zа-яА-Я0-9]/ui'],

            [['email'], 'unique', 'targetClass' => User::className()],
            ['email', 'string', 'max' => 100, 'min' => 5],

            ['password', 'string', 'max' => 50, 'min' => 6],

            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['password_repeat', 'string', 'max' => 50, 'min' => 6],

            ['tin', 'string', 'max' => 20],
            ['tin', 'number'],
            [['tin'], 'required',
                'when' => function ($model) {
                    return $model->user_type == '1';
                },
                'whenClient' => "function (attribute, value) {
                    return $('input[name=\'RegisterForm[user_type]\']:checked', '#register-form').val() == 1;
                }"
            ],
            [['tin'], 'required',
                'when' => function ($model) {
                    return $model->user_type == '2';
                },
                'whenClient' => "function (attribute, value) {
                    return $('input[name=\'RegisterForm[user_type]\']:checked', '#register-form').val() == 2;
                }"
            ],

            ['company_name', 'string', 'max' => 100],
            [['company_name'],
                'required',
                'when' => function ($model) {
                    return $model->user_type == '2';
                },
                'whenClient' => "function (attribute, value) {
                    return $('input[name=\'RegisterForm[user_type]\']:checked', '#register-form').val() == 2;
                }"
            ],

            ['user_type', 'safe']
        ];
    }

    /**
     * [save User]
     * @return User|null
     */
    public function save() {

        if ($this->validate()) {
            $user = new User();
            $user->first_name = $this->first_name;
            $user->middle_name = $this->middle_name;
            $user->second_name = $this->second_name;
            $user->email = $this->email;
            $user->tin = $this->tin;
            $user->company_name = $this->company_name;
            $user->setPassword( $this->password );
            $user->setAuthKey();
            $user->created_at = $time = time();
            $user->updated_at = $time;

            if ($user->save()) {
                return $user;
            }
        }
    }
}
