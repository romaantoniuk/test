<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 19.04.19
 * Time: 13:03
 */

namespace app\managers;

use app\abstracts\ManagerAbstract;
use app\dtos\ResultDto;
use app\dtos\CreateTempResultDto;
use app\dtos\ResultsDto;
use app\repositories\ResultRepository;
use app\repositories\TempResultRepository;
use yii\helpers\Json;

/**
 * Class ResultManager
 * @package app\managers
 */
class ParseResultManager extends ManagerAbstract
{

    /**
     * @var ResultRepository $repository
     */
    private $resultRepository;

    /**
     * @var TempResultManager $tempResultRepository
     */
    private $tempResultRepository;

    /**
     * ResultManager constructor.
     * @param ResultRepository $resultRepository
     * @param TempResultRepository $tempResultRepository
     */
    public function __construct(ResultRepository $resultRepository, TempResultRepository $tempResultRepository)
    {
        $this->resultRepository = $resultRepository;
        $this->tempResultRepository = $tempResultRepository;
    }

    /**
     *
     */
    public function parse()
    {
        $files = $this->tempResultRepository->getAll();

        $resultsDto = new ResultsDto();

        foreach ($files as $file) {
            $content = file_get_contents(__DIR__ . "/../storage/$file");
            $content = Json::decode($content);

            foreach ($content['results'] as $result) {
                $dto = new ResultDto();
                $dto->user_id = $content['user_id'];
                $dto->biomarker_id = $result['biomarker_id'];
                $dto->date = $content['date'];
                $dto->result = $result['result'];
                $dto->unit = $result['unit'];
                $dto->references = $result['references'];

                $resultsDto->setResult($dto);
            }

            unlink(__DIR__ . "/../storage/$file");
        }

        return $this->resultRepository->createAll($resultsDto);
    }

}
