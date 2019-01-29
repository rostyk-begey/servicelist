<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class FindCategoryByIdAction
 * @package App\Containers\Category\Actions
 */
class FindCategoryByIdAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $category = Apiato::call('Category@FindCategoryByIdTask', [$request->id]);

        return $category;
    }
}
