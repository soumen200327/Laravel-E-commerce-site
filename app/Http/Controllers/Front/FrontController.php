<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use LDAP\Result;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $result['home_categories']=DB::table('categories')
                ->where(['status'=>1])
                ->where(['is_home'=>1])
                ->get();


        foreach($result['home_categories'] as $list){
            $result['home_categories_product'][$list->id]=
                DB::table('products')
                ->where(['status'=>1])
                ->where(['category_id'=>$list->id])
                ->get();

            foreach($result['home_categories_product'][$list->id] as $list1){
                $result['home_product_attr'][$list1->id]=
                    DB::table('products_attr')
                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                    ->where(['products_attr.products_id'=>$list1->id])
                    ->get();
                
            }
        }

        $result['home_brand']=DB::table('brands')
                ->where(['status'=>1])
                ->where(['is_home'=>1])
                ->get();
        

        $result['home_featured_product'][$list->id]=
                DB::table('products')
                ->where(['status'=>1])
                ->where(['is_featured'=>1])
                ->get();

        foreach($result['home_featured_product'][$list->id] as $list1){
            $result['home_featured_product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
            
        }

        $result['home_tranding_product'][$list->id]=
            DB::table('products')
            ->where(['status'=>1])
            ->where(['is_tranding'=>1])
            ->get();

        foreach($result['home_tranding_product'][$list->id] as $list1){
            $result['home_tranding_product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
            
        }

        $result['home_discounted_product'][$list->id]=
            DB::table('products')
            ->where(['status'=>1])
            ->where(['is_discounted'=>1])
            ->get();

        foreach($result['home_discounted_product'][$list->id] as $list1){
            $result['home_discounted_product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
            
        }
         
        $result['home_banner']=DB::table('home_banners')
            ->where(['status'=>1])
            ->get();

        return view('front.index',$result);
    }

    public function category(Request $request,$slug)
    {  
        
        $result['catacory_category']=DB::table('categories')
        ->where(['status'=>1])
        ->get();

        $result['catacory_color']=DB::table('colors')
        ->where(['status'=>1])
        ->get();


        $sort="";
        $sort_txt="";
        $filter_price_start="";
        $filter_price_end="";
        $color_filter="";
        $colorFilterArr=[];
        if($request->get('sort')!==null){
            $sort=$request->get('sort');
        }    
        
        $query=DB::table('products');
        $query=$query->leftJoin('categories','categories.id','=','products.category_id');
        $query=$query->leftJoin('products_attr','products.id','=','products_attr.products_id');
        $query=$query->where(['products.status'=>1]);
        $query=$query->where(['categories.category_slug'=>$slug]);
        if($sort=='name'){
            $query=$query->orderBy('products.name','asc');
            $sort_txt="Product Name";
        }
        if($sort=='date'){
            $query=$query->orderBy('products.id','desc');
            $sort_txt="Date";
        }
        if($sort=='price_desc'){
            $query=$query->orderBy('products_attr.price','desc');
            $sort_txt="Price - DESC";
        }if($sort=='price_asc'){
            $query=$query->orderBy('products_attr.price','asc');
            $sort_txt="Price - ASC";
        }
        if($request->get('filter_price_start')!==null && $request->get('filter_price_end')!==null){
            $filter_price_start=$request->get('filter_price_start');
            $filter_price_end=$request->get('filter_price_end');

            if($filter_price_start>0 && $filter_price_end>0){
                $query=$query->whereBetween('products_attr.price',[$filter_price_start,$filter_price_end]);
            }
        }  

        if($request->get('categoty_color')!==null){
            $color_filter=$request->get('color_filter');        
            // $colorFilterArr=explode(":",$color_filter);
            // $colorFilterArr=array_filter($colorFilterArr);
           
            $query=$query->where(['products_attr.color_id'=>$request->get('categoty_color')]);
            
        }

        $query=$query->distinct()->select('products.*');
        $query=$query->get();
        $result['product']=$query;
        
        foreach($result['product'] as $list1){
           
            $query1=DB::table('products_attr');
            $query1=$query1->leftJoin('sizes','sizes.id','=','products_attr.size_id');
            $query1=$query1->leftJoin('colors','colors.id','=','products_attr.color_id');
            $query1=$query1->where(['products_attr.products_id'=>$list1->id]);
            $query1=$query1->get();
            $result['product_attr'][$list1->id]=$query1;
        }

        $result['colors']=DB::table('colors')
        ->where(['status'=>1])
        ->get();


        $result['categories_left']=DB::table('categories')
        ->where(['status'=>1])
        ->get();
        
        $result['slug']=$slug;
        $result['sort']=$sort;
        $result['sort_txt']=$sort_txt;
        $result['filter_price_start']=$filter_price_start;
        $result['filter_price_end']=$filter_price_end;
        $result['color_filter']=$color_filter;
        $result['colorFilterArr']=$colorFilterArr;
        return view('front.category',$result);
    }
    public function product(Request $request,$slug)
    {
        $result['product']=
            DB::table('products')
            ->where(['status'=>1])
            ->where(['slug'=>$slug])
            ->get();

        foreach($result['product'] as $list1){
            $result['product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
        }

        foreach($result['product'] as $list1){
            $result['product_images'][$list1->id]=
                DB::table('product_images')
                ->where(['product_images.products_id'=>$list1->id])
                ->get();
        }
        $result['related_product']=
            DB::table('products')
            ->where(['status'=>1])
            ->where('slug','!=',$slug)
            ->where(['category_id'=>$result['product'][0]->category_id])
            ->get();
        foreach($result['related_product'] as $list1){
            $result['related_product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
        }
        
        return view('front.product',$result);
    }

    public function add_to_cart(Request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
            $user_type="Reg";
        }else{
            $uid=getUserTempId();
            $user_type="Not-Reg";
        }
        
        $size_id=$request->post('size_id');
        $color_id=$request->post('color_id');
        $pqty=$request->post('pqty');
        $product_id=$request->post('product_id');

        $result=DB::table('products_attr')
            ->select('products_attr.id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->leftJoin('colors','colors.id','=','products_attr.color_id')
            ->where(['products_id'=>$product_id])
            ->where(['sizes.size'=>$size_id])
            ->where(['colors.color'=>$color_id])
            ->get();
        $product_attr_id=$result[0]->id;


        $check=DB::table('cart')
            ->where(['user_id'=>$uid])
            ->where(['user_type'=>$user_type])
            ->where(['product_id'=>$product_id])
            ->where(['product_attr_id'=>$product_attr_id])
            ->get();
        if(isset($check[0])){
            $update_id=$check[0]->id;
            if($pqty==0){
                DB::table('cart')
                    ->where(['id'=>$update_id])
                    ->delete();
                $msg="removed";
            }else{
                DB::table('cart')
                    ->where(['id'=>$update_id])
                    ->update(['qty'=>$pqty]);
                $msg="updated";
            }
            
        }else{
            $id=DB::table('cart')->insertGetId([
                'user_id'=>$uid,
                'user_type'=>$user_type,
                'product_id'=>$product_id,
                'product_attr_id'=>$product_attr_id,
                'qty'=>$pqty,
                'added_on'=>date('Y-m-d h:i:s')
            ]);
            $msg="added";
        }
        $result=DB::table('cart')
            ->leftJoin('products','products.id','=','cart.product_id')
            ->leftJoin('products_attr','products_attr.id','=','cart.product_attr_id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->leftJoin('colors','colors.id','=','products_attr.color_id')
            ->where(['user_id'=>$uid])
            ->where(['user_type'=>$user_type])
            ->select('cart.qty','products.name','products.image','sizes.size','colors.color','products_attr.price','products.slug','products.id as pid','products_attr.id as attr_id')
            ->get();    
        return response()->json(['msg'=>$msg,'data'=>$result,'totalItem'=>count($result)]);
    }

    public function cart(Request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
            $user_type="Reg";
        }else{
            $uid=getUserTempId();
            $user_type="Not-Reg";
        }
        $result['list']=DB::table('cart')
            ->leftJoin('products','products.id','=','cart.product_id')
            ->leftJoin('products_attr','products_attr.id','=','cart.product_attr_id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->leftJoin('colors','colors.id','=','products_attr.color_id')
            ->where(['user_id'=>$uid])
            ->where(['user_type'=>$user_type])
            ->select('cart.qty','products.name','products.image','sizes.size','colors.color','products_attr.price','products.slug','products.id as pid','products_attr.id as attr_id')
            ->get();
        return view('front.cart',$result);
    }

    public function search(Request $request,$str)
    {
        $result['product']=
            $query=DB::table('products');
            $query=$query->leftJoin('categories','categories.id','=','products.category_id');
            $query=$query->leftJoin('products_attr','products.id','=','products_attr.products_id');
            $query=$query->where(['products.status'=>1]);
            $query=$query->where('name','like',"%$str%");
            $query=$query->orwhere('model','like',"%$str%");
            $query=$query->orwhere('short_desc','like',"%$str%");
            $query=$query->orwhere('desc','like',"%$str%");
            $query=$query->orwhere('keywords','like',"%$str%");
            $query=$query->orwhere('technical_specification','like',"%$str%") ;
            $query=$query->distinct()->select('products.*');
            $query=$query->get();
            $result['product']=$query;
            
            foreach($result['product'] as $list1){
               
                $query1=DB::table('products_attr');
                $query1=$query1->leftJoin('sizes','sizes.id','=','products_attr.size_id');
                $query1=$query1->leftJoin('colors','colors.id','=','products_attr.color_id');
                $query1=$query1->where(['products_attr.products_id'=>$list1->id]);
                $query1=$query1->get();
                $result['product_attr'][$list1->id]=$query1;
            }
        
        return view('front.search',$result);
    }

    public function registation(Request $request)
    {
        if (session()->has('FRONT_USER_LOGIN')!=null){
            return redirect('/');
        }
        $result=[];
        return view('front.registation',$result);
    }
    
    public function registration_process(Request $request)
    {
       
        $valid=Validator::make($request->all(),[
            "name"=>'required',
            "email"=>'required|email|unique:customers,email',
            'password' => 'required|confirmed|min:6',
            "mobile"=>'required|numeric|digits:10',
           
       
        ]);
        $va= $valid->errors()->toArray();
        if($va!=null){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
        }else{
            $rand_num=rand(1111111111,999999999);
            $arr=[
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>$request->password,
                "mobile"=>$request->mobile,
                "status"=>1,
                'is_verify'=>0,
                'rand_id'=>$rand_num,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];
            $query=DB::table('customers')->insert($arr);
            if($query){
                $data =['name'=>$request->name, 'rand_id'=>$rand_num];
                $user['to']=$request->email;
                Mail::send('front/email_verification',$data,function($messages) use 
                ($user){
                    $messages->to($user['to']);
                    $messages->subject('Email Id Verification');
                });
                return response()->json(['status'=>'success','msg'=>"Registration successfully.
                Please check your email id for verification"]);
            }
        }
        
            
        
    }


   public function  login_from_process(Request $request){
    $query  =DB::table('customers')
    ->where(['email'=>$request->reg_email])
    ->get();

    if(isset($query[0])){
       if($query[0]->password==$request->reg_password){
        
        $statu11=$query[0]->status;
        $is_verify=$query[0]->is_verify;
        if($is_verify==0){
            return response()->json(['status'=>'error','msg'=>'Please verify your email id.']);  
        }
        if($statu11==0){
            return response()->json(['status'=>'error','msg'=>'Your account has benn deactivated.']);  
        }
      if($request->rememberme===null){
        setcookie('login_email',$request->reg_email,100);
        setcookie('login_pwd',$request->reg_password,100); 
      }else{
         setcookie('login_email',$request->reg_email,time()+60*60*24*100);
         setcookie('login_pwd',$request->reg_password,time()+60*60*24*100);
      }
  
        $request->session()->put('FRONT_USER_LOGIN',true);
        $request->session()->put('FRONT_USER_ID',$query[0]->id);
        $request->session()->put('FRONT_USER_NAME',$query[0]->name);
       
        $status='success';
        $msg='s';

        $getUserTempId = getUserTempId();
        $asss=DB::table('cart')
        ->where(['user_id'=>$getUserTempId])
        ->where(['user_type'=>'Not-Reg'])
        ->update(['user_id'=>$query[0]->id ,'user_type'=>'Reg']);

       }else{
        $status='error';
        $msg='Please enter valid password!';
       }
    }else{
        $status='error';
        $msg='Please enter valid email!';
    }
    return response()->json(['status'=>$status,'msg'=>$msg]);
   }
       
   public function simran(){
    return view('front.simran');
   }  
    

   public function verification($id){
    $query  =DB::table('customers')
    ->where(['rand_id'=>$id])
    ->get();
    if(isset($query[0])){
        DB::table('customers')
        ->where(['id'=>$query[0]->id])
        ->update(['is_verify'=>1 ,'rand_id'=>'']);
        return view('front.verification_successfull');
    }else{
        return redirect('/');
    }

   }

   public function forget_from_process(Request $request){
    $query  =DB::table('customers')
    ->where(['email'=>$request->email_forget])
    ->get();
  if(isset($query[0])){   
    $rand_num=rand(1111111111,999999999);
    DB::table('customers')
    ->where(['email'=>$query[0]->email])
    ->update(['forget_password'=>1 ,'rand_id'=> $rand_num]);
    $data =['name'=>$request->name, 'rand_id'=>$rand_num];
    $user['to']=$request->email_forget;
    Mail::send('front/email_forget_verification',$data,function($messages) use 
    ($user){
        $messages->to($user['to']);
        $messages->subject('chengh your password');
    });
    return response()->json(['status'=>'success','msg'=>"
    Please check your email id for chenge password "]);

  }else{
    return response()->json(['status'=>'error','msg'=>'Your email dose not exist.']); 
  }

   }
public function chengh_password($id){
    $query  =DB::table('customers')
    ->where(['rand_id'=>$id])
    ->get();
    if(isset($query[0])){
       
        return view('front.chengh_password',['rand_id'=>$id]);
    }else{
        return redirect('/');
    }

}

public function password_chengh_process(Request $request){
  
    
    $query  =DB::table('customers')
    ->where(['rand_id'=>$request->sou])
     ->where(['forget_password'=>1])
    ->get();
   
     if(isset($query[0])){
     
        $valid=Validator::make($request->all(),[ 
            'password' => 'required|confirmed|min:6',          
       
        ]);
        $va= $valid->errors()->toArray();    
        if($va!=null){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
        }else{
            
            DB::table('customers')
            ->where(['email'=>$query[0]->email])
            ->update([
                'forget_password'=>0,
                'rand_id'=>' ',
              'password'=>$request->password,
            ]);
            return response()->json(['status'=>'success','msg'=>"
           Your password chenge successfull "]);
        }       
    }else{
        return response()->json(['status'=>'hello']);
    }
}
 
public function checkout(Request $request)
{
    $result['cart_data']=getAddToCartTotalItem();

    if(isset($result['cart_data'][0])){

        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
            $customer_info=DB::table('customers')  
                ->where(['id'=> $uid])
                 ->get(); 
            $result['customers']['name']=$customer_info[0]->name;
            $result['customers']['email']=$customer_info[0]->email;
            $result['customers']['mobile']=$customer_info[0]->mobile;
            $result['customers']['address']=$customer_info[0]->address;
            $result['customers']['city']=$customer_info[0]->city;
            $result['customers']['state']=$customer_info[0]->state;
            $result['customers']['zip']=$customer_info[0]->zip;
        }else{
            $result['customers']['name']='';
            $result['customers']['email']='';
            $result['customers']['mobile']='';
            $result['customers']['address']='';
            $result['customers']['city']='';
            $result['customers']['state']='';
            $result['customers']['zip']='';
        }

        return view('front.checkout',$result);
    }else{
        return redirect('/');
    }
}
public function apply_coupon_code(Request $request)
{
  $arr=apply_coupon_code($request->coupon_code);
  $arr=json_decode($arr,true);

  return response()->json(['status'=> $arr['status'],'msg'=>$arr['msg'],'totalPrice'=>$arr['totalPrice']]); 
}

public function remove_coupon_code(Request $request)
{
    $totalPrice=0;
    $result=DB::table('coupons')  
    ->where(['code'=>$request->coupon_code])
    ->get(); 
    $getAddToCartTotalItem=getAddToCartTotalItem();
    $totalPrice=0;
    foreach($getAddToCartTotalItem as $list){
        $totalPrice=$totalPrice+($list->qty*$list->price);
    }  
    
    return response()->json(['status'=>'success','msg'=>'Coupon code removed','totalPrice'=>$totalPrice]); 
}

 public function placeOrder(Request $request){
    $payment_url='';                      
    $coupon_value=0;
    if($request->session()->has('FRONT_USER_LOGIN')){
   if($request->coupon_code!=''){
    $arr=apply_coupon_code($request->coupon_code);
    $arr=json_decode($arr,true);
    
  if($arr['status']=='success'){
    $coupon_value=$arr['coupon_code_value'];
  }else{
    return response()->json(['status'=>'false','msg'=>$arr['msg']]); 
  }

   }
        
  
        $totalPrice=0;
        $getAddToCartTotalItem=getAddToCartTotalItem();
        foreach($getAddToCartTotalItem as $list){
            $totalPrice=$totalPrice+($list->qty*$list->price);
           
        }  
        $uid=$request->session()->get('FRONT_USER_ID');

        $arr=[
            "customer_id"=>$uid,
            "name"=>$request->name,
            "email"=>$request->email,
            "mobile"=>$request->mobile, 
            "address"=>$request->address, 
           "state"=>$request->state, 
           "city"=>$request->city, 
           "pincode"=>$request->zip,
           "order_status"=>1,
          "coupon_code"=>$request->coupon_code,
          "coupon_value"=>$coupon_value,
          "payment_type"=>$request->payment_type,
          "payment_status"=>"Pending",
          "total_amount"=> $totalPrice,
         "added_on"=>date('Y-m-d h:i:s'),
        ];
          
      $orders_id=DB::table('orders')->insertGetId($arr);
       
      if($orders_id > 0){
        $getAddToCartTotalItem=getAddToCartTotalItem();
        $productDetailArr=[];
     
  
        foreach($getAddToCartTotalItem as $list){
           
            $productDetailArr['orders_id']=$orders_id;
            $productDetailArr['product_id']=$list->pid;
            $productDetailArr['products_attr_id']=$list->attr_id;
            $productDetailArr['price']=$list->price;
            $productDetailArr['qty']=$list->qty;
            DB::table('orders_details')->insert($productDetailArr);
  
        } 
        if($request->payment_type=='Gateway'){
            $final_amt=$totalPrice-$coupon_value;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("X-Api-Key:test_ebb7d6107c3fbd51999ae50b2cb",
                    "X-Auth-Token:test_beca7e52c9d3847eb37688aff32"));
            $payload = Array(
                'purpose' => 'Buy Product',
                'amount' => $final_amt,
                'phone' => $request->mobile,
                'buyer_name' =>$request->name,
                'redirect_url' => 'http://127.0.0.1:8000/instamojo_payment_redirect',
                'send_email' => true,
                'send_sms' => true,
                'email' => $request->email,
                'allow_repeated_payments' => false
            );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch); 
            $response=json_decode($response);
            $payment_url=$response->payment_request->longurl;
          
            
        }
        DB::table('cart')
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>'Reg'])
        ->delete();
        $request->session()->put('ORDER_ID',$orders_id);
      $status="success";
     $msg="Order placed";
      }else{
        $status="false";
        $msg="Please try after sometime";

    }
    }else{
        $status="false";
        $msg="Please login to place order";

    }
    return response()->json(['status'=>$status,'msg'=>$msg,'payment_url'=>$payment_url]); 
 }

public function place_order(){
    if(session()->has('ORDER_ID')){
        $id=session()->get('ORDER_ID');
        return view('front.place_orderView',['id'=>$id]);
    }else{
        return redirect('/');
    }
   
}

public function order(){
    $query['order']=DB::table('orders')
    ->select('orders.*','order_status.order_status')
   -> leftJoin('order_status','orders.order_status','=','order_status.id')
    ->where(['customer_id'=>session()->get('FRONT_USER_ID')])
    ->get();
  //prx($query);
    return view('front.order',$query);
}

public function instamojo_payment_redirect(Request $request)
{
prx($_GET);

}

public function orders_details($id){
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
                ->where(['customer_id'=>session()->get('FRONT_USER_ID')])
                ->get();

               

    //prx($result['orders_details']);

    return view('front.orders_details',$result);
}

}//End******************************************
