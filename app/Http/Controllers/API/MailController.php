<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Correo de Prueba',
            'body' => 'Hola Mundo'
        ];
        Mail::to("luismurrugarra17@gmail.com")->send(new TestMail($details));
        return "Correo ENVIADO";
    }
}
