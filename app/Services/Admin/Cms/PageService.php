<?php


namespace App\Services\Admin\Cms;


use App\Models\Cms\Page;
use App\Services\General\BaseService;

class PageService extends BaseService
{
    /**
     * PageService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function model()
    {
        return Page::class;
    }

}
