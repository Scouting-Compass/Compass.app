<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk\Config;

use Compass\Http\Requests\Helpdesk\CategoryValidation;
use Compass\Models\Categories;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;

/**
 * Class CategoryController
 *
 * @package Compass\Http\Controllers\Backend\Web\Helpdesk\Config
 */
class CategoryController extends Controller
{
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
        $this->middleware(['auth', 'forbid-banned-user', 'role:admin']);
        $this->categories = $categories;
    }

    /**
     * Helpdesk categories index view.
     *
     * @return View
     */
    public function index(): View
    {
        $categories = $this->categories->simplePaginate('15');
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
     * Create an newhelpdesk category in the application.
     *
     * @param  CategoryValidation $input The form request class that handles the validation
     * @return RedirectResponse
     */
    public function store(CategoryValidation $input): RedirectResponse
    {
       if ($category = $this->categories->create($input->all())) {
           $category->creator()->associate($input->user())->save(); // Assign authenticated user to the category.
       }
    }
}
