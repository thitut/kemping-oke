@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nota 
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('penyewaans.show_fields')
                    <a href="{!! route('penyewaans.index') !!}" class="btn btn-default">Back</a>
                    <a href="#" class="btn btn-primary" id=""> <i class="fa fa-print"></i> Print</a>
                    <a href="#" class="btn btn-primary"> <i class="fa fa-edit"></i> New</a>
                </div>
            </div>
        </div>
    </div>
@endsection
