<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Penyewaan
 * @package App\Models
 * @version May 16, 2018, 3:48 am UTC
 *
 * @property date tanggal
 * @property integer pelanggan_id
 * @property integer pegawai_id
 * @property integer total
 */
class Penyewaan extends Model
{
    use SoftDeletes;

    public $table = 'penyewaans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tanggal_pinjam',
        'tanggal_kembali',
        'pelanggan_id',
        'pegawai_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
        'pelanggan_id' => 'integer',
        'pegawai_id' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal_pinjam' => 'required',
        'tanggal_kembali' => 'required',
        'pelanggan_id' => 'required',
        'pegawai_id' => 'required',
        'total' => 'required'
    ];

    public function pelanggan()
    {
        return $this->belongsTo('\App\Models\Pelanggan');
    }

    public function pegawai()
    {
        return $this->belongsTo('\App\Models\Pegawai');
    }

    public function detail_penyewaan(){
        return $this->hasMany('\App\Models\DetailPenyewaan');
    }
    
}
