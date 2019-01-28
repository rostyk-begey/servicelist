<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class CreateCategoryAction
 * @package App\Containers\Category\Actions
 */
class CreateCategoryAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name',
            'parent_id'
        ]);

        $parent_id = $data['parent_id'];

        $data['parent_id'] = $parent_id != 'null' ? (int)$parent_id : null;

        $category = Apiato::call('Category@CreateCategoryTask', [$data]);

        return $category;
    }
}
