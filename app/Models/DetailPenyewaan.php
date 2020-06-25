<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailPenyewaan
 * @package App\Models
 * @version May 23, 2018, 2:08 am UTC
 *
 * @property integer barang_id
 * @property integer penyewaan_id
 * @property integer qty
 * @property integer subtotal
 */
class DetailPenyewaan extends Model
{
    use SoftDeletes;

    public $table = 'detail_penyewaans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'barang_id',
        'penyewaan_id',
        'qty',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'barang_id' => 'integer',
        'penyewaan_id' => 'integer',
        'qty' => 'integer',
        'subtotal' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function penyewaan()
    {
        return $this->belongsTo('\App\Models\Penyewaan');
    }

    public function barang($id)
    {
        return \App\Models\Barang::where('id',$id)->first();
    }


}
