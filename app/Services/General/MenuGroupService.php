<?php


namespace App\Services\General;



use App\Models\MenuGroup;

class MenuGroupService extends BaseService
{
    /**
     * MenuGroupService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return MenuGroup::class;
    }
}
