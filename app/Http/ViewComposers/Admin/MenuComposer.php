<?php


namespace App\Http\ViewComposers\Admin;


use App\Constants\MenuGroupConstant;
use App\Services\General\MenuService;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * @var MenuService
     */
    private $menuService;

    /**
     * TeacherMenuComposer constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function compose(View $view) {
        $menus = $this->menuService->menus(MenuGroupConstant::ADMIN_ID);

        $view->with(compact('menus'));
    }

}
