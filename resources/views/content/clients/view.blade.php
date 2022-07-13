@extends('layouts/contentLayoutMaster')

@section('title', 'Client View')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection
@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice-list.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
    <section class="app-user-view">
        <!-- Coffee Card & Plan Starts -->
        <div class="row">
            <!-- Coffee Card starts-->
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="card user-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                <div class="user-avatar-section">
                                    <div class="d-flex justify-content-start">
                                        <img class="img-fluid rounded" src="{{ asset('images/avatars/user.png') }}"
                                            height="104" width="104" alt="No image" />
                                        <div class="d-flex flex-column ml-1">
                                            <div class="peers mb-1">
                                                <h4 class="mb-0">{{ $client['fullName'] }}</h4>
                                                <span class="card-text">{{ $client['email'] }}</span>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a class="btn btn-primary mr-2 my-2"
                                                    href="{{ route('clients.index') }}">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                <div class="user-info-wrapper">
                                    <div class="d-flex flex-wrap">
                                        <div class="user-info-title">
                                            <i data-feather="user" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Name</span>
                                        </div>
                                        <p class="card-text mb-0">{{ $client['fullName'] }}</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="phone" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Contact
                                                Number</span>
                                        </div>
                                        <p class="card-text mb-0">{{ $client['contact_no'] }}</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="phone" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Emergency No
                                            </span>
                                        </div>
                                        <p class="card-text mb-0">{{ $client['emergency_contact'] }}</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="calendar" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">DOB</span>
                                        </div>
                                        <p class="card-text mb-0">{{ $client['dob'] }}</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="home" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Address</span>
                                        </div>
                                        <p class="card-text mb-0">{{ $client['address'] }}</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="check-square" class="mr-1"></i>
                                            <span
                                                class="card-text user-info-title font-weight-bold mb-0">Problem</span>
                                        </div>
                                        <p class="card-text mb-0">
                                            @if ($client['problem_type'] == 'Substance Use Disorder')
                                                {{ $client['sub_type'] }}
                                            @else
                                                {{ $client['problem_type'] }}
                                            @endif
                                        </p>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Coffee Card Ends-->


        </div>
        <!-- Coffee Card & Plan Ends -->




    </section>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    {{-- <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script> --}}
@endsection
