<?php

namespace App\Containers\Category\UI\WEB\Controllers;

use App\Containers\Category\UI\WEB\Requests\CreateCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\DeleteCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\GetAllCategoriesRequest;
use App\Containers\Category\UI\WEB\Requests\FindCategoryByIdRequest;
use App\Containers\Category\UI\WEB\Requests\UpdateCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\StoreCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\EditCategoryRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Category\Models\Category;

/**
 * Class Controller
 *
 * @package App\Containers\Category\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * @param GetAllCategoriesRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(GetAllCategoriesRequest $request)
    {
        $categories = Category::getTree();

        $categories = json_encode($categories);

        return view('category::categories', compact('categories'));
    }

    /**
     * Show one entity
     *
     * @param FindCategoryByIdRequest $request
     */
    public function show(FindCategoryByIdRequest $request)
    {
        $category = Apiato::call('Category@FindCategoryByIdAction', [$request]);
    }

    /**
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CreateCategoryRequest $request)
    {
        $categories = Category::getTree();

        $categories = json_encode($categories);

        return view('category::category_create', compact('categories'));
    }

    /**
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Apiato::call('Category@CreateCategoryAction', [$request]);

        $categories = Category::getTree();

        $categories = json_encode($categories);

        return $categories;
    }

    /**
     * @param EditCategoryRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EditCategoryRequest $request)
    {
        $categories = Category::getTree();

        $categories = json_encode($categories);

        return view('category::category_edit', compact('categories'));
    }

    /**
     * @param UpdateCategoryRequest $request
     * @return mixed
     */
    public function update(UpdateCategoryRequest $request)
    {
        $category = Apiato::call('Category@UpdateCategoryAction', [$request]);

        $categories = Category::getTree();

        $categories = json_encode($categories);

        return $categories;
    }

    /**
     * @param DeleteCategoryRequest $request
     * @return array|false|string
     */
    public function delete(DeleteCategoryRequest $request)
    {
        $result = Apiato::call('Category@DeleteCategoryAction', [$request]);

        $categories = Category::getTree();

        $categories = json_encode($categories);

        return $categories;
    }
}
