<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk\Config;

use Compass\Http\Requests\Helpdesk\CategoryValidation;
use Compass\Models\Categories;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Compass\Http\Controllers\Controller;
use Mpociot\Reanimate\ReanimateModels;

/**
 * Class CategoryController
 *
 * @package Compass\Http\Controllers\Backend\Web\Helpdesk\Config
 */
class CategoryController extends Controller
{
    use ReanimateModels;

    /**
     * Holds the categories model
     *
     * @var Categories $users
     */
    protected $categories;

    /**
     * CategoryController constructor.
     *
     * @param  Categories $categories Controller variable for the categories resource model.
     * @return void
     */
    public function __construct(Categories $categories)
    {
        $this->middleware(['verified', 'auth', 'forbid-banned-user', 'role:admin']);
        $this->categories = $categories;
    }

    /**
     * Helpdesk categories index view.
     *
     * @return View
     */
    public function index(): View
    {
        $categories = $this->categories->withTrashed()->orderBy('name', 'ASC')->simplePaginate('15');
        return view('backend.helpdesk.categories.index', compact('categories'));
    }

    /**
     * Create view for new helpdesk categories.
     *
     * @return View
     */
    public function create(): View
    {
        $types = $this->categories->getTypes();
        return view('backend.helpdesk.categories.create', compact('types'));
    }

    /**
     * Create an new helpdesk category in the application.
     *
     * @param  CategoryValidation $input The form request class that handles the validation
     * @return RedirectResponse
     */
    public function store(CategoryValidation $input): RedirectResponse
    {
       if ($category = $this->categories->create($input->all())) {
           $category->creator()->associate($input->user())->save(); // Assign authenticated user to the category.
           $this->flashSuccess('The category has been stored');
       }

       return redirect()->route('helpdesk.categories.create');
    }

    /**
     * Edit view for an helpdesk category.
     *
     * @param  Categories $category Resource model for the helpdesk model.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Categories $category)
    {
        $types = $this->categories->getTypes();
        return view('backend.helpdesk.categories.edit', compact('category', 'types'));
    }

    /**
     * Update the given category in the resource storage.
     *
     * @param  CategoryValidation $input    The form request that handles the validation.
     * @param  Categories         $category The resource model for the category storage
     * @return RedirectResponse
     */
    public function update(CategoryValidation $input, Categories $category): RedirectResponse
    {
        if ($category->update($input->all())) {
            $this->flashSuccess('The category has been updated');
        }

        return redirect()->route('helpdesk.categories.edit', $category);
    }

    /**
     * Delete a resource (helpdesk category) in the storage.
     *
     * @throws \Exception Instance of ModelNotFoundException when no record is found.
     *
     * @param  Categories $category The model entity for the resource
     * @return RedirectResponse
     */
    public function destroy(Categories $category): RedirectResponse
    {
        if ($category->delete()) {
            $undoLink = '<a href="' . route('helpdesk.categories.undo', $category) . '">undo</a>';
            $this->flashWarning("The category has been deleted. {$undoLink}")->important();
        }

        return redirect()->route('helpdesk.categories.index');
    }

    /**
     * Undo the delete for the helpdesk category in the storage.
     *
     * @param  int $category The resource entity form the resource
     * @return RedirectResponse
     */
    public function undoDeleteRoute(int $category): RedirectResponse
    {
        $this->flashInfo('The category has been restored');
        return $this->restoreModel($category, new Categories(), 'helpdesk.categories.index');
    }
}
