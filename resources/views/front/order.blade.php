@extends('front/layout')
@section('page_title','My Order')
@section('container')

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->         

  <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
          
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Order status</th>
                        <th>Total Amt</th>
                        <th>Payment status</th>
                      
                        <th>Placed At</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($order as $item)
                      <tr >
                        <td><a href="{{url('orders_details')}}/{{$item->id}}">{{$item->id}}</a></td>
                        <td><a href="{{url('orders_details')}}/{{$item->id}}">{{$item->order_status}}</a></td>
                        <td><a href="{{url('orders_details')}}/{{$item->id}}">{{$item->total_amount}}</a></td>
                        <td><a href="{{url('orders_details')}}/{{$item->id}}">{{$item->payment_status}}</a></td>
                        <td><a href="{{url('orders_details')}}/{{$item->id}}">{{$item->added_on}}</a></td>
                    
                      </tr>
                      @endforeach
                      
                    
                      </tbody>
                  </table>
                </div>
                
             </form>
             <!-- Cart Total view -->
           
		   </div>
         </div>
       </div>
     </div>
   </div>
 </section>    
@endsection