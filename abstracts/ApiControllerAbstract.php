<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 20.06.18
 * Time: 14:30
 */
namespace app\abstracts;

use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\rest\OptionsAction;
use yii\web\Response;

/**
 * Class ApiControllerAbstract
 * @package app\modules\api\controllers
 */
abstract class ApiControllerAbstract extends Controller
{

    /**
     * Array ignored actions for authentication
     * @var array $ignoredActions
     */
    protected $ignoredActions = [];

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'options' => OptionsAction::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class'   => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            [
                'class' => Cors::class,
            ],
        ],!Yii::$app->request->isOptions ? [
            [
                'class' => CompositeAuth::class,
                'authMethods' => $this->authMethods(),
            ],
            [
                'class' => AccessControl::class,
                'rules' => $this->accessRules(),
            ],
            [
                'class' => VerbFilter::class,
                'actions' => $this->verbs(),
            ],
        ] : []);
    }

    /**
     * @inheritdoc
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        return parent::beforeAction($action) && !Yii::$app->request->isOptions;
    }

    /**
     * Declares the allowed Auth methods.
     * Please refer to [[CompositeAuth::authMethods]] on how to declare the allowed methods.
     * @return array the allowed Auth methods.
     */
    protected function authMethods()
    {
        return [];
    }

    /**
     * Declares the allowed Access rules.
     * Please refer to [[AccessControl::rules]] on how to declare the rules.
     * @return array the allowed Access rules.
     */
    protected function accessRules()
    {
        return [
            ['allow' => true]
        ];
    }

}
