@extends('user.layout.app')

@section('content')

    <?php
    $i = 1;
    $lang = app()->getLocale();
    ?>
<?php
$lang = app()->getLocale();

$reddit_post = isset($post_details) ? $post_details : [];




?>

<style>
    #loader {
        border: 12px solid #f3f3f3;
        border-radius: 50%;
        border-top: 12px solid #444444;
        width: 70px;
        height: 70px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

    .center {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }
</style>



    <!-- Subscribe -->
    <section class="about-wrapper intro-wrapper">
        <div class="grunge-up-white"></div>
        <!-- <div class="grunge-down-white"></div> -->
        <div class="container-fluid">
            <div class="row">
                @foreach ($reddit_post as $data)

               <?php

                 $author_fullname = isset($data['data']['author_fullname']) ? $data['data']['author_fullname'] : '';
                 $Post_Title  = isset($data['data']['title']) ? $data['data']['title'] : '';
                 $description1 = isset($data['data']['selftext']) ? $data['data']['selftext'] : null;
                 if( $description1!=null)
              {   $description = substr($description1, 0, 25);}




                ?>
                <div class="col-lg-12">


                    <div class="">




                        <div class="">



                                <div class="dishes-wrapper">


                                    <div class="dishes-detail">
                                        <label >{{ $Post_Title }}</label>
                                        <h5>{{$author_fullname }}</h5>
                                        <label >{{ $description }}...............</label>

                                    </div>

                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                </div>

                        </div>











                    </div>

                </div>
                @endforeach
            </div>
    </section>


@endsection
