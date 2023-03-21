
@extends('backend.layouts.master')
@push('css')
@endpush
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-three">

                <div class="widget-heading">
                    <h5 class="">Top Selling Product</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table table-scroll">
                            <thead>
                                <tr>
                                    <th><div class="th-content">Customer Name</div></th>
                                    <th><div class="th-content">Product</div></th>
                                    <th><div class="th-content th-heading">Address</div></th>
                                    <th><div class="th-content th-heading">Discount</div></th>
                                    <th><div class="th-content">Quantity</div></th>
                                    <th><div class="th-content">Status</div></th>
                                    <th><div class="th-content">Action</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <div class="td-content product-name">
                                        <img src="{{ asset('images/user.png') }}" alt="product">
                                        <div class="align-self-center">
                                            <p class="prd-name">{{ $order->name }}</p>
                                            <p class="prd-category text-primary">
                                                {{ $order->mobile }}
                                            </p></div></div>
                                        </td>
                                    <td>
                                        <div class="td-content product-name">
                                        <img src="{{  asset('storage/images/thumbnail/'.$order->productImage->image ?? '')  }}" alt="product">
                                        <div class="align-self-center">
                                            <p class="prd-name">{{ $order->product->name }}</p>
                                            <p class="prd-category text-primary">
                                                মূল্য ৳{{ $order->sale_price }}
                                            </p></div></div>
                                        </td>
                                    <td><div class="td-content"> {{ $order->address }}</div></td>
                                    <td><div class="td-content"><span class="discount-pricing">{{ $order->product->discount }}</span></div></td>
                                    <td><div class="td-content">{{ $order->quantity }}</div></td>
                                    <td><div class="td-content">{{ $order->status == 1 ? 'Pandding' : ($order->status == 0 ? 'Delivery':'Rejected')  }}</div></td>
                                    <td>
                                        <div class="td-content">
                                        <a href="#" onclick="OderActionEvent(0, {{ $order->id }})" class="text-success">
                                            Accept
                                            </a>
                                        <a href="#" onclick="OderActionEvent(2, {{ $order->id }})" class="text-danger">
                                            Reject
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="SubmitForm" action="{{ route('order.actions') }}" method="POST">
        @csrf
        <input type="hidden" name="actiontype" id="actiontypfe" value="">
        <input type="hidden" name="id" id="oId" value="">
    </form>
@endsection

@push('js')
<script>

function OderActionEvent(params, id) {

    let text = "Are You sure.";
  if (confirm(text) == true) {
    $('#actiontypfe').attr('value', params);
    $('#oId').attr('value', id);
    $('#SubmitForm'+id).submit();
    text = "You pressed OK!";
  } else {
    text = "You canceled!";
  }


}

</script>
@endpush
