<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class GetAllCategoriesAction
 * @package App\Containers\Category\Actions
 */
class GetAllCategoriesAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $categories = Apiato::call('Category@GetAllCategoriesTask', [], ['addRequestCriteria']);

        return $categories;
    }
}
