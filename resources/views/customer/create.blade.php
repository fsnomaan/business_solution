@extends('app')
@section('title','| Add Customer')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Add Customer</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Add Customer</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->






        @if(session('message'))
            <div class="alert alert-success" role="alert">
                <h3 style="color: white;">
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

            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-hand-pointer-o"></i> Add Customer</h3>
                        Add new customer from here.
                    </div>

                    <div class="card-body">

                        <form action="{{route('customer.store')}}" method="post" data-parsley-validate novalidate>



                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" value="{{old('company_name')}}" data-parsley-trigger="change" required placeholder="Enter company name" class="form-control" id="company_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="company_name_bn">Company Name (বাংলা)</label>
                                    <input type="text" name="company_name_bn" value="{{old('company_name_bn')}}" data-parsley-trigger="change"  placeholder="Enter company name bn" class="form-control" id="company_name_bn">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="owner_name">Owner Name</label>
                                    <input type="text" name="owner_name" value="{{old('owner_name')}}"  data-parsley-trigger="change" required placeholder="Enter owner name" class="form-control" id="owner_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="owner_name_bn">Owner Name (বাংলা)</label>
                                    <input type="text" name="owner_name_bn" value="{{old('owner_name_bn')}}"  data-parsley-trigger="change"  placeholder="Enter owner name bn" class="form-control" id="owner_name_bn">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input id="mobile" name="mobile" type="number" value="{{old('mobile')}}" placeholder="Mobile"  class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone</label>
                                    <input data-parsley-equalto="#phone" type="number" name="phone" value="{{old('phone')}}"  placeholder="Phone" class="form-control" id="phone">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rating">Rating</label>
                                    <select class="form-control" id="rating" name="rating">
                                        <option value="1">One Star</option>
                                        <option value="2">Two Star</option>
                                        <option value="3">Three Star</option>
                                        <option value="4">Four Star</option>
                                        <option value="5">Five Star</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="remark">Remark</label>
                                    <input data-parsley-equalto="#remark" type="text" name="remark" value="{{old('remark')}}" placeholder="Remark" class="form-control" id="remark">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="comment">Comment</label>
                                    <input data-parsley-equalto="#comment" type="text" name="comment" value="{{old('comment')}}" placeholder="Comment" class="form-control" id="comment">
                                </div>
                            </div>


                            {{csrf_field()}}

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary" type="submit">
                                    Add Customer
                                </button>
                                <button type="reset" class="btn btn-secondary m-l-5">
                                    Cancel
                                </button>
                            </div>

                        </form>

                    </div>
                </div><!-- end card-->
            </div>




        </div>

    </div>



@endsection
