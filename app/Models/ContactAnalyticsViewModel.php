<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactAnalyticsViewModel
{
    public $contacts;

    public function __construct()
    {
      
         $this->contacts = DB::table('contact_views')  
            ->select('contact_id', DB::raw('SUM(views) as total_views'))
            ->groupBy('contact_id')
            ->get();
    }
}
