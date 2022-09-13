<?php


namespace App\Services\Admin;


use App\Models\Booking;
use App\Services\General\BaseService;

class BookingService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function model()
    {
        return Booking::class;
    }

}
