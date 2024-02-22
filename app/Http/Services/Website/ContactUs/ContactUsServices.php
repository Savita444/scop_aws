<?php
namespace App\Http\Services\Website\ContactUs;

use App\Http\Repository\Website\ContactUs\ContactUsRepository;

// use App\Marquee;
use Carbon\Carbon;


class ContactUsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ContactUsRepository();
    }
    public function addAll($request)
    {
        try {
            $add_contact = $this->repo->addAll($request);
           return $add_contact;
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    } 
}