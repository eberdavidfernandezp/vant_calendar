<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VantEcosystemController extends Controller
{
    public function home()
    {
        return view('vant.home');
    }

    public function about()
    {
        return view('vant.about');
    }

    public function portfolio()
    {
        return view('vant.portfolio');
    }

    public function chatQuote()
    {
        return view('vant.chat_quote');
    }

    public function dispatchLead(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'project_type' => 'required|string',
            'budget_range' => 'required|string',
            'message' => 'required|string',
            'dispatch_channel' => 'required|in:whatsapp,gmail',
        ]);

        $summaryText = "VANT | VENEZUELA — Nueva Solicitud:\n\n" .
                       "• Cliente: {$validated['client_name']}\n" .
                       "• Proyecto: {$validated['project_type']}\n" .
                       "• Inversión: {$validated['budget_range']}\n" .
                       "• Requerimiento: {$validated['message']}";

        // Opción 1: Enviar al correo (Gmail / Servidor SMTP)
        if ($validated['dispatch_channel'] === 'gmail') {
            Mail::raw($summaryText, function ($mail) {
                $mail->to('tucorreo@gmail.com') // Reemplaza con tu correo institucional
                    ->subject('VANT VZLA — Lead recibido desde Chat Web');
            });

            return response()->json([
                'status' => 'success',
                'method' => 'gmail',
                'message' => 'Cotización enviada exitosamente a nuestro servidor de correo.'
            ]);
        }

        // Opción 2: Redirección automática a la API de WhatsApp
        if ($validated['dispatch_channel'] === 'whatsapp') {
            $whatsappNumber = '584120000000'; // Reemplaza con tu número corporativo
            $encodedText = urlencode($summaryText);
            $whatsappUrl = "https://api.whatsapp.com/send?phone={$whatsappNumber}&text={$encodedText}";

            return response()->json([
                'status' => 'success',
                'method' => 'whatsapp',
                'redirect_url' => $whatsappUrl
            ]);
        }
    }
}
