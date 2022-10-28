<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        // $result=Admin::where(['email'=>$email,'password'=>$password])->get();
        $result=Admin::where(['email'=>$email])->first();
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('email',$result->email);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error','Please enter correct password');
                return redirect('admin');
            }
        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('admin');
        }
    }

    public function dashboard()
    {
        $result['customer']=DB::table('customers')
        ->where(['status'=>1])
        ->get();

        $result['orders']=DB::table('orders')
        
        ->get();

        $result['products']=DB::table('products')
        ->where(['status'=>1])
        ->get();

        return view('admin.dashboard',$result);

    }

    //  public function update(Request $r)
    // {
    //    $r=Admin::find(2);
    //    $r->password=Hash::make('soumen12345');
    //    $r->save();
    // }


}
