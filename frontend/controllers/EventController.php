<?php

namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use frontend\models\TestEvent;


class EventController extends Controller {

    public function actionIndex()
    {
          $testComponet=Yii::createComponent("application.components.TestEvent");
          $testComponet->onEcho=array($this,'kill');//register handler function to event
          $testComponet->onEcho(new CEvent($testComponet));//call this event;
    }



}



