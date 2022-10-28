<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{ public function index()
    {
        $result['orders']=DB::table('orders')
        ->select('orders.*','order_status.order_status')
   -> leftJoin('order_status','orders.order_status','=','order_status.id')
        ->get();   
       // prx($result['orders']);
        return view('admin.order_detail',$result);
    }    

    public function orderTotal_detail(Request $request,$id)
    {

       
        $result['orders_details']=
                DB::table('orders_details')
                ->select('orders.*','orders_details.price','orders_details.qty','products.name as pname','products_attr.attr_image','sizes.size','colors.color','order_status.order_status')
                ->leftJoin('orders','orders.id','=','orders_details.orders_id')
                ->leftJoin('products_attr','products_attr.id','=','orders_details.products_attr_id')
                ->leftJoin('products','products.id','=','products_attr.products_id')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('order_status','order_status.id','=','orders.order_status')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['orders.id'=>$id])
                ->get();

       $result['order_status'] = DB::table('order_status')->get();
       $result['payment_status']=['Pending','Success','Fail'];
        
       
        return view('admin.orderTotal_detail',$result);
    } 

    public function payment_status_change($payment_status,$id){
       DB::table('orders')
       ->where(['id'=>$id])
       ->update(['payment_status'=>$payment_status]);
       
       return redirect('admin/orderTotal_detail/'.$id);

    }
    public function order_status_change($order_status,$id){
        DB::table('orders')
        ->where(['id'=>$id])
        ->update(['order_status'=>$order_status]);
        
        return redirect('admin/orderTotal_detail/'.$id);
    }

   }

