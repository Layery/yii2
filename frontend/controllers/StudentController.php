<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Student;
use frontend\models\Room;
use frontend\models\search\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * 展示学生列表
     * @return [type] [description]
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
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
     * 新增学生
     * @return [type] [description]
     */
    public function actionCreate()
    {
        $model = new Student();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['room/index']);
        } else {
            $room = Room::find()->asArray()->all();
            return $this->render('create',['model'=>$model,'room'=>$room]);
        }
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Student::findOne($id);
        if (isset($_POST['Student'])) {
            $model->attributes = $_POST['Student'];
            if ($model->validate()) {
                $model->update();

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                p($model->getErrors());
            }
        } else {
            // exit('fase');
            $room = Room::find()->asArray()->all();
            return $this->render('update', [
                'model' => $model,
                'room' => $room,
            ]);
        }
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
