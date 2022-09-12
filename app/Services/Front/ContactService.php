<?php


namespace App\Services\Front;


use App\Models\Message;
use App\Services\General\BaseService;

class ContactService extends BaseService
{
    /**
     * ContactService constructor.
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
        return Message::class;
    }
}
