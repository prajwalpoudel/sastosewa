<?php


namespace App\Services\General;


use App\Models\Menu;

class MenuService extends BaseService
{
    /**
     * MenuService constructor.
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
        return Menu::class;
    }

    /**
     * @param $groupId
     * @return mixed
     */
    public function menus($groupId)
    {
        return $this->model->with('children')->whereHas('group', function ($query) use ($groupId) {
            $query->where('id', $groupId);
        })->where('status', true)->where('parent_id', null)->get();
    }
}
