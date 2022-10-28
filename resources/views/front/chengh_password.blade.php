@extends('front/layout')
@section('page_title','Chengh password')
@section('container')

<section id="aa-myaccount">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <div class="aa-myaccount-area">         
           <div class="row">
            <div class="col-md-3">
            </div>
             <div class="col-md-6">
               <div class="aa-myaccount-register">                 
                <h4>Forget password chengh</h4>
                <form action="#"  id="password_chengh123" class="aa-login-form  frmc">
                   @csrf
                   <label for="">Password<span>*</span></label>
                   <input type="password" id="jjj" name="password" placeholder="Password">
                    <div id="password_error" class="field_error"></div> 

                   <label for="">Confirm Password<span>*</span></label>
                   <input type="password"  name="password_confirmation" placeholder="Confirm Password" >
                   <div id="password_error" class="field_error"></div> 
                   
                   <input type="hidden" name="sou" value="{{$rand_id}}">
                  
                   
                   <button type="submit" id="password_chengh_btn"  class="aa-browse-btn">Update</button>                    
                   
                  </form>
                 <div id="pwd_you_msg" class="field_error"></div>
               </div>
             
             </div>
           </div>          
        </div>
      </div>
    </div>
  </div>
</section>
@endsection