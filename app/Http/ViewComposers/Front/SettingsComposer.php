<?php


namespace App\Http\ViewComposers\Front;


use App\Services\Admin\SettingService;
use Illuminate\View\View;

class SettingsComposer
{
    private SettingService $settingService;

    /**
     * SettingsComposer constructor.
     * @param SettingService $settingService
     */
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function compose(View $view) {
        $setting = $this->settingService->query()->first();

        $view->with(compact('setting'));
    }
}
