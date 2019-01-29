<?php

namespace App\Containers\Category\Tasks;

use App\Containers\Category\Data\Repositories\CategoryRepository;
use App\Ship\Parents\Tasks\Task;

/**
 * Class GetAllCategoriesTask
 * @package App\Containers\Category\Tasks
 */
class GetAllCategoriesTask extends Task
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * GetAllCategoriesTask constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        return $this->repository->paginate();
    }
}
