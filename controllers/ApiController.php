<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 18.04.19
 * Time: 16:31
 */

namespace app\controllers;

use app\abstracts\ApiControllerAbstract;
use app\forms\CreateResultsForm;
use app\managers\TempResultManager;
use Yii;
use yii\base\Module;

/**
 * Class ApiController
 * @package app\controllers
 */
class ApiController extends ApiControllerAbstract
{

    /**
     * @var TempResultManager $resultManager
     */
    private $resultManager;

    /**
     * ApiController constructor.
     * @param string $id
     * @param Module $module
     * @param TempResultManager $manager
     * @param array $config
     */
    public function __construct(string $id, Module $module, TempResultManager $manager, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->resultManager = $manager;
    }

    /**
     * @return bool
     */
    public function actionIndex()
    {
        $model = new CreateResultsForm();

        if($model->load(Yii::$app->request->post(), '') && $model->validate()) {
            return $this->resultManager->create($model->getDto());
        } else {
            return false;
        }
    }

}