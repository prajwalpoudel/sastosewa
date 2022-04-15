<?php

namespace Database\Seeders;

use App\Constants\PageConstant;
use App\Services\Admin\Cms\PageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    private PageService $pageService;

    /**
     * PagesTableSeeder constructor.
     * @param PageService $pageService
     */
    public function __construct(
        PageService $pageService
    )
    {
        $this->pageService = $pageService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'title' => PageConstant::HOME
            ],
            [
                'title' => PageConstant::ABOUT
            ],
            [
                'title' => PageConstant::TICKETS
            ],
            [
                'title' => PageConstant::TOURS
            ],
            [
                'title' => PageConstant::DRIVING_SCHOOL
            ],
            [
                'title' => PageConstant::LABOUR
            ]
        ];

        $this->pageService->truncate();
        foreach($pages as $page) {
            $this->pageService->create($page);
        }
    }
}
