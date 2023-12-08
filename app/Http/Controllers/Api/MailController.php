<?php

namespace App\Http\Controllers\Api;

use App\Mail\mailMailable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends BaseController
{

    public function sendMail()
    {
        Mail::to(auth()->user()->email)->send(new mailMailable());
        return $this->sendResponse('Email send successfully');
    }
}
