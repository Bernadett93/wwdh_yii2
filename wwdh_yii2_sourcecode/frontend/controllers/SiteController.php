<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Post;
use common\models\User;
use yii\data\Pagination;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['create', 'update'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ]
                ]
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
     * {@inheritdoc}
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
        $query=Post::find();
        $pagination=new Pagination([
            'defaultPageSize'=>20,
            'totalCount'=>$query->count(),
        ]);
        
        $posts=$query->orderBy(['date'=> SORT_DESC])->offset($pagination->offset)->limit($pagination->limit)->all();
        $users=User::find()->all();
        return $this->render('index', [
            'posts'=>$posts, 
            'users'=>$users, 
            'pagination'=>$pagination
        ]);
    }
    
    public function actionCreate()
    {
        $post=new Post();
        $post->user_id=Yii::$app->user->identity->id;
        $formData=Yii::$app->request->post();
        if($post->load($formData)){
            if($post->save()){
                Yii::$app->getSession()->setFlash('message', 'Post was published!');
                return $this->redirect(['index']);
            }
            else{
                Yii::$app->getSession()->setFlash('message', 'Failed to post!');
            }
        }
        return $this->render('create', ['post'=>$post]);
    }
    
    public function actionPost($post_id)
    {
        $post=Post::findOne($post_id);
        $post->updateCounters(['attendence'=>1]);
        $user=User::findOne($post->user_id);
        return $this->render('post', ['post'=>$post, 'user'=>$user]);
    }
    
    public function actionUser($user_id)
    {
        $query=Post::find();
        $user=User::findOne($user_id);
        $pagination=new Pagination([
            'defaultPageSize'=>20,
            'totalCount'=>$query->count(),
        ]);
        
        $posts=$query->where('user_id='.$user_id)->orderBy(['date'=> SORT_DESC])->offset($pagination->offset)->limit($pagination->limit)->all();
        
        return $this->render('user', [
            'posts'=>$posts, 
            'user'=>$user, 
            'pagination'=>$pagination
        ]);
               
    }
    
    public function actionSettings($user_id)
    {
        $user=User::findOne($user_id);
        //$model= SignupForm::findModel($user_id);
        
        if($user->load(Yii::$app->request->post()) && $user->save()){
            //Yii::$app->db->createCommand('UPDATE user SET username="'.$user->username.'", email="'.$user->email.'" WHERE id='.$user->id)->execute();
            Yii::$app->getSession()->setFlash('message', 'Datas were modified successfully! New username: ');
            return $this->redirect(['index', 'user_id'=>$user->id]);
        }
        else{
            return $this->render('settings', ['user'=>$user]);
        }
        
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

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

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
                    Yii::$app->getSession()->setFlash('message', 'Signup was successful!');
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
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
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
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
