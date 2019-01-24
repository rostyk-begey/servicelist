<?php

namespace App\Containers\Category\Tasks;

use App\Containers\Category\Data\Repositories\CategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class CreateCategoryTask
 * @package App\Containers\Category\Tasks
 */
class CreateCategoryTask extends Task
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * CreateCategoryTask constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
