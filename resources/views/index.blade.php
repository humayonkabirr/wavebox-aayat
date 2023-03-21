@extends('layouts.master')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components/custom-carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <style>
        .component-card_9 {
            border: 1px solid #1b2e4b;
            border-radius: 6px;
            width: auto;
            margin: 0 auto;
        }
        .list-group{
            border: 1px solid #d2d6ff;
        }
        .list-group-item{
            border: unset;
            color: #000000;
            font-size: 18px;
            line-height: 27px;
            padding: 0.4rem 1.25rem;
        }
        .navbar {
            background: #01001aed;
        }
        .btn-warning  {
    font-size: 25px;
}
    </style>
@endpush
@section('content')


    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-md-12 layout-spacing">
            <div class="container card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12" style="font-size: 40px; text-align: center;">

                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                            @endif

                            @if(Session::has('errors'))
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach

                            @endif

                            <h5 style="font-size: 40px; color:#00560c;text-align: center; font-weight: 700; line-height: 65px;">
                                শারীরিক দুর্বলতায় ও পেটের যে কোন সমস্যায় বাচ্চা থেকে বৃদ্ধ সব বয়সীদের জন্য চমৎকার কাজ করে <span style="color:red;">“{{ $product->name??'' }}”</span> </h5>
                            <p style="font-size: 29px; text-align: center; line-height: 43px;color:black;" class="mt-4"> {{ $product->sub_title ?? '' }} </p>
                            <a href="#payment" class="btn btn-warning "> অর্ডার করতে চাই </a>
                        </div>
                        <div class="col-md-12 mt-3">
                            <img src="{{ asset('storage/images/thumbnail/'.$product->productImage->image??'') }}"  class="card-img-top"  alt="">
                        </div>
                    </div>

                    <div class="row layout-top-spacing">
                        <div class="col-md-12 mt-3" style="font-size: 25px; text-align: center;">
                            <h5  style="font-size: 40px; color:#00560c;text-align: center; font-weight: 700; line-height: 65px;" class="mt-2"> <span style="color:red;">“{{ $product->name??'' }}”</span> হাদিয়া উপহার দিন আপনার প্রিয় জনকে </h5>
                            <h5 style="font-size: 29px; text-align: center; line-height: 43px;color:black;"> রাসূল (সা.) বলেন- ‘তোমরা পরস্পর হাদিয়া উপহার আদান-প্রদান কর, তাহলে মহব্বত বৃদ্ধি পাবে।’ (আল আদাবুল মুফরাদ, হাদিস : ৫৯৪) </h5>
                            <a href="#payment" class="btn btn-warning "> অর্ডার করতে চাই </a>
                        </div>

                        <div class="col-12 mt-4">
                            <h5 style="font-size: 30px; color:white;text-align: center; font-weight: 700; line-height: 65px; background: rgb(45, 38, 239);">অর্গানিক বক্সটিতে রয়েছে মধু মিশ্রিত ড্রাই ফ্রুটস, সিড শরবত ও লিচু ফুলের মধু</h5>

                        </div>
                        <div class="col-md-4 layout-top-spacing">
                            <img src="{{ asset('storage/images/thumbnail/'.$product->productImage->image1??'') }}"  class="card-img-top"  alt="">
                            <ul class="list-group ">
                                @php
                                   $details1 = explode("\n",$product->productImage->details1);
                                @endphp
                                @foreach ($details1 as $item)
                                    <li class="list-group-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                         {{ $item  }}
                                        </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-4 layout-top-spacing">
                            <img src="{{ asset('storage/images/thumbnail/'.$product->productImage->image2??'') }}"  class="card-img-top"  alt="">
                            <ul class="list-group ">
                                @php
                                   $details2 = explode("\n",$product->productImage->details2);
                                @endphp
                                @foreach ($details2 as $item)
                                    <li class="list-group-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                         {{ $item  }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-4 layout-top-spacing">
                            <img src="{{ asset('storage/images/thumbnail/'.$product->productImage->image3??'') }}"  class="card-img-top"  alt="">
                            <ul class="list-group ">
                                @php
                                   $details3 = explode("\n",$product->productImage->details3);
                                @endphp
                                @foreach ($details3 as $item)
                                    <li class="list-group-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                         {{ $item  }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12 mt-3" style="text-align: center;">
                            <a href="#payment" class="btn btn-warning "> অর্ডার করতে চাই </a>
                        </div>

                        <div class="col-md-12 mt-3" style="text-align: center;">
                            <h3 style="background:rgb(45, 38, 239); color:white; font-size: 23px; text-align: center; font-weight: 700; line-height: 27px;" class="p-2">
                                আমাদের উপর কেন আস্থা রাখবেন ??
                            </h3>

                            <ul class="list-group " style="text-align: left; border: unset;">
                                @php
                                   $details1 = explode("\n",$product->productImage->details1);
                                @endphp
                                @foreach ($details1 as $item)
                                    <li class="list-group-item" style="color:#000000; font-size: 24px; font-weight: 700; line-height: 36px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                         {{ $item  }}
                                    </li>
                                @endforeach
                            </ul>

                            <div style="background:rgb(45, 38, 239); color:white;" class="p-2">
                                <h4 style="color:white;">প্রয়োজনে কল করুন- 09639 81 25 25, 01979 91 25 25</h4>
                                <h3 style="color:white;">আপনাদের পছন্দের অর্গানিক বক্সটির</h3>
                                <h2 style="color:white;">মূল্য ৳ {{ $product->price }} টাকা</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row" id="payment">
        <div class="col-lg-12 col-md-12 layout-spacing">
            <div class="container card">
                <div class="card-body">
                    <h3 style="text-align: center;"><span style="color:red;">“{{ $product->name??'' }}”</span> নেয়ার জন্য, নিচের ফর্মটি সম্পূর্ণ পূরণ করুন</h3>
                    <hr>
                    <form id="productFormO" action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="product_id" value="{{ $product->id ??'' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3> <strong>বিলিং ডিটেলস</strong> </h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Name">আপনার নাম *</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ old('name') }}" placeholder="enter your name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="mobile">মোবাইল নাম্বার *</label>
                                            <input type="number" class="form-control" name="mobile" id="mobile"
                                                value="{{ old('mobile') }}" placeholder="enter your Mobile no 01xxxxxxxxx">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price">আপনার ঠিকানা *</label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                value="{{ old('address') }}" placeholder="enter your Address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="country">Country / Region*</label>
                                            <select class="form-control" name="country" id="country">
                                                <option value="1" selected>Bangladesh</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3><strong>আপনার অর্ডার</strong></h3>
                                    </div>

                                     <div class="col-md-12 form-group">
                                        <label> </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-4">
                                                {{-- <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th class="text-right">Subtotal</th>
                                                    </tr>
                                                </thead> --}}
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img style="width: 12%;" src="{{ asset('storage/images/thumbnail/'.$product->productImage->image??'') }}"  class="card-img-top"  alt="">
                                                            {{ $product->name }}
                                                            <span class="text-right">X 1</span>
                                                        </td>
                                                        <td class="text-right"> ৳{{ $product->sale_price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Subtotal
                                                        </td>
                                                        <td class="text-right">
                                                            ৳{{ $product->sale_price }}
                                                            <input type="hidden" name="sale_price" value="{{ $product->sale_price }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right" colspan="2" style="font-size: 16px; font-weight: 700;">
                                                            <span style="float: left;">শিপিং:</span>
                                                            <input type="radio" class="form-controll" name="shipping_cost" checked id="inSideDhaka" onclick="shippingCharge(50)" value="50" required> <label for="inSideDhaka"> ঢাকা সিটির মধ্যে: ৳ 50</label> <br>
                                                            <input type="radio" class="form-controll" name="shipping_cost" id="outSideDhaka" onclick="shippingCharge(100)" value="100" required> <label for="outSideDhaka"> ঢাকা সিটির বাইরে: ৳ 100</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <strong>মোট:</strong> <strong style="float: right;">৳ <span class="total">{{ $product->sale_price }}</span></strong>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                            <ul class="wc_payment_methods payment_methods methods">
                                                <li class="wc_payment_method payment_method_cod">
                                        <input id="payment_method_cod" type="radio" class="form-controll" name="payment_method" value="cod" checked="checked" data-order_button_text="">

                                        <label for="payment_method_cod">
                                            Cash on delivery
                                        </label>
                                                <div class="payment_box payment_method_cod">
                                                <p>Pay with cash upon delivery.</p>
                                            </div>
                                        </li>
                                            </ul>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning " style="float: right;">অর্ডার করুন - ৳<span class="total">{{ $product->sale_price }}</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('js')
<script>
    function shippingCharge(tk) {
        $('.total').html(tk + {{ $product->sale_price }});
    }
</script>
@endpush
