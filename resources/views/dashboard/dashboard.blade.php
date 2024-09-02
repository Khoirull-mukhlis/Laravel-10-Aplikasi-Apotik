{{-- dahsboard --}}

@extends('kerangka.master')
@section('title','Dashboard')
@section('content')
@include('include.navbar')    
<div id="content"> 

    <!-- Topbar -->
    
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
        <!-- Page Heading -->

        <!-- Content Row -->
        <div class="row">
            
            <!-- Obat Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <?php $countobat = DB::table('obat')->count(); ?>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Obat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countobat }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-pills fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Dokter Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <?php $countdokter = DB::table('dokter')->count(); ?>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dokter</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countdokter }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user-doctor fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seller Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <?php $countseller = DB::table('seller')->count(); ?>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Apoteker</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countseller }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-image-portrait fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <?php $countseller = DB::table('users')->count(); ?>
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Data User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countseller }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

       
    <!-- /.container-fluid -->

</div>

@endsection