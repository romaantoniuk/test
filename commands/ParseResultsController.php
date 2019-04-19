<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 19.04.19
 * Time: 12:23
 */

namespace app\commands;

use app\dtos\ResultDto;
use app\managers\ParseResultManager;
use app\managers\ResultManager;
use app\managers\TempResultManager;
use yii\base\Module;
use yii\console\Controller;
use yii\helpers\Json;

/**
 * Class ParseResultsController
 * @package app\commands
 */
class ParseResultsController extends Controller
{


    /**
     * @var ParseResultManager $parseResult
     */
    private $parseResult;

    /**
     * ParseResultsController constructor.
     * @param string $id
     * @param Module $module
     * @param ParseResultManager $result
     * @param array $config
     */
    public function __construct(string $id, Module $module, ParseResultManager $result, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->parseResult = $result;
    }

    /**
     *
     */
    public function actionIndex()
    {


        $this->parseResult->parse();

    }

}
