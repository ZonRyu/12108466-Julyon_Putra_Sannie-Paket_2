@extends('components.body')

@section('css')
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buat Produk</h4>
                        </div>
                        {{--@dd($data)--}}
                        <form action="{{ Route('func-produk-edit', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body row">
                                <div class="mb-3 col-lg-6">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input class="form-control" type="text" id="nama_produk" name="nama_produk" value="{{ $data->nama_produk }}"/>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="stok_produk" class="form-label">Stok Produk</label>
                                    <input class="form-control" type="number" id="stok_produk" name="stok_produk" value="{{ $data->stok_produk }}"/>
                                </div>

                                <div class="mb-3 col-lg-6">
                                    <label for="harga_produk" class="form-label">Harga Produk</label>
                                    <input class="form-control" type="number" id="harga_produk" name="harga_produk" value="{{ $data->harga_produk }}" />
                                </div>

                                <div class="mb-3 col-lg-6">
                                    <label for="foto_produk" class="form-label">Foto Produk</label>
                                    <input class="form-control" type="file" id="foto_produk" name="foto_produk" value="{{ $data->foto_produk }}" />
                                </div>

                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
