<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <title>Fitroad</title>
    <meta name="description" content="Join our amazing journey on - Fitroad">
    <link rel="shortcut icon" href="{{ asset('assets/user/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/user/images/favicon.png') }}" type="image/x-icon">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/calendar.css') }}">
    <!-- Font Awesome v4 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/all.min.css') }}" />
    <!-- Themify-icon -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/themify-icons.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/aos.css') }}">
    <!-- Ion range slider -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/ion.rangeSlider.min.css') }}">
    <!-- Stytle -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/user/css/arabic.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/user/css/responsive.css') }}">

</head>

<body>
    <!-- Header -->
    <header>
        <div class=""></div>
        <div class=" container">
            <a class="logo" href="{{ url('/') }}">
                {{-- <img src="{{asset('assets/user/images/logo.png')}}" alt="fitroad"> --}}
            </a>

            <div class="navigation">
                <ul class="nav-menu">
                    <li class="active"><a href="{{ url('/') }}">{{ __('common.homemenu') }}</a></li>
                   
                    <li><a href="#">{{ __('common.menusmenu') }}</a></li>
                    <li><a href="#">{{ __('common.contactmenu') }}</a></li>
                    @if (Auth::user())
                    <li><a href="">Dashbord</a></li>
                    @endif
                </ul>
                <div class="account-btn mob-acc">
                    @if (Auth::user())
                        <a href="{{ url('/user/logout') }}" class="btn btn-secondary">{{ __('common.logout') }}</a>
                        <a href="{{ url('user/profile') }}"
                            class="btn btn-secondary">{{ __('common.myprofile') }}</a>
                    @else
                        <a href="javascript:void()" onclick="openAccount()"
                            class="btn btn-secondary">{{ __('common.login') }} /
                            {{ __('common.registartion') }}</a>
                    @endif
                </div>

              

                <div class="menu-btn-mobile" onclick="openNav()">
                    <i class="ti ti-menu"></i>
                </div>
            </div>
        </div>

    </header>
    <!-- End Header -->




    <div id="overlay-account-form"></div>
    <!-- Login/Register -->
    <div id="panelForm" class="panelForm ">

        <!-- Mobile Link -->
        <div class="form login-form">
            <div class="form-title" id="welcome_back_text">
                <div class="closeForm" onclick="closeAccount()"><i class="ti ti-close"></i></div>
                <h6>{{ __('common.welcome_back_again') }}</h6>
                <p>{{ __('common.login_with_email') }}</p>
            </div>

            <div class="form-title" id="final_step_login">
                <div class="closeForm" onclick="closeAccount()"><i class="ti ti-close"></i></div>
                <h6>{{ __('FInal Step To Login') }}</h6>

            </div>

            <div class="form-field" id="otp_send_form">
                <div class="form-group row">
                    <div class="col-lg-12 col-12">
                        <div id="common-loginvalidation-errors"></div>
                    </div>

                  
                   
                    <div class="col-lg-12 col-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="login_email1" id="login_email1">
                    </div>
                    <div class="col-lg-12 col-12">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password_login1" id="password_login1">
                    </div>



                </div>
            </div>




            <div class="form-account" id="common_login_register_email">
                <div class="register-link">
                    <i class="ti ti-user"></i> {{ __('common.registartion') }}
                </div>
                <!-- <div class="email-link" style="">
                    <i class="ti ti-email"></i>{{ __('common.login_with_email') }}
                </div> -->
            </div>

            <div class="form-action">
                <div class="col-lg-12 col-12 text-center">
                    @if (Auth::user())
                        <a href="{{ url('user/logout') }}"
                            class="log-in btn btn-primary">{{ __('common.logout') }}</a>

                    @else
                        <a href="javascript:void(0)" class="log-in btn btn-primary"
                            id="common_login_btn">{{ __('Login') }}</a>

                        <!-- <a href="javascript:void(0)" class="log-in btn btn-primary" >{{ __('verify') }}</a> -->
                        <input type="hidden" name="_token" id="login_token" value="{{ csrf_token() }}">
                    @endif
                </div>
            </div>



        </div>
        <!-- Mobile Link -->

        <!-- Register Link -->
        <div class="register-form form">
            <div class="form-title">
                <div class="closeForm" onclick="closeAccount()"><i class="ti ti-close"></i></div>
                <h6>Create and account</h6>
                <!-- <p>Login using your email and password</p> -->
            </div>
            <div id="common-loginvalidation-errors1"></div>
            <div class="form-field">
                <div class="form-group row">
                    <div class="col-lg-12 col-12">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name">
                    </div>
                    <div class="col-lg-12 col-12">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name">
                    </div>
                    <div class="col-lg-12 col-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>


                    <div class="col-lg-12 col-12">
                        <label for="">Date of Birth</label>

                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">





                    </div>



                    <div class="col-lg-12 col-12">
                       

                        <div class="form-group">
                            <label class="control-label">Gender<span class="text-danger">*</span></label>
                            <select name="gender"  id="gender"class="form-control  basic">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                             
                               
                            </select>
                        </div>


                    </div>
                    <div class="col-lg-12 col-12">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="col-lg-12 col-12">
                        <label for="">Comfirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>


                    <!-- <div class="col-lg-12 col-12">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="user_password" id="user_password">
                    </div>
                    <div class="col-lg-12 col-12">
                        <label for="">Comfirm Password</label>
                        <input type="password" class="form-control" name="confirm_user_password" id="confirm_user_password">
                    </div> -->

                    <div class="col-lg-12 col-12">
                        I have read and accept <a href="#" class="link-terms">Privacy Policy</a>
                    </div>






                </div>
            </div>
            <div class="form-account">
                <!-- <div class="email-link">
                    <i class="ti ti-email"></i> 
                </div> -->
                <div class="mobile-link">
                    <i class="ti ti-mobile"></i>{{ __('common.login_with_email') }}
                </div>
            </div>

            <div class="form-action">
                <div class="col-lg-12 col-12 text-center">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <a href="javascript:void(0)" onclick="userregister1()"
                        class="log-in btn btn-primary">{{ __('common.registartion') }}</a>
                </div>
            </div>



        </div>
        <!-- Register Link -->


        <!-- Email Link -->
        <div class="email-form form">
            <div class="form-title">
                <div class="closeForm" onclick="closeAccount()"><i class="ti ti-close"></i></div>
                <h6>Welcome back again</h6>
                <p>Login using your email and password</p>
            </div>

            <div class="form-field">
                <div class="form-group row">
                    <div class="col-lg-12 col-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>
                    <div class="col-lg-12 col-12">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>

                    <div class="col-lg-12 col-12">
                        <a href="#" class="forgot-link">Forgot Password?</a>
                    </div>

                </div>
            </div>
            <div class="form-account">
                <div class="register-link">
                    <i class="ti ti-user"></i> Register
                </div>
                <div class="mobile-link">
                    <i class="ti ti-mobile"></i>Login 
                </div>
            </div>

            <div class="form-action">
                <div class="col-lg-12 col-12 text-center">
                    <a href="javascript:void(0)" class="log-in btn btn-primary">Login</a>
                </div>
            </div>



        </div>

        <div class="otp-verification-form form">
            <div class="form-title">
                <div class="closeForm" onclick="closeAccount()"><i class="ti ti-close"></i></div>
                <h6>Otp Verification Page </h6>
                <p>{{ __('Please enter verification code send to your mobile') }} <label id="mobile_number">
                    </label> </p>
            </div>

            <label id="common-otp-verification-errors1"></label>


            <!-- <div class="form-field">
                <div class="form-group row">
                    <div class="col-lg-12 col-12">
                    <div id="common-otp-verification-1"></div>
                      </div>
                    </div>


                </div>
            </div> -->

            <div class="form-field">
                <div class="form-group row">
                    <div class="col-lg-12 col-12">
                        <label for="">OTP</label>
                        <input type="text" class="form-control" name="common_login_otp_number"
                            id="common_login_otp_number">
                    </div>


                </div>
            </div>


            <div class="form-action">
                <div class="col-lg-12 col-12 text-center">
                    <input type="hidden" class="form-control" name="type11" id="type11" value="">
                    <a href="javascript:void(0)" id="common_otp_login_home"
                        class="log-in btn btn-primary">Verification</a>
                </div>
            </div>



        </div>
        <!-- Email Link -->

        <!-- Forgot Password -->
        <div class="forgot-form form">
            <div class="form-title">
                <div class="closeForm" onclick="closeAccount()"><i class="ti ti-close"></i></div>
                <h6>Change password</h6>
                <!-- <p>Login using your email and password</p> -->
            </div>

            <div class="form-field">
                <div class="form-group row">
                    <div class="col-lg-12 col-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>
                </div>
            </div>
            <div class="form-account">
                <div class="register-link">
                    <i class="ti ti-user"></i> Register
                </div>
                <!-- <div class="mobile-link">
                    <i class="ti ti-mobile"></i>Login With Phone
                </div> -->
            </div>

            <!-- <div class="form-action">
                <div class="col-lg-12 col-12 text-center">
                    <a href="my-account.html" class="btn btn-primary">Reset Password</a>
                </div>
            </div> -->



        </div>



        <!--Forgot Password -->




        <!-- After Login -->
        <!-- <div class="deit-plan-form form">
            <div class="form-title">
                <div class="closeForm" onclick="closeAccount()"><i class="ti ti-close"></i></div>
                <h6>Hi, Carolyn </h6>
                <p>Please fill the forms</p>
            </div>

            <div class="form-field">
                <div class="form-group row">
                    <div class="col-lg-12 col-12">
                        <label for="">Weight (kg)</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>

                    <div class="col-lg-6 col-12">
                        <label for="">Height</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>
                    <div class="col-lg-6 col-12">
                        <label for="">Age</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>


                    <div class="col-lg-12 col-12">
                        <label for="">Goal</label>
                        <div class="choose-properties-btn">
                            <div class="form-check btn_border_design">
                                <label class="container-ch radio-custom">Lose Weight
                                    <input type="radio" name="goal" value="goal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-check btn_border_design">
                                <label class="container-ch radio-custom">Gain Weight
                                    <input type="radio" checked name="goal" value="goal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-check btn_border_design">
                                <label class="container-ch radio-custom">Keep Fit
                                    <input type="radio" checked name="goal" value="goal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-check btn_border_design">
                                <label class="container-ch radio-custom">Healthy Life Style
                                    <input type="radio" checked name="goal" value="goal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12 col-12">
                        <label for="">Health Condition</label>
                        <div class="choose-properties-btn">
                            <div class="form-check btn_border_design">
                                <label class="container-ch radio-custom">No
                                    <input class="healthcondition" type="radio" name="health" value="no">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-check btn_border_design">

                                <label class="container-ch radio-custom">Yes
                                    <input class="healthcondition" type="radio" name="health" value="yes">
                                    <span class="checkmark"></span>
                                </label>
                            </div>



                        </div>

                        <div class="ifyes yes" style="display: none;">
                            <label for="">Description</label>
                            <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>



                    <div class="col-lg-12 col-12">
                        <label for="">BMI Report </label>
                        <div class="text-box ">

                            <input type="text" class="form-control">
                            <label class="upload-box">
                                <input type="file">
                                <div class="upload-btn">Upload</div>
                            </label>
                        </div>
                    </div>





                </div>
            </div>
            <div class="form-account">

            </div>

            <div class="form-action">
                <div class="col-lg-12 col-12 text-center">
                    <a href="my-account.html" class="log-in btn btn-primary">Submit</a>
                </div>
            </div>



        </div> -->
        <!-- After Login -->
    </div>
    <!-- End Login/Register -->

    <!-- Mobile Sidebar -->
    <div class="open-panel">
        <div id="overlay-sidepanel" class="overlay-sidepanel-hide"></div>
        <div id="mySidepanelheader" class="sidepanel-menu">

            <div class="close" onclick="closeNav()"><i class="ti ti-close"></i></div>

            <div class="account-btn">
                <a href="login-ar.html" class="btn btn-secondary">{{ __('common.login') }} /
                    {{ __('common.registartion') }}</a>
            </div>
            <ul class="nav-menu">
                <li class="active"><a href="{{ url('/') }}">{{ __('common.homemenu') }}</a></li>
                <li><a href="#">{{ __('common.whowearemenu') }}</a></li>
                <li><a href="#">{{ __('common.menusmenu') }}</a></li>
                <li><a href="#">{{ __('common.contactmenu') }}</a></li>
            </ul>

        </div>

    </div>

    <!-- End Mobile sidebar -->
