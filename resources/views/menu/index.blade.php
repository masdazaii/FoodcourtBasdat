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
                <h2><span class="font-weight-semibold mx-2">FOODCOURT</span> - Pedagang - Menu</h2>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ URL::to('/pedagang')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Pedagang</a>
                    <span class="breadcrumb-item active">Menu</span>
                </div>
            </div>
        </div>
    </div>
    {{-- end breadcrumb --}}
	
	<div class="card">
        <div class="card-header">
        	<button id="modal" class="btn btn-primary"><i class="far fa-plus-square mr-2"></i>Tambah menu baru</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th class="text-center" width="10%">
                                ID
                            </th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal_form_vertical" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambahkan Menu</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" value="{{ $pedagang->pedagang_id }}" name="pedagangId">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Nama Menu</label>
                                    <input class="form-control" placeholder="silahkan masukan nama menu" name="namaMenu">
                                    </input>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Harga</label>
                                    <input type="number" placeholder="silahkan masukan harga" class="form-control" name="harga">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-primary">Submit form</button>
                    </div>
                </form>
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
            $("#modal").on('click',function(){
                console.log("hai");
                $('#modal_form_vertical').modal('show');    
            });

            $("#table").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {'url':"{{ url('/pedagang/'.$pedagang->pedagang_id.'/menuAjax') }}",
                        'headers':"{{ csrf_token() }}"},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'menu_id', name: 'menu_id'},
                    {data: 'nama_menu',name:'nama_menu'},
                    {data: 'harga',name:'harga'},
                    {data: 'action', name: 'action', "orderable": false, "searchable": false}
                ],
                "fixedColumns": true,
            });

            function editModal($id)
            {
                console.log($id);
            }
        });
	</script>
@endsection