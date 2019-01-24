<?php

namespace App\Containers\Category\Tasks;

use App\Containers\Category\Data\Repositories\CategoryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class FindCategoryByIdTask
 * @package App\Containers\Category\Tasks
 */
class FindCategoryByIdTask extends Task
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * FindCategoryByIdTask constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function run($id)
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
