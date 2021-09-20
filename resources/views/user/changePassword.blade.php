@extends('user.layout.app')

<!-- End Mobile sidebar -->
@section('content')
    <section class="global-wrapper breadcrumb-banner">
        <div class="black-transparent"></div>
        <div class="container">
            <div class="global-title">

                <h1 class=" account-text">My Account</h1>
            </div>

        </div>
    </section>

    <!-- About -->

    <section class="about-wrapper intro-wrapper account-wrapper">
        <div class="grunge-up-white"></div>
        <!-- <div class="grunge-down-white"></div> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                  <div class="menus-wrapper account-menu">

                    <div class="user-account-profile">
                        <div class="user-img">
                            <img src="{{ asset(Auth::user()->image_path)}}" alt="No Image Selected">
                        </div>
                        <h5><span>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span></h5>
                    </div>

                    <div href="javascript:void(0);" class=" mobile-menu">
                        Menu
                    </div>

                    <div class="mobile-menu-wrapper">
                        <a href="{{ url('user/profile') }}" class="menu-items  ">
                         Profile
                        </a>

                        <a href="/user/change-password" class="menu-items active ">
                            Change Password
                        </a>
                        <!--  <a href="addressbook.html" class="menu-items">
                                    Address Book
                                </a> -->
                        {{-- <a href="/user/change_password_Form" class="menu-items">
   Change Password
  </a> --}}

                    </div>

                    <div class="menu-items text-center">
                        <button class="btn btn-primary" onclick="window.location.href='
                                {{ url('user/logout') }}'">Logout</button>
                    </div>

                </div>

                </div>
                <div class="col-lg-9">
                    <div class="menus-wrapper">

                        <div class="menu-items pb-0">
                            <h5>Change Password</h5>
                            @if (Session::get('message'))
                            <p class="help-block text-danger">{{ Session::get('message')  }}</p>
                            @endif
                        </div>

                        <form action="{{ url('user/change_password') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-lg-12 col-12">
                                    <label for="">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" id="">
                                </div>
                                <div class="col-lg-12 col-12">
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="">
                                </div>
                                <div class="col-lg-12 col-12">
                                    <label for="">Conform Password</label>
                                    <input type="password" class="form-control" name="conform_password" id="">
                                </div>

                                <div class="col-lg-12 col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Save Change</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
    </section>
    <!-- End About -->

@endsection
