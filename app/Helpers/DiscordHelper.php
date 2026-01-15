<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

if (!function_exists('sendDiscordNotification')) {
    function sendDiscordNotification($title, $description, $fields = [], $color = '3066993')
    {
        $webhookUrl = env('DISCORD_WEBHOOK_URL');

        if (!$webhookUrl) {
            Log::error('❌ ERROR: No se ha definido DISCORD_WEBHOOK_URL en .env');
            return;
        }

        $fields = array_map(function ($field) {
            return [
                'name' => (string) $field['name'],
                'value' => (string) $field['value'],
                'inline' => isset($field['inline']) ? (bool) $field['inline'] : false,
            ];
        }, $fields);

        $payload = [
            'username' => 'Notificador Laravel',
            'embeds' => [
                [
                    'title' => $title,
                    'description' => $description,
                    'fields' => $fields,
                    'footer' => ['text' => 'Enviado desde ' . env('APP_NAME')],
                    'color' => (int) $color,
                    'timestamp' => now()->toIso8601String(),
                ],
            ],
        ];

        try {
            $response = Http::post($webhookUrl, $payload);
            Log::info('✅ Respuesta de Discord:', ['status' => $response->status(), 'body' => $response->body()]);
        } catch (\Exception $e) {
            Log::error('❌ Excepción al enviar a Discord:', ['message' => $e->getMessage()]);
        }
    }
}
