<?php

namespace frontend\controllers;

use yii;
use yii\web\Response; 
use frontend\models\Room;
use yii\rest\ActiveController;



class RoomController extends ActiveController
{
    public $modelClass = 'frontend\models\Room';

    pubilc function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['rateLimiter']['enableRateLimitHeaders'] = false;
        return $behaviors;
    }



    












    // 测试该类的方法.
    public function actionGet()
    {
        $room = new Room;
        p($room);


        $room = new Room;
        p(get_class_methods($room));
    }



    //自定义搜索方法
    public function actionSearch($param)
    {
        return Room::findOne($param);
    }
}





