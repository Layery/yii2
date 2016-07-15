<?php

namespace frontend\Controllers;


use yii;
use yii\rest\ActiveController;

class UserController extends ActiveController
{

    public $modelClass = 'frontend\models\TestRestful';

    public function actionIndex()
    {
        echo 'asdfasdf';
    }


}




