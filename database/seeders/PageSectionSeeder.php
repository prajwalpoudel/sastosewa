<?php

namespace Database\Seeders;

use App\Constants\PageConstant;
use App\Services\Admin\Cms\PageService;
use App\Services\Admin\Cms\SectionService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSectionSeeder extends Seeder
{
    private PageService $pageService;
    private SectionService $sectionService;

    /**
     * PageSectionSeeder constructor.
     * @param PageService $pageService
     * @param SectionService $sectionService
     */
    public function __construct(
        PageService $pageService,
        SectionService $sectionService
    )
    {
        $this->pageService = $pageService;
        $this->sectionService = $sectionService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = $this->pageService->all()->pluck('id', 'title');
        $sections = [
            [
                'page_id'       => $pages[PageConstant::HOME],
                'page_title'    => 'Banner'
            ],
            [
                'page_id'       => $pages[PageConstant::HOME],
                'page_title'    => 'About'
            ],
            [
                'page_id'       => $pages[PageConstant::ABOUT],
                'page_title'    => 'Banner'
            ],
            [
                'page_id'       => $pages[PageConstant::ABOUT],
                'page_title'    => 'About'
            ]
        ];

        foreach($sections as $section) {
            $this->sectionService->updateOrCreate(['page_id' => $section['page_id'], 'page_title' => $section['page_title']], $section);
        }
    }
}
