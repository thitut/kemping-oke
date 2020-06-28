<li class="{{ Request::is('kategoris*') ? 'active' : '' }}">
    <a href="{!! route('kategoris.index') !!}"><i class="fa fa-list"></i><span>Kategori</span></a>
</li>

<li class="{{ Request::is('barangs*') ? 'active' : '' }}">
    <a href="{!! route('barangs.index') !!}"><i class="fa fa-database"></i><span>Barang</span></a>
</li>

<li class="{{ Request::is('pelanggans*') ? 'active' : '' }}">
    <a href="{!! route('pelanggans.index') !!}"><i class="fa fa-address-card-o"></i><span>Pelanggan</span></a>
</li>

<li class="{{ Request::is('penyewaans*') ? 'active' : '' }}">
    <a href="{!! route('penyewaans.index') !!}"><i class="fa fa-shopping-cart"></i><span>Penyewaan</span></a>
</li>

<li class="{{ Request::is('pegawais*') ? 'active' : '' }}">
    <a href="{!! route('pegawais.index') !!}"><i class="fa fa-user-md"></i><span>Pegawai</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>User</span></a>
</li>

