@extends('layouts.admin')
@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf <!-- CSRF token -->
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Salir
                            </button>
                        </form>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Gestion de Tasas</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form id="tasasForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="listTasas"></div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div id="oldTasa"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="newTasa"></div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                                <div id="btn_send_tasaForm"></div>
                                            </div>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->
    </div>


@endsection
@section('script')
    <script src="{{ asset('js/transAdmin/tasas.js') }}"></script>
@endsection
