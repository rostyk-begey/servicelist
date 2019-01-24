<?php

namespace App\Containers\Category\Tasks;

use App\Containers\Category\Data\Repositories\CategoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class UpdateCategoryTask
 * @package App\Containers\Category\Tasks
 */
class UpdateCategoryTask extends Task
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * UpdateCategoryTask constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
