<?php


namespace App\Services\Admin;


use App\Models\Setting;
use App\Services\General\BaseService;

class SettingService extends BaseService
{
    public function model() {
        return Setting::class;
    }

}
