@extends('user.layout.app')

@section('content')
<section class="about-wrapper intro-wrapper account-wrapper login-wrapper">
    <div class="login-wrapper-bg"></div>
    <!-- <div class="grunge-down-white"></div> -->
    <div class="container">
        <div class="row">

            <div class="col-lg-9 offset-lg-2">
                <div class="menus-wrapper">


                    <nav class="menu-items pb-0">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Login</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Register</a>
                        </div>
                    </nav>
                    <div class="menu-items pb-0 tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active nav-home" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <form action="#" method="POST">
                                <div id="loginvalidation-errors"></div>
                                <div class="form-group row">

                                    <div class="col-lg-12 col-12 mobile">
                                        <label for="">Mobile Number</label>
                                        <input type="Number" class="form-control" name="mobile" id="mobile">
                                    </div>


                                    <div class="col-lg-12 col-12 otp-verify-cust-login">
                                        <label for="">Otp</label>
                                        <input type="password" class="form-control" name="login_password" id="login_password">
                                    </div>




                                    <div class="col-lg-12 col-12 text-center mt-3 send_otp_btn">
                                        <a href="javascript:void(0)" class="btn btn-primary" onclick="return login();">Send OTP</a>
                                    </div>

                                    <div class="col-lg-12 col-12 text-center mt-3 verify_otp_btn">
                                        <a href="javascript:void(0)" class="btn btn-primary" onclick="return otp_verification();">Verify OTP</a>
                                    </div>

                                    <!-- <div class="col-lg-12 col-12 text-center mt-3">
                                            <a href="#">Forgot Password?</a>
                                       </div> -->

                                </div>
                            </form>


                        </div>

                        <div class="tab-pane fade nav-profile" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="#" method="POST">
                                <div id="validation-errors"></div>
                                <div class="form-group row registration_form">
                                    <div class="col-lg-6 col-12">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control" name="first_name1" id="first_name1">
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control" name="last_name1" id="last_name1">
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email1" id="email1">



                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <label for="">Mobile Number</label>
                                        <div class="input-group mobil-code-group">
                                            <select class="col-4 form-control " data-live-search="true" title="+971">
                                                <option value="+971">+971</option>

                                            </select>
                                            <input type="tel" id="user_mobile1" name="user_mobile1" class="col-8 form-control number" placeholder="">

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12 text-center mt-3">
                                        <a href="javascript:void(0)" class="btn btn-primary" onclick="return userregister();">Send OTP</a>
                                    </div>


                                </div>

                                <div class="form-group row registration_otp">
                                    <div class="col-lg-12 col-12">
                                        <label for="">Otp</label>
                                        <input type="text" class="form-control" name="first_name1" id="first_name1">
                                    </div>

                                    <div class="col-lg-12 col-12 text-center mt-3">
                                        <a href="javascript:void(0)" class="btn btn-primary" onclick="return userregister();">Register</a>
                                    </div>

                                </div>
                            </form>

                        </div>

                    </div>




                    <!-- <div class="menu-items pb-0">
                            <h5>Login</h5>

                        </div>

                        <form action="#">
                            <div class="form-group row">
                                <div class="col-lg-6 col-12">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>

                                <div class="col-lg-6 col-12">
                                    <label for="">Upload Profile Image </label>
                                    <div class="text-box ">

                                        <input type="text" class="form-control">
                                        <label class="upload-box">
                                            <input type="file">
                                            <div class="upload-btn">Upload</div>
                                        </label>
                                    </div>



                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="">Mobile Number</label>
                                    <div class="input-group mobil-code-group">
                                        <select class="col-4 form-control " data-live-search="true" title="+971">

                                            <option value="+966">+966</option>
                                            <option value="+966">+91</option>
                                            <option value="+966">+971</option>

                                        </select>
                                        <input type="tel" id="phone" name="phone" class="col-8 form-control number"
                                            placeholder="">



                                    </div>
                                </div>

                                <div class="col-lg-12 col-12 text-center mt-3">
                                    <button class="btn btn-primary">Login</button>
                                </div>

                            </div>
                        </form> -->
                </div>

            </div>
        </div>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
</section>
<!-- End About -->
@endsection