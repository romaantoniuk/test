<?php

namespace app\controllers;

use app\managers\AuthManager;
use Yii;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\forms\LoginForm;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{

    /**
     * @var AuthManager $authManager
     */
    private $authManager;

    /**
     * SiteController constructor.
     * @param string $id
     * @param Module $module
     * @param AuthManager $authManager
     * @param array $config
     */
    public function __construct(string $id, Module $module, AuthManager $authManager, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->authManager = $authManager;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            try {
                if ($this->authManager->login($model->getDto())) {
                    return $this->goBack();
                }
            } catch (\Exception $exception) {
                $model->addError('email', $exception->getMessage());
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $this->authManager->logout();

        return $this->goHome();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionResults()
    {
        return $this->render('results', [

        ]);
    }
}
