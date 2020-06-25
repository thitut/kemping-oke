<?php

namespace App\Repositories;

use App\Models\Penyewaan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PenyewaanRepository
 * @package App\Repositories
 * @version May 16, 2018, 3:48 am UTC
 *
 * @method Penyewaan findWithoutFail($id, $columns = ['*'])
 * @method Penyewaan find($id, $columns = ['*'])
 * @method Penyewaan first($columns = ['*'])
*/
class PenyewaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal_pinjam',
        'tanggal_kembali',
        'pelanggan_id',
        'pegawai_id',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Penyewaan::class;
    }
}
