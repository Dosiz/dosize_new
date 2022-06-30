@extends('frontend_layout.frontend')
@section('title')
OFF SEASON GM
@endsection
@push('styles')

@endpush
@section('content')
<!-- main -->
<div class="main d-flex align-items-center justify-content-center">
    <div class="form_box mt-lg-5 mt-3">
        <div class="text_content text-center py-4 py-lg-0">
            <h1 class="top_text font_impact">THE OFFSEASON GM</h1>
            <p class="top_para font_impact">WHERE THE FANTASY SEASON <span class="text-danger">NEVER
                    ENDS</span></p>
        </div>
        <div class="form">
            <div class="btns d-flex">
                <!-- <a href="login.html" class="btn btn_outline btn_green">Sign In</a>
                <a href="sign_up.html" class="btn btn_outline">Sign Up</a> -->
                <ul class="nav nav-tabs w-100 pt-0" id="myTab" role="tablist">
                    <li class="nav-item w-50" role="presentation">
                        <button class="nav-link active btn btn_outline w-100" id="signin-tab"
                            data-bs-toggle="tab" data-bs-target="#signin" type="button" role="tab"
                            aria-controls="signin" aria-selected="true">Sign In</button>
                    </li>
                    <li class="nav-item w-50" role="presentation">
                        <button class="nav-link btn btn_outline w-100" id="signup-tab" data-bs-toggle="tab"
                            data-bs-target="#signup" type="button" role="tab" aria-controls="signup"
                            aria-selected="false">Sign Up</button>
                    </li>
                </ul>
            </div>


            <!-- tabs -->

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                    aria-labelledby="signin-tab">

                    <form>
                        <div class="group_input">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input position-relative">
                                <input type="email" class="form-control" placeholder="Enter Email Address"
                                    id="email" aria-describedby="emailHelp">
                                <div class="icon">
                                    <!-- <i class="fa-regular fa-user"></i> -->
                                    <img src="{{asset('assets/img/person_icon.png') }}" alt="person">
                                </div>
                            </div>
                        </div>
                        <div class="group_input mb-2">
                            <label for="password" class="form-label">Password</label>
                            <div class="input position-relative">
                                <input type="password" class="form-control" placeholder="Enter Password"
                                    id="password">
                                <div class="icon">
                                    <!-- <i class="fa-regular fa-lock"></i> -->
                                    <img src="{{asset('assets/img/lock_icon.png') }}" alt="lock">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember_pass">
                                <label class="form-check-label mb-0" for="remember_pass">Remember Me</label>
                            </div>
                            <a href="#" class="forgot_pas text_green">Forgot Your Password</a>
                        </div>
                        <a href="#" class="btn login_btn btn_green d-block">Login</a>
                        <span class="note_link text-center d-block">Don't have an account? <a href="#"
                                class="link link_green auth_up">Sign Up</a></span>
                    </form>

                </div>
                <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">

                    <form>
                        <div class="group_input">
                            <label for="name" class="form-label">Name</label>
                            <div class="input position-relative">
                                <input type="text" class="form-control" placeholder="Enter your name"
                                    id="name" aria-describedby="personName">
                            </div>
                        </div>
                        <div class="group_input">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input position-relative">
                                <input type="email" class="form-control" placeholder="Enter Email Address"
                                    id="email" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="group_input">
                            <label for="password" class="form-label">Password</label>
                            <div class="input position-relative">
                                <input type="password" class="form-control" placeholder="********"
                                    id="password">
                            </div>
                        </div>
                        <div class="group_input pb-1">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <div class="input position-relative">
                                <input type="password" class="form-control" placeholder="********"
                                    id="confirm_password">
                            </div>
                        </div>
                        <a href="#" class="btn login_btn btn_green d-block">Sign Up</a>
                        <span class="note_link text-center d-block">Already have as account? <a href="#"
                                class="link link_green auth_in">Sign In</a></span>
                    </form>

                </div>
            </div>

            <!-- tabs  s s s s -->

        </div>
    </div>
</div>
{{-- main-end --}}
@endsection

@section('script')
@endsection
            