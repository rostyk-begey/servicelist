<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class UpdateCategoryAction
 * @package App\Containers\Category\Actions
 */
class UpdateCategoryAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'id',
            'name',
            'parent_id'
        ]);

        $category = Apiato::call('Category@UpdateCategoryTask', [$request->id, $data]);

        return $category;
    }
}
