@extends('front/layout')
@section('page_title','Registation')
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
                <h4>Register</h4>
                <form action="#"  id="register_form" class="aa-login-form  fr">
                   @csrf
                   <label for="">Full Name<span></span></label>
                 
                   <input type="text" name="name" placeholder="Full Name" >
                   <div id="name_error" class="field_error  frmc "></div>

                   <label for="">Username or Email address<span>*</span></label>
                   <input type="text" name="email" placeholder="Username or email"> 
                   <div id="email_error" class="field_error"></div>

                   <label for="">Mobile No<span></span></label>
                   <input type="text" name="mobile" placeholder="Mobile No" >
                   <div id="mobile_error" class="field_error"></div>
                   
                   <label for="">Password<span>*</span></label>
                   <input type="password" id="jjj" name="password" placeholder="Password">
                    <div id="password_error" class="field_error"></div> 

                   <label for="">Confirm Password<span>*</span></label>
                   <input type="password" name="password_confirmation" placeholder="Confirm Password" >
                   
                   <button type="submit" id="register_form_btn"  class="aa-browse-btn">Register</button>                    
                 </form>
                 <div id="thank_you_msg" class="field_error"></div>
               </div>
             
             </div>
           </div>          
        </div>
      </div>
    </div>
  </div>
</section>
@endsection