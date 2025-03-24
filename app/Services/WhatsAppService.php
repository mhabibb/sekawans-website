<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('WHATSAPP_BOT_API_URL', 'http://localhost:3000');
    }

    public function sendScreeningMessage($phoneNumber, $name)
    {
        try {
            $response = Http::post("{$this->apiUrl}/api/send-message", [
                'phoneNumber' => $this->formatPhoneNumber($phoneNumber),
                'message' => $this->getScreeningMessage($name),
            ]);

            if (!$response->successful()) {
                Log::error('WhatsApp API error: ' . $response->body());
                return false;
            }

            return true;
        } catch (\Exception $e) {
            Log::error('WhatsApp service error: ' . $e->getMessage());
            return false;
        }
    }

    protected function formatPhoneNumber($phoneNumber)
    {
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        } elseif (substr($phoneNumber, 0, 2) !== '62') {
            $phoneNumber = '62' . $phoneNumber;
        }

        return $phoneNumber;
    }

    protected function getScreeningMessage($name)
    {
        return "*[ Ayo Screening Tuberkulosis Gratis ]*\n\n" .
            "Halo *{$name}* 👋,\n\n" .
            "Ini adalah pesan otomatis dari *Sekawan's TB Jember* yakni organisasi non profit yang bergerak dalam penanggulangan tuberkulosis di Kabupaten Jember.\n\n" .
            "🔍 *Tahukah Anda?*\n" .
            "- Di tingkat nasional, Jawa Timur mendapatkan peringkat ke 2 dengan jumlah kasus tuberkulosis terbanyak\n" .
            "- Di tingkat Jawa Timur, Jember mendapatkan peringkat 2 dengan jumlah kasus tuberkulosis terbanyak\n\n" .
            "🦠 *Tuberkulosis* adalah penyakit kronik menular akibat bakteri Mycobacterium tuberculosis yang dapat menyerang organ paru dan organ tubuh lain seperti kalenjar limfa, tulang, dan lainnya.\n\n" .
            "🏥 Ayo ambil bagian dalam program eliminasi tuberkulosis sebelum tahun 2030 dengan melakukan cek status kesehatan terkait tuberkulosis secara *GRATIS*!\n\n" .
            "➡️ Klik link berikut untuk screening:\n" .
            "https://sekawanstb.com/screening";
    }
}

