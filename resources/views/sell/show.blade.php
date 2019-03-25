@extends('app')
@section('title','| Show Product')

@section('style')
    <style>
        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
    </style>
@endsection
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Show Product</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Show Product</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->



        @if(session('message'))
            <div class="alert alert-success" role="alert">
                <h3 style="color: black;">
                    {{session('message')}}
                </h3>
            </div>
        @endif


        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif




        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-table"></i> Invoice </h3>
                    </div>

                    <div class="card-body">

                        <div class="container">

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="invoice-title text-center mb-3">
                                        <img style="height: 100px;width: 100px;" src="{{asset('assets/images/logos/logo.png')}}">
                                        {{--<h2 style="margin-top: -15px;">Mostofa Steel</h2>--}}
                                        <h2>Mostofa Steel</h2>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{--<h5>Billed To:</h5>--}}
                                            <address>
                                                <h5>{{$sell->owner_name}}</h5>
                                                <h6>{{$sell->company_name}}</h6>
                                                {{--1234 Main<br>--}}
                                                {{--Apt. 4B<br>--}}
                                                <br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 float-right text-right">
                                            {{--<h5>Shipped To:</h5><br>--}}
                                            <address>
                                                <h5>Invoice #{{$sell->id}}</h5>
                                                <strong>Date:</strong> {{Carbon\Carbon::parse($sell->date)->toFormattedDateString()}}
                                            </address>
                                        </div>
                                    </div>
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<h5>Payment Method:</h5>--}}
                                            {{--<address>--}}
                                                {{--Visa ending **** 4242<br>--}}
                                                {{--jsmith@email.com--}}
                                            {{--</address>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6 float-right text-right">--}}
                                            {{--<h5>Order Date:</h5>--}}
                                            {{--<address>--}}
                                                {{--March 7, 2014<br><br>--}}
                                            {{--</address>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-condensed">
                                                    <thead>
                                                    <tr>
                                                        <td><strong>Item</strong></td>
                                                        <td class="text-center"><strong>Description</strong></td>
                                                        <td class="text-center"><strong>Pieces</strong></td>
                                                        <td class="text-center"><strong>Coils</strong></td>
                                                        <td class="text-center"><strong>Weight</strong></td>
                                                        <td class="text-center"><strong>Unit Price</strong></td>
                                                        <td class="text-right"><strong>Totals</strong></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                    <?php $sub=0?>
                                                    @foreach($items as $item)
                                                    <tr>
                                                        <td>{{$item->product_code}}</td>
                                                        <td class="text-center">{{$item->description}}</td>
                                                        <td class="text-center">{{$item->piece}}</td>
                                                        <td class="text-center">{{$item->coil}}</td>
                                                        <td class="text-center">{{$item->weight}}</td>
                                                        <td class="text-center">{{$item->unit_price}}</td>
                                                        <?php $sub+=($item->weight*$item->unit_price);?>
                                                        <td class="text-right">{{($item->weight*$item->unit_price)}}</td>
                                                    </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line text-center">
                                                            <strong>Subtotal</strong></td>
                                                        <td class="thick-line text-right">{{$sub}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line text-center"><strong>Cheque Paid</strong></td>
                                                        <td class="no-line text-center">{{$sell->cheque_paid}}</td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Cutting Cost</strong></td>
                                                        <td class="no-line text-right">{{$sell->cutting_cost}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line text-center"><strong>Cash Paid</strong></td>
                                                        <td class="no-line text-center">{{$sell->cash_paid}}</td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Labour Cost</strong></td>
                                                        <td class="no-line text-right">{{$sell->labour_cost}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line text-center"><strong>Current Due</strong></td>
                                                        <td class="no-line text-center">{{$sell->due}}</td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center"><strong>Discount</strong>
                                                        </td>
                                                        <td class="no-line text-right">{{$sell->discount}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center"><strong>Grand Total</strong>
                                                        </td>
                                                        <td class="no-line text-right">{{$sell->grand_total}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div><!-- end card body -->

                </div><!-- end card-->

            </div><!-- end col-->

        </div>

    </div>



@endsection

@section('script')

@endsection
