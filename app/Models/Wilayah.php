<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'wilayahs';

    // Primary key yang digunakan oleh model ini
    protected $primaryKey = 'id_wilayah';

    // Jika primary key bukan auto-increment, tambahkan ini
    // public $incrementing = false;

    // Jika primary key bukan integer, tambahkan ini
    // protected $keyType = 'string';

    // Kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'nama_wilayah',
        'latitude',
        'longitude',
        'populasi',
        'luas_area',
    ];

    // Jika Anda ingin menambahkan relasi, Anda bisa menambahkannya di sini
    // Contoh relasi dengan model Laporan
    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'id_wilayah', 'id_wilayah');
    }
}