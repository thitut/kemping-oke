<table class="table table-responsive" id="penyewaans-table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Tanggal</th>
        <th>Pelanggan Id</th>
        <th>Pegawai Id</th>
        <th>Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($penyewaans as $penyewaan)
        <tr>
            <td>{!! $penyewaan->tanggal_pinjam !!}</td>
            <td>{!! $penyewaan->tanggal_kembali !!}</td>
            <td>{!! $penyewaan->pelanggan->nama !!}</td>
            <td>{!! $penyewaan->pegawai->nama !!}</td>
            <td>{!! $penyewaan->total !!}</td>
            <td>
                {!! Form::open(['route' => ['penyewaans.destroy', $penyewaan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('penyewaans.show', [$penyewaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('penyewaans.edit', [$penyewaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>