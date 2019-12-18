@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="box-body col-12 col-md-12 col-lg-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    
    @if (session('success'))
        <div class="box-body">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Success!</h4>
                    {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="box-body">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    {{ session('error') }}
            </div>
        </div>
    @endif
    
    {{-- start breadcrumb --}}
    <div class="card page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title">
                <h2><span class="font-weight-semibold mx-2">FOODCOURT</span> - Pelanggan</h2>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ URL::to('/pelanggan')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Pelanggan</a>
                    <span class="breadcrumb-item active">Dashboard</span>
                </div>
            </div>
        </div>
    </div>
    {{-- end breadcrumb --}}
	
	<div class="card">
        <div class="card-header">
        	<a class="btn btn-primary" href="{{URL::to('/pelanggan/create')}}"><i class="far fa-plus-square mr-2"></i>Tambah pelanggan baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th class="text-center" width="10%">
                                ID
                            </th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('librariesJS')
	<script type="text/javascript" src="{{ asset('theme/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('theme/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('theme/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
@endsection
@section('script')
	<script>
		$(document).ready(function() {
            console.log("cek ready");
            $("#table").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {'url':"{{ url('pelangganAjax') }}",
                        'headers':"{{ csrf_token() }}"},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'pelanggan_id', name: 'pelanggan_id'},
                    {data: 'nama',name:'nama'},
                    {data: 'alamat',name:'alamat'},
                    {data: 'no_telp', name: 'no_telp'},
                    {data: 'action', name: 'action', "orderable": false, "searchable": false}
                ],
                "fixedColumns": true,
            });
        });
	</script>
@endsection