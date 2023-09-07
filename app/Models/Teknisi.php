<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
   	public $table = "table_teknisi";
  
  	 protected $fillable = [
  	 'nik',
  	 'name',
  	 'wo',
     'kategory',
     'action',
  	 'spbu',
  	 'alamat_spbu',
  	 'tanggal_laporan',
  	 'image',
  	 'keterangan',
  	 ];
}
