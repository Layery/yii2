<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Room;
use frontend\models\search\RoomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\data\ActiveDataProvider;

/**
 * RoomController implements the CRUD actions for Room model.
 */
class RoomController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 展示班级列表
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider(['query'=>Room::find()->asArray()]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Room model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * 新增班级
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function actionCreate()
    {
        $model = new Room();
        if (isset($_POST['room'])) {
            $model->attributes = $_POST['room'];
            if ($model->save()) {
               return $this->redirect(['index']);
            } 
        } 
        
        echo $this->render('create');
    }

    

    /**
     * 修改班级
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    
    /**
     * 删除班级
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function actionDelete($id)
    {
        $model = Room::findOne($id);
        if ($model) {
            $model->delete();
            $this->redirect(['index']);
        } else {
            exit('参数有误');
        }
    }

    /**
     * Finds the Room model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Room the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Room::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
