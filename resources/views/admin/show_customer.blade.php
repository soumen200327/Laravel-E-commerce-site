@extends('admin/layout')
@section('page_title', 'Show Customer Details')
@section('customer_select', 'active')
@section('container')

    <h1 class="mb10">Customer Details</h1>
    <a href="{{ url('admin/customer') }}"> <button type="button" class="btn btn-danger m-t-20">Back</button>
    </a>
    <div class="card m-t-20">
    <div class="card-body">
        <div class="card-title mb-4">
            <div class="d-flex justify-content-start">
                <div class="image-container">
                    @if ($customer_list->name=='Soumen Sarkar' )
                    <img src="{{ asset('admin_assets/images/icon/soumen.jpeg') }}" style="width: 150px; height: 150px"
                    @endif
                      <img src="{{ asset('admin_assets/images/icon/simran.jpeg') }}" style="width: 150px; height: 150px"
                        class="img-thumbnail">
                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{ $customer_list->name }}</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Full Name</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->name }}
                    </div>
                </div>
                <hr>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Email</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->email }}
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Mobile No</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->mobile }}
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Password</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->password }}
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Full Address</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->address }}
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">City</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->city }}
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">State</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->state }}
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Pin</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->zip }}
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Company Name</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->company }}
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">GST NO</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->gstin }}
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Created Time</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->created_at }}
                    </div>
                </div>
                <hr>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">UpdatedTime</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $customer_list->updated_at }}
                    </div>
                </div>
                <hr>
            </div>

        </div>
    </div>
    </div>

@endsection
