<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmail;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function processQueue()
    {
        var_dump("Added to job");

        $emailJob = new SendWelcomeEmail();
        dispatch($emailJob);
    }

}
