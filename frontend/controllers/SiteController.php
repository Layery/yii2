<?php
namespace frontend\controllers;

use Yii;
use frontend\models\Room;
use frontend\models\Student;
use frontend\behavior\MyBehavior;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use frontend\models\ContactForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        echo $this->render('index');

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
        // $model=new ContactForm;

        // $model->onSendMail=function($event) {
        //     $headers="From: {$event->sender->email}\r\nReply-To: {$event->sender->email}";
        //     mail(Yii::app()->params['adminEmail'],$event->sender->subject,$event->sender->body,$headers);
        // };

        // if(isset($_POST['ContactForm']))
        // {
        //     $model->attributes=$_POST['ContactForm'];
        //     if($model->validate())
        //     {

        //         Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
        //         $this->refresh();
        //     }
        // }
        // $this->render('contact',array('model'=>$model));
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    // 测试事件
    public function actionTest()
    {
        $person = new Student(); // backendmodelsPerson;
        $this->on('111','hello','111111111'); // 全局函数，定义在入口文件index.php中

        $this->on('222',[$person,'say_bye']); // 对象
        $this->on('333',['room','say_hello']); // 类
        $this->on('444',function(){
        return '444444444'.'<br/>';
        }); //匿名函数


        // $this->trigger('333');
        $this->trigger('444');
        $rs = $this->trigger('111'); //触发事件
        $this->trigger('222'); //触发事件
        // $this->trigger('333'); //触发事件
        // $this->trigger('444'); //触发匿名事件

        echo $this->renderContent('');



    }

    // 测试行为 1 
    public function actionBehavior()
    {

        $room = new Room();

        $behavior = new MyBehavior;



        $room->attachBehavior('behaviorTest',$behavior);

        echo $this->render('MyBehavior',['model'=>$room]);


    }


    // 测试行为 2 
    public function actionBehaviorsec()
    {
        $behavior = new MyBehavior();
        $room = new Room;

        p(get_class_methods($behavior));
        p($behavior);

    }



}


