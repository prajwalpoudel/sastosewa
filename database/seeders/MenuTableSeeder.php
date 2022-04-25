<?php

namespace Database\Seeders;

use App\Constants\MenuGroupConstant;
use App\Services\General\MenuGroupService;
use App\Services\General\MenuService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    private MenuService $menuService;
    private MenuGroupService $menuGroupService;

    /**
     * MenuTableSeeder constructor.
     * @param MenuService $menuService
     * @param MenuGroupService $menuGroupService
     */
    public function __construct(
        MenuService $menuService,
        MenuGroupService $menuGroupService
    )
    {
        $this->menuService = $menuService;
        $this->menuGroupService = $menuGroupService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            // Admin dashboard menus
            [
                "title" => "Dashboard",
                "class" => "nav-item",
                "order" => 1,
                "icon" => "fa fa-envelope",
                "status" => true,
                "route" => "admin.dashboard",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [

                ],
                "related_routes" => 'admin.dashboard',
            ],
            [
                "title" => "Cms Pages",
                "class" => "nav-item",
                "order" => 2,
                "icon" => "fa fa-envelope",
                "status" => true,
                "route" => "admin.page.index",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [
//                    [
//
//                        "title" => "Pages",
//                        "class" => "nav-item",
//                        "order" => 1,
//                        "icon" => "fa fa-envelope",
//                        "status" => true,
//                        "route" => "admin.page.index",
//                        "group_id" => MenuGroupConstant::ADMIN_ID,
//                        "related_routes" => [
//                            'admin.page.index'
//                        ],
//                    ],
                    [

                        "title" => "Sections",
                        "class" => "nav-item",
                        "order" => 2,
                        "icon" => "fa fa-envelope",
                        "status" => true,
                        "route" => "admin.page.section.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.page.section.index',
                            'admin.page.section.create',
                            'admin.page.section.edit',
                        ],
                    ],
                ],
                "related_routes" => [
                    'admin.ticket.category.index',
                    'admin.ticket.category.create',
                    'admin.ticket.category.edit',
                    'admin.ticket.index',
                    'admin.ticket.create',
                    'admin.ticket.edit',
                ],
            ],
            [
                "title" => "Tickets",
                "class" => "nav-item",
                "order" => 2,
                "icon" => "fa fa-envelope",
                "status" => true,
                "route" => "admin.ticket.index",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [
                    [

                        "title" => "Category",
                        "class" => "nav-item",
                        "order" => 1,
                        "icon" => "fa fa-envelope",
                        "status" => true,
                        "route" => "admin.ticket.category.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.ticket.category.index',
                            'admin.ticket.category.create',
                            'admin.ticket.category.edit',
                        ],
                    ],
                    [

                        "title" => "Brand",
                        "class" => "nav-item",
                        "order" => 2,
                        "icon" => "fa fa-envelope",
                        "status" => true,
                        "route" => "admin.ticket.brand.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.ticket.brand.index',
                            'admin.ticket.brand.create',
                            'admin.ticket.brand.edit',
                        ],
                    ],
                    [

                        "title" => "Ticket",
                        "class" => "nav-item",
                        "order" => 3,
                        "icon" => "fa fa-envelope",
                        "status" => true,
                        "route" => "admin.ticket.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.ticket.index',
                            'admin.ticket.create',
                            'admin.ticket.edit',
                        ],
                    ],
                ],
                "related_routes" => [
                    'admin.ticket.category.index',
                    'admin.ticket.category.create',
                    'admin.ticket.category.edit',
                    'admin.ticket.brand.index',
                    'admin.ticket.brand.create',
                    'admin.ticket.brand.edit',
                    'admin.ticket.index',
                    'admin.ticket.create',
                    'admin.ticket.edit',
                ],
            ],
            [
                "title" => "Tours",
                "class" => "nav-item",
                "order" => 3,
                "icon" => "fa fa-envelope",
                "status" => true,
                "route" => "admin.tour.index",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [
                    [

                        "title" => "Category",
                        "class" => "nav-item",
                        "order" => 1,
                        "icon" => "fa fa-envelope",
                        "status" => true,
                        "route" => "admin.tour.category.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.tour.category.index',
                            'admin.tour.category.create',
                            'admin.tour.category.edit',
                        ],
                    ],
                    [

                        "title" => "Tour",
                        "class" => "nav-item",
                        "order" => 2,
                        "icon" => "fa fa-envelope",
                        "status" => true,
                        "route" => "admin.tour.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.tour.index',
                            'admin.tour.create',
                            'admin.tour.edit',
                        ],
                    ],
                ],
                "related_routes" => [
                    'admin.tour.category.index',
                    'admin.tour.category.create',
                    'admin.tour.category.edit',
                    'admin.tour.index',
                    'admin.tour.create',
                    'admin.tour.edit',
                ],
            ],
            [
                "title" => "Messages",
                "class" => "nav-item",
                "order" => 4,
                "icon" => "fa fa-cogs",
                "status" => true,
                "route" => "admin.message.index",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [

                ],
                "related_routes" => [
                    'admin.message.index',
                    'admin.message.show',
                ],
            ],
            [
                "title" => "Settings",
                "class" => "nav-item",
                "order" => 5,
                "icon" => "fa fa-cogs",
                "status" => true,
                "route" => "admin.setting.index",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [

                ],
                "related_routes" => [
                    'admin.setting.index',
                    'admin.setting.edit',
                ],
            ],
        ];

        $groups = [
            [
                'title' => MenuGroupConstant::ADMIN,
                'order' => 1,
            ],
            [
                'title' => MenuGroupConstant::FRONT,
                'order' => 2,
            ],
        ];

        foreach ($groups as $group) {
            $this->menuGroupService->updateOrCreate(['title' => $group['title']], $group);
        }
        $this->menuService->truncate();

        foreach ($menus as $menu) {
            $childrenMenus = $menu['children'];
            unset($menu['children']);
            if (!empty($menu['related_routes']) && is_array($menu['related_routes'])) {
                $menu['related_routes'] = implode(',', array_map('trim', $menu['related_routes']));
            }
            $parentMenu = $this->menuService->create($menu);
            foreach ($childrenMenus as $childrenMenu) {
                if (!empty($childrenMenu['related_routes']) && is_array($childrenMenu['related_routes'])) {
                    $childrenMenu['related_routes'] = implode(',', array_map('trim', $childrenMenu['related_routes']));
                }
                $childrenMenu['parent_id'] = $parentMenu->id;
                $this->menuService->updateOrCreate($childrenMenu, $childrenMenu);
            }
        }
    }
}
