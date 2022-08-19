@extends('layout.master')
@section('title')
Dosize
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/desktop-css.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

<main>
    <div class="main-wrapper">
        <div class="main_wallet_div d-lg-none">
            <img src="{{asset('assets/img/mobile_component/wallet_main.png') }}" alt="" class="img-fluid">
            <h3>הארנק שלי</h3>
            <p class="font-size-14">דוסיז צרכנות מעניקה עבור כל פעילות במערכת נקודות, הנקודות ניתנות למימוש בלה
                בלה בלה...</p>
        </div>
        <div class="d-lg-flex flex-row-reverse mt-5">
            <div class="col-lg-12">
                <div class="container-fluid">
                    <table class="table fl">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col"> שֵׁם </th>
                            <th scope="col"> שם מוצר </th>
                            <th scope="col"> מטבעות </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @if(count($orders) > 0)
                            @foreach($orders as $key=>$order)
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->product->name}}</td>
                            <td>{{$order->coins}}</td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>
        
        
                </div>
            </div>
        </div>
            <!-- main footer start from here -->
            <div class="main_footer mt-5 d-none d-xl-block">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <div class="box text-right px-3">
                                <p class="txt">בואו לעקוב אחרנו :)</p>
                                <div class="socials_icons mt-4">
                                    <a href="#" class="social_link mx-2">
                                        <img src="{{asset('assets/img/fb.png') }}" alt="fb">
                                    </a>
                                    <a href="#" class="social_link mx-2">
                                        <img src="{{asset('assets/img/inst.png') }}" alt="">
                                    </a>
                                    <a href="#" class="social_link mx-2">
                                        <img src="{{asset('assets/img/twitter.png') }}" alt="">
                                    </a>
                                    <a href="#" class="social_link mx-2">
                                        <img src="{{asset('assets/img/whatsapp.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box px-3 border_Side">
                                <div class="statments_links d-flex flex-column align-items-end">
                                    <p class="txt">
                                        דוסיז משפט הנעה על דוסיז >>
                                    </p>
                                    <div class="btns d-flex mt-4">
                                        <a href="#" class="btn btn_grey_out">הצטרפות לעסקים</a>
                                        <a href="#" class="btn btn_orange ml-2">הרשמה לדוסיז</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box px-3 d-flex align-items-center justify-content-center">
                                <img src="{{asset('assets/img/footer_img.png') }}" class="footer_Img" alt="footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main footer start end here -->
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Product Purchase</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Are you sure you want to buy this product ?
            </div>
            <div class="modal-footer">
                <form action="{{route('store-wallet') }}" method="POST" >
                    @csrf
                    <input type="hidden" name="coins" value="{{$product->price ?? '' }}" />
                    <input type="hidden" name="product_id" value="{{$product->id ?? '' }}" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background-color:#db1580 !important; border-color:#db1580 !important;">Buy Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/Minimal-jQuery-Countdown/jquery.countdown.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>


    $(document).ready(function() {
        $('#login-modal').fadeOut()
        $("#signup_btn").click(function(e) {
            e.preventDefault();
            $('#sign_up_modal').fadeOut()
            $('#login-modal').fadeIn()
        });
        $("#login_btn").click(function(e) {
            e.preventDefault();
            $('#sign_up_modal').fadeIn()
            $('#login-modal').fadeOut()
        });
    });

    

    $('#sign_up_form').submit(function(e){
        e.preventDefault();
        $('.main-wrapper').addClass('active');
        $.ajax({
            type: "POST",
            url: "{{ route('register') }}",
            data: new FormData(this),
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                console.log("Success");
                $('.close').click();
                window.location.href="/";
                 
            },
            error: function (data) {
                    $('.name_valid').text(data?.responseJSON?.errors?.name);
                    $('.email_valid').text(data?.responseJSON?.errors?.email);
                    $('.city_valid').text(data?.responseJSON?.errors?.city_id);
                    $('.password_valid').text(data?.responseJSON?.errors?.password);
            }
        });
    });

    $('#login_form').submit(function(e){
        e.preventDefault();
        $('.main-wrapper').addClass('active');
        $.ajax({
            type: "POST",
            url: "{{ route('login') }}",
            data: new FormData(this),
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                // console.log(data);
                $('.close').click();
                window.location.href="/dashboard/dashboard";
                 
            },
            error: function (data) {
                console.log('Error:', data.responseJSON);
                if($('#email').val() == ''){
                    $('.email_valid').text(data.responseJSON.errors.email);
                }
                else{
                    $('.email_valid').text('');
                }
                if($('#password').val() == ''){
                    $('.password_valid').text(data.responseJSON.errors.password);
                }
                else{
                    $('.password_valid').text('');
                }
                
                
            }
        });
    });

    // console.log($('.example'))
    [...document.querySelectorAll('.example')].forEach(elem => {
        $(elem).countdown({
        date: elem.getAttribute('discount-time')
        }, function () {
            $(elem).parent().parent().parent().parent().addClass('d-none');
    });
    });

    document.querySelector('#purchase_product2').addEventListener('click', function(e) {
        // e.stopPropagation();
        e.preventDefault();
        alert(100);
    })

    // $('#purchase_product').click(function(e){
    //     e.preventDefault();
    //     alert('Purchase Product');
    //     exit();
    //     let brand_profile_id = $('#brand_profile_id').val();
    //     let email = $('#email').val();
    //     let _token   = $('meta[name="csrf-token"]').attr('content');
    //     // console.log(postFormData);
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('store-subscriber') }}",
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         data: {
    //             email:email,
    //             brand_profile_id:brand_profile_id,
    //             _token: _token
    //         } ,
    //         datatype: "json",
    //         success: function (data) {
    //              console.table(data.success);
    //             toastr.success(data.success);
    //             // console.table(data.comment);
                
                 
    //         },
    //         error: function (data) {
    //             // toastr.warning(data);
    //             toastr.error("Already Subscribed");
                
    //         }
    //     });
    });

</script>
@endsection