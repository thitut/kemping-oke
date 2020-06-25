<div class="row">
    <div class="col-md-4 col-sm-4">
    <h4>{{ config('app.name') }}</h4>
    <address>
        <p>Jalan Jogonegaran</p>
        <p>Gedong Tengan</p>
        <p>65132</p>
    </address>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4><strong>Penyewaan</strong> </h4>
        <p>Tanggal Pinjam  :{{$penyewaan->tanggal_pinjam}}</p>
        <p>Tanggal Kembali :{{$penyewaan->tanggal_kembali}}</p>
        <p>ID : {{$penyewaan->id}} </p>
        <p>Pegawai : {{$penyewaan->pegawai->nama}} </p>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4><strong>Pelanggan</strong> </h4>
        <p>{{$penyewaan->pelanggan->nama}}</p>
        <p>Alamat : {{$penyewaan->pelanggan->alamat}}</p>
        <p>Telp : {{$penyewaan->pelanggan->telp}}</p>
        <p>Email :{{$penyewaan->pelanggan->email}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h3>Detail penyewaan</h3>
    <table class="table table-bordered">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-2">Kode</th>
            <th class="col-md-3">Nama</th>
            <th class="col-md-2">Qty</th>
            <th class="col-md-2">Sub Total</th>
        </tr>
        @foreach ($penyewaan->detail_penyewaan as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td>{{$item->barang($item->barang_id)->kode}}</td>
                <td>{{$item->barang($item->barang_id)->nama}}</td>
                <td class="text-right">{{$item->qty}}</td>
                <td class="text-right">{{$item->subtotal}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" class="text-right">Total</td>
            <td class="text-right">{{$penyewaan->total}}</td>
        </tr>
    </table>
</div>
</div>