@extends('admin/layout')
@section('page_title', 'Order Details')
@section('order_select', 'active')
@section('container')
    <h1 class="mb10">Order - {{ $orders_details[0]->id }}</h1>

    <div class="row m-t-30 p-t-30 " style="background: white">
        <div class="col p-b-30 ">
            <label for="color_id" class="control-label mb-1"><b>Payment status</b></label>
            <select id="payment_status" name="payment_status" class="form-control" onchange="payment_status_change('{{$orders_details[0]->id}}')">
              @foreach ($payment_status as $list)
              @if ($orders_details[0]->payment_status == $list)
                  <option selected value="{{ $list }}">{{ $list}}</option>
              @else
                  <option value="{{ $list }}">{{ $list }}</option>
              @endif
          @endforeach
            </select>
        </div>
        <div class="col ">
            <label for="color_id" class="control-label mb-1"><b>Order status</b></label>

            <select id="order_status" name="order_status" class="form-control" onchange="order_status_change('{{$orders_details[0]->id}}')">
                @foreach ($order_status as $list)
                    @if ($orders_details[0]->order_status == $list->order_status)
                        <option selected value="{{ $list->id}}">{{ $list->order_status }}</option>
                    @else
                        <option value="{{ $list->id}}">{{ $list->order_status }}</option>
                    @endif
                @endforeach
            </select>
        </div>


    </div>
    
    <div class="row m-t-30 p-t-30 " style="background: white">
        <div class="col-md-6">
            <div class="order_detail">
                <h3>Details Address</h3>
                {{ $orders_details[0]->name }}({{ $orders_details[0]->mobile }})
                <br />{{ $orders_details[0]->address }}<br />{{ $orders_details[0]->city }}</br>{{ $orders_details[0]->state }}</br />{{ $orders_details[0]->pincode }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="order_detail">
                <h3>Order Details</h3>
                Order Status: {{ $orders_details[0]->order_status }}<br />
                Payment Status: {{ $orders_details[0]->payment_status }}<br />
                Payment Type: {{ $orders_details[0]->payment_type }}<br />
                <?php
                if ($orders_details[0]->payment_id != '') {
                    echo 'Payment ID: ' . $orders_details[0]->payment_id;
                }
                ?>

            </div>
        </div>


        <div class="col-md-12">
            <div class="cart-view-area">
                <div class="cart-view-table">
                    <form action="">

                        <div class="table-responsive">
                            <table class="table order_detail">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalAmt = 0;
                                    @endphp

                                    @foreach ($orders_details as $list)
                                        @php
                                            $totalAmt = $totalAmt + $list->price * $list->qty;
                                        @endphp
                                        <tr>
                                            <td>{{ $list->pname }}</td>
                                            <td><img src='{{ asset('storage/media/' . $list->attr_image) }}'
                                                    style="width: 150px; height: 150px" /></td>
                                            <td>{{ $list->size }}</td>
                                            <td>{{ $list->color }}</td>
                                            <td>{{ $list->price }}</td>
                                            <td>{{ $list->qty }}</td>
                                            <td>{{ $list->price * $list->qty }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5">&nbsp;</td>
                                        <td><b>Total</b></td>
                                        <td><b>{{ $totalAmt }}</b></td>
                                    </tr>
                                    <?php
                                    if ($orders_details[0]->coupon_value > 0) {
                                        echo '<tr>
                                                                                                                                                                          <td colspan="5">&nbsp;</td>
                                                                                                                                                                          <td><b>Coupon <span class="coupon_apply_txt">(' .
                                            $orders_details[0]->coupon_code .
                                            ')</span></b></td>
                                                                                                                                                                          <td>' .
                                            $orders_details[0]->coupon_value .
                                            '</td>
                                                                                                                                                                        </tr>';
                                        $totalAmt = $totalAmt - $orders_details[0]->coupon_value;
                                        echo '<tr>
                                                                                                                                                                          <td colspan="5">&nbsp;</td>
                                                                                                                                                                          <td><b>Final Total</b></td>
                                                                                                                                                                          <td>' .
                                            $totalAmt .
                                            '</td>
                                                                                                                                                                        </tr>';
                                    }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <!-- Cart Total view -->

                </div>
            </div>
        </div>

    </div>
  

@endsection
