@extends('layouts.admin')

@section('css')
@endsection

@section('content')

<div class="page-content">

    <div class="content">
        <!-- breadcrumb -->
        <div class="breadcrumb  py-2">
            View Asset
        </div>            
        <a href="{{ route('assetmanager')}}" class="mt-5 d-inline-block ms-5" title="Return Home">
            <span data-icon="akar-icons:arrow-back" class="fs-2 iconify txt-secondary" ></span> 
        </a>            
        <div class="container shadow-sm bg-white my-5 p-4">
            <div class="row">
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Asset Name</h4>
                        <b>{{ $data->name }}</b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box flex-row align-items-center justify-content-between">
                        <h4>Asset Photo</h4>
                        <img width="90px" src="{{ asset('admin/images/brand.png')}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Asset ID</h4>
                        <b>{{ $data->asset_id }}</b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Company ID Number</h4>
                        <b>{{ $data->company_id }}</b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Category</h4>
                        <b>{{ $data->category }}</b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Description</h4>
                        <b>{{ $data->description }}</b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Manufacturer</h4>
                        <b>{{ $data->manufacturer }}</b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Model</h4>
                        <b>{{ $data->model }}</b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Serial Number:</h4>
                        <b>{{ $data->serial_no }}</b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Warranty:</h4>
                        <b>
                            @if ($data->warranty == 1)
                                Yes
                            @else 
                                No
                            @endif
                        </b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Notes:</h4>
                        <b>{{ $data->notes }} </b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Asset Manager:</h4>
                        <b> {{ $data->asset_manager }} </b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Department</h4>
                        <b> {{ $data->department }} </b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Location</h4>
                        <b> {{ $data->location }} </b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Eligible for check-out</h4>
                        <b>
                            @if ($data->checkout == 1)
                                Yes
                            @else 
                                No
                            @endif
                        </b>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="asset-box">
                        <h4>Status:</h4>
                        <b>
                            @if ($data->status == 1)
                                Available
                            @else 
                                Not Available 
                            @endif
                            
                        </b>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')



@endsection
