<?php

namespace App\Http\Controllers;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Message;
use Carbon\Carbon;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'mensaje' => 'required|string'
        ]);

        Message::create([
            'nombre_formulario' => $request->input('nombre'),
            'mail_formulario' => $request->input('mail'),
            'mensaje_formulario' => $request->input('mensaje'),
            'created_at' => Carbon::now()
        ]);

        
        $data = [
        'nombre_formulario' => $request->input('nombre'),
        'mail_formulario' => $request->input('mail'),
        'mensaje_formulario' => $request->input('mensaje'),
        ];

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormMail($data));

        return response()->json(['success' => true, 'message' => 'Mensaje guardado correctamente.']);
    }
}
