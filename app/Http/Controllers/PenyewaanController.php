<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenyewaanRequest;
use App\Http\Requests\UpdatePenyewaanRequest;
use App\Repositories\PenyewaanRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Barang;
use App\Models\DetailPenyewaan;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
class PenyewaanController extends AppBaseController
{
    /** @var  PenyewaanRepository */
    private $penyewaanRepository;

    public function __construct(PenyewaanRepository $penyewaanRepo)
    {
        $this->penyewaanRepository = $penyewaanRepo;
    }

    /**
     * Display a listing of the Penyewaan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->penyewaanRepository->pushCriteria(new RequestCriteria($request));
        $penyewaans = $this->penyewaanRepository->all();

        return view('penyewaans.index')
            ->with('penyewaans', $penyewaans);
    }

    /**
     * Show the form for creating a new Penyewaan.
     *
     * @return Response
     */
    public function create()
    {
        $pelanggan = \App\Models\Pelanggan::pluck('nama','id');
        $pegawai = \App\Models\Pegawai::pluck('nama','id');
        $barang = \App\Models\Barang::all()->pluck('kode_nama','id');

        return view('penyewaans.create')
            ->with('barang',$barang)
            ->with('pelanggan',$pelanggan)
            ->with('pegawai',$pegawai);
    }

    /**
     * Store a newly created Penyewaan in storage.
     *
     * @param CreatePenyewaanRequest $request
     *
     * @return Response
     */
    public function store(CreatePenyewaanRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $penyewaan = $this->penyewaanRepository->create($input);
            foreach ($input['kode'] as $key => $row) {
                $detail_penyewaan = new \App\Models\DetailPenyewaan();
                $barang = \App\Models\Barang::where('kode', $input['kode'][$key])->first();

                $detail_penyewaan->barang_id = $barang->id;
                $detail_penyewaan->qty = $input['qty'][$key];
                $detail_penyewaan->subtotal = $input['subtotal'][$key];
                $detail_penyewaan->penyewaan_id = $penyewaan->id;
                $detail_penyewaan->save();

                $new_stok = (int)$barang->stock - (int)$input['qty'][$key];
                $barang->stock = $new_stok;
                $barang->save();
            }
            $result = $penyewaan->id;
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
       
        
        // dd( $result);
        Flash::success('Penyewaan saved successfully.');
        // // return redirect(route('penyewaans.index'));
            return redirect(route('penyewaans.show', $result));    
    }

    /**
     * Display the specified Penyewaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penyewaan = $this->penyewaanRepository->findWithoutFail($id);

        if (empty($penyewaan)) {
            Flash::error('Penyewaan not found');

            return redirect(route('penyewaans.index'));
        }

        return view('penyewaans.show')->with('penyewaan', $penyewaan);
    }





    /**
     * Show the form for editing the specified Penyewaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {   
        
        $penyewaan = $this->penyewaanRepository->findWithoutFail($id);
        $pelanggan = Pelanggan::pluck('nama','id');
        $pegawai = Pegawai::pluck('nama','id');
        $barang = Barang::pluck('nama','id');
        // $detail_penyewaan = DetailPenyewaan::pluck('kode','id');

        if (empty($penyewaan)) {
            Flash::error('Penyewaan not found');

            return redirect(route('penyewaans.index'));
        }

        return view('penyewaans.edit')->with('penyewaan', $penyewaan)->with('pelanggan',$pelanggan)->with('pegawai',$pegawai)->with('barang',$barang);
    }

    /**
     * Update the specified Penyewaan in storage.
     *
     * @param  int              $id
     * @param UpdatePenyewaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenyewaanRequest $request)
    {
        $penyewaan = $this->penyewaanRepository->findWithoutFail($id);

        if (empty($penyewaan)) {
            Flash::error('Penyewaan not found');

            return redirect(route('penyewaans.index'));
        }

        $penyewaan = $this->penyewaanRepository->update($request->all(), $id);

        Flash::success('Penyewaan updated successfully.');

        return redirect(route('penyewaans.index'));
    }

    /**
     * Remove the specified Penyewaan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penyewaan = $this->penyewaanRepository->findWithoutFail($id);

        if (empty($penyewaan)) {
            Flash::error('Penyewaan not found');

            return redirect(route('penyewaans.index'));
        }

        $this->penyewaanRepository->delete($id);

        Flash::success('Penyewaan deleted successfully.');

        return redirect(route('penyewaans.index'));
    }

}
