<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 18.04.19
 * Time: 16:39
 */

namespace app\managers;

use app\abstracts\ManagerAbstract;
use app\dtos\CreateTempResultDto;
use app\repositories\TempResultRepository;

/**
 * Class ResultsManager
 * @package app\managers
 */
class TempResultManager extends ManagerAbstract
{

    /**
     * @var TempResultRepository $repository
     */
    private $repository;

    /**
     * ResultManager constructor.
     * @param TempResultRepository $repository
     */
    public function __construct(TempResultRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     */
    public function getAll()
    {
        return $this->repository->getAll();
    }

    /**
     * @param CreateTempResultDto $dto
     * @return bool
     */
    public function create(CreateTempResultDto $dto)
    {
        return $this->repository->create($dto);
    }

}
