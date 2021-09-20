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
                            <a href="{{ url('user/profile') }}" class="menu-items  active">
                             Profile
                            </a>

                            <a href="{{ url('user/change-password') }} "  class="menu-items ">
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
                                    {{ url('user/logout') }}">Logout</button>
                        </div>

                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="menus-wrapper">

                        <div class="menu-items pb-0">
                            <h5> Profile</h5>
                            @if (Session::get('message'))
                            <p class="help-block text-danger">{{ Session::get('message')  }}</p>
                            @endif
                        </div>

                        <form action="{{ url('user/profile/edit') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-lg-6 col-12">
                                    <label for="">First Name</label>
                                    <input disabled type="text" class="form-control" name="first_name" id="first_name"
                                        value={{ Auth::user()->name }}>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="">Last Name</label>
                                    <input disabled type="text" class="form-control" name="last_name" id="last_name"
                                        value={{ Auth::user()->last_name }}>
                                </div>
                                {{-- preview image --}}
                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                {{-- end --}}

                                <div class="col-lg-6 col-12">
                                    <label for="">Email</label>
                                    <input disabled type="text" class="form-control" name="last_name" id="last_name"
                                        value={{ Auth::user()->email }}>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="">Created Date</label>
                                    <input disabled type="text" class="form-control" name="last_name" id="last_name"
                                        value={{ Auth::user()->created_at }}>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="">DOB</label>
                                    <input disabled  type="text" class="form-control" name="last_name" id="last_name"
                                        value={{ Auth::user()->dob }}>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <label for="">Gender</label>
                                    <input disabled  type="text" class="form-control" name="last_name" id="last_name"
                                        value={{ Auth::user()->gender }}>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="">Upload Profile Image </label>
                                    <div class="text-box ">

                                        <input type="text" class="form-control">
                                        <label class="upload-box">
                                            <input type="file" name="file" id="profile-img">


                                            <img src="" alt="" id="profile-img-tag" width="50px" height="50px" />


                                            <input type="hidden" name="file_upload"
                                                value="{{ old('file', $current_cart_data->image_path ?? null) }}">


                                            <div class="upload-btn">Upload</div>

                                        </label>
                                    </div>




                                </div>
<br>
<br>
<br>
<br>
                                <div class="col-lg-12 col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Save Image</button>
                                </div>


                            </div>
                        </form>
                    </div>

                    {{-- preview img --}}
                    <script type="text/javascript">
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#profile-img-tag').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $("#profile-img").change(function() {
                            readURL(this);
                        });
                    </script>
                    {{-- end preview img --}}
                </div>
            </div>
    </section>
    <!-- End About -->

@endsection


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function() {
        readURL(this);
    });
</script>
