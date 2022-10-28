/** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
**/

$(function($){


  /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */
    
    $(".aa-cartbox").hover(function(){
     $(this).find(".aa-cartbox-summary").fadeIn(500);
    }
      ,function(){
         $(this).find(".aa-cartbox-summary").fadeOut(500);
      }
     );   
  
  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */    
   $('[data-toggle="tooltip"]').tooltip();
   $('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */    

   $('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif'
    });

   $('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

   $('.aa-popular-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 

  
  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

   $('.aa-featured-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });
    
  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      
   $('.aa-latest-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */     
    
   $('.aa-testimonial-slider').slick({
      dots: true,
      infinite: true,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */  

   $('.aa-client-brand-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */        

   $(function(){
      if($('body').is('.productPage')){
       var skipSlider = document.getElementById('skipstep');

       var filter_price_start=$('#filter_price_start').val();
       var filter_price_end=$('#filter_price_end').val();
       
       if(filter_price_start=='' || filter_price_end==''){
        var filter_price_start=100;
        var filter_price_end=1700;
       }

        noUiSlider.create(skipSlider, {
            range: {
                'min': 0,
                '10%': 100,
                '20%': 300,
                '30%': 500,
                '40%': 700,
                '50%': 900,
                '60%': 1100,
                '70%': 1300,
                '80%': 1500,
                '90%': 1700,
                'max': 1900
            },
            snap: true,
            connect: true,
            start: [filter_price_start, filter_price_end]
        });
        // for value print
        var skipValues = [
          document.getElementById('skip-value-lower'),
          document.getElementById('skip-value-upper')
        ];

        skipSlider.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = values[handle];
        });
      }
    });


    
  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

   $(window).scroll(function(){
      if ($(this).scrollTop() > 300) {
        $('.scrollToTop').fadeIn();
      } else {
        $('.scrollToTop').fadeOut();
      }
    });
     
    //Click event to scroll to top

   $('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });
  
  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

   $(window).load(function() { // makes sure the whole site is loaded      
     $('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
    })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

 $("#list-catg").click(function(e){
    e.preventDefault(e);
   $(".aa-product-catg").addClass("list");
  });
 $("#grid-catg").click(function(e){
    e.preventDefault(e);
   $(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

   $('.aa-related-item-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 
    
});

function change_product_color_image(img,color){
 $('#color_id').val(color);
 $('.simpleLens-big-image-container').html('<a data-lens-image="'+img+'" class="simpleLens-lens-image"><img src="'+img+'" class="simpleLens-big-image"></a>');
}

function showColor(size){
 $('#size_id').val(size);
 $('.product_color').hide();
 $('.size_'+size).show();
 $('.size_link').css('border','1px solid #ddd');
 $('#size_'+size).css('border','1px solid black');
}
function home_add_to_cart(id,size_str_id,color_str_id){
 $('#color_id').val(color_str_id);
 $('#size_id').val(size_str_id);
  add_to_cart(id,size_str_id,color_str_id);
}
function add_to_cart(id,size_str_id,color_str_id){
 $('#add_to_cart_msg').html('');
  var color_id=$('#color_id').val();
  var size_id=$('#size_id').val();
  
  if(size_str_id==0){
    size_id='no';
  }
  if(color_str_id==0){
    color_id='no';
  }
  if(size_id=='' && size_id!='no'){
   $('#add_to_cart_msg').html('<div class="alert alert-danger fade in alert-dismissible mt10"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select size</div>');
  }else if(color_id=='' && color_id!='no'){
   $('#add_to_cart_msg').html('<div class="alert alert-danger fade in alert-dismissible mt10"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select color</div>');
  }else{
   $('#product_id').val(id);
   $('#pqty').val($('#qty').val());
   $.ajax({
      url:'/add_to_cart',
      data:$('#frmAddToCart').serialize(),
      type:'post',
      success:function(result){
        var totalPrice=0;
        alert('Product '+result.msg);
        if(result.totalItem==0){
          $('.aa-cart-notify').html('0'); 
          $('.aa-cartbox-summary').remove();
        }else{
          
         $('.aa-cart-notify').html(result.totalItem); 
          var html='<ul>';
         $.each(result.data, function(arrKey,arrVal){
            totalPrice=parseInt(totalPrice)+(parseInt(arrVal.qty)*parseInt(arrVal.price));
            html+='<li><a class="aa-cartbox-img" href="#"><img src="'+PRODUCT_IMAGE+'/'+arrVal.image+'" alt="img"></a><div class="aa-cartbox-info"><h4><a href="#">'+arrVal.name+'</a></h4><p> '+arrVal.qty+' * Rs  '+arrVal.price+'</p></div></li>';
          });
         
        }
        html+='<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">Rs '+totalPrice+'</span></li>';
        html+='</ul><a class="aa-cartbox-checkout aa-primary-btn" href="checkout">Checkout</a>';
        console.log(html);
       $('.aa-cartbox-summary').html(html);
      }
    });
  }
}

function deleteCartProduct(pid,size,color,attr_id){
 $('#color_id').val(color);
 $('#size_id').val(size);
 $('#qty').val(0)
  add_to_cart(pid,size,color);
  //$('#total_price_'+attr_id).html('Rs '+qty*price);
 $('#cart_box'+attr_id).hide();
}

function updateQty(pid,size,color,attr_id,price){
 $('#color_id').val(color);
 $('#size_id').val(size);
  var qty=$('#qty'+attr_id).val();
 $('#qty').val(qty)
  add_to_cart(pid,size,color);
 $('#total_price_'+attr_id).html('Rs '+qty*price);
}

function sort_by(){
  var sort_by_value=$('#sort_by_value').val();
 $('#filter_price_end').val($('#skip-value-upper').html());
 $('#categoryFilter').submit();
}

function sort_price_filter(){
 $('#filter_price_start').val($('#skip-value-lower').html());
 $('#filter_price_end').val($('#skip-value-upper').html());
 $('#categoryFilter').submit();
  
}
function color_filter(color){
  $('#categoty_color').val(color);
  $('#categoryFilter').submit();
}
function serach_product(){
  var search_taxt=$('#search_str').val();
  if(search_taxt!='' && search_taxt.length>2 ){
    window.location.href='/search/'+search_taxt;
  }
}

$('#register_form').submit(function(e){
e.preventDefault();
jQuery('.field_error').html('');
$.ajax({
url:'registration_process',
data:$('#register_form').serialize(),
type:'post',
success:function(result){
  if(result.status=="error"){
   
    jQuery.each(result.error,function(key,val){
      jQuery('#'+key+'_error').html('<div class="alert alert-danger" role="alert">'+val[0]+'</div>');
     
    });
  }  
  if(result.status=="success"){
   $('.fr').trigger("reset");
   $('#thank_you_msg').html('<div class="alert alert-success" role="alert">'+result.msg+'</div>');
  }
}
});
});



$('#login_from').submit(function(e){
  e.preventDefault();
  $.ajax({
  url:'/login_from_process',
  data:$('#login_from').serialize(),
  type:'post',
  success:function(result){
    if(result.status=="error"){    
  jQuery('#mag_login').html('<div class="alert alert-danger" role="alert">'+result.msg+'</div>');
    }

    if(result.status=="success"){    
     window.location.href= window.location.href;
        }
  }
  });
  });

  function for_get_password(){
    $("#forget_pwd").show();
   $("#Reg_form").hide();
  
  }
  function  login_forget(){
    $("#forget_pwd").hide();
   $("#Reg_form").show();
  
  }
 
$('#forget_from').submit(function(e){
  e.preventDefault();
  $.ajax({
  url:'/forget_from_process',
  data:$('#forget_from').serialize(),
  type:'post',
  success:function(result){
    if(result.status=="error"){    
      jQuery('#mag_forget').html('<div class="alert alert-danger" role="alert">'+result.msg+'</div>');
        }
        if(result.status=="success"){
          
          $('#mag_forget').html('<div class="alert alert-success" role="alert">'+result.msg+'</div>');
         }

  }
  });
  });

  $('#password_chengh123').submit(function(e){
    e.preventDefault();
    jQuery('.field_error').html('');
    $.ajax({
    url:'/password_chengh_process',
    data:$('#password_chengh123').serialize(),
    type:'post',
    success:function(result){
      if(result.status=="error"){    
       
    jQuery.each(result.error,function(key,val){
      jQuery('#'+key+'_error').html('<div class="alert alert-danger" role="alert">'+val[0]+'</div>');
     
    });
          }
          if(result.status=="success"){
            $('.frmc').trigger("reset");
            $('#pwd_you_msg').html('<div class="alert alert-success" role="alert">'+result.msg+'</div>');
           }

           if(result.status=="hello"){    
            window.location.href='/';
           }

    }
    });
    });
    function applyCouponCode(){
      jQuery('#coupon_code_msg').html('');
      var coupon_code=jQuery('#coupon_code').val();
      if(coupon_code!=''){
        jQuery.ajax({
          type:'post',
          url:'/apply_coupon_code',
          data:'coupon_code='+coupon_code+'&_token='+jQuery("[name='_token']").val(),
          success:function(result){
            console.log(result.status);
            if(result.status=='success'){
              jQuery('.show_coupon_box').removeClass('hide');
              jQuery('#coupon_code_str').html(coupon_code);
              jQuery('#total_price').html('INR '+result.totalPrice);
              jQuery('.apply_coupon_code_box').hide();
            }else{
              
            }
            jQuery('#coupon_code_msg').html(result.msg);
          }
        });
      }else{
        jQuery('#coupon_code_msg').html('Please enter coupon code');
      }
    }
    
    function remove_coupon_code(){
      jQuery('#coupon_code_msg').html('');
      var coupon_code=jQuery('#coupon_code').val();
      jQuery('#coupon_code').val('');
      if(coupon_code!=''){
        jQuery.ajax({
          type:'post',
          url:'/remove_coupon_code',
          data:'coupon_code='+coupon_code+'&_token='+jQuery("[name='_token']").val(),
          success:function(result){
            if(result.status=='success'){
              jQuery('.show_coupon_box').addClass('hide');
              jQuery('#coupon_code_str').html('');
              jQuery('#total_price').html('INR '+result.totalPrice);
              jQuery('.apply_coupon_code_box').show();
            }else{
              
            }
            jQuery('#coupon_code_msg').html(result.msg);
          }
        });
      }
    }



$('#frmPlaceOrder').submit(function(e){
  e.preventDefault();
  $.ajax({
  url:'/placeOrder',
  data:$('#frmPlaceOrder').serialize(),
  type:'post',
  success:function(result){
    if(result.status=='success'){ if(result.payment_url!=''){
      window.location.href=result.payment_url;
    }else{
      window.location.href="/order_placed";
    }
    }else{
      jQuery('#place_order_msg').html('<div class="alert alert-danger" role="alert">'+result.msg+'</div>');
    }
  }
  });
  });
















