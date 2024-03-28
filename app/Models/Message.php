<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'instansi',
        'nomor',
        'keperluan',
        'file_path',
    ];

    public function saveFile($file)
    {
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('files', $fileName); 

        $this->file_path = $filePath;
        $this->save();
    }
}
