@extends('common.base_layout')
@section('title','Do API - 文档保护')
@section('stylesheet')
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    {{--<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
{{--    <link rel="stylesheet" href="{{asset('assets/css/loader-style.css')}}">--}}

    <!--custom风格-->
    <link rel="stylesheet" href="{{asset('assets/css/signin.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/extra-pages.css')}}">



    @endsection

@section('content')
    <style type="text/css">
        body {
            overflow:hidden!important;
            padding-top: 120px;
            background:url('{{asset('images/lockbg.png')}}') repeat top center fixed;
        }
    </style>
    <!-- Preloader -->
    <!--<div id="preloader">
        <div id="status">&nbsp;</div>
    </div>-->

    <!-- Main content -->
    <section class="page-error">

        <div class="headline-lock text-center" id="time">
            <span></span>
            <!-- Time auto generated by js -->
        </div>
        <!-- /.headline -->

        <!--<div class="lockscreen-image">
            <img src="http://api.randomuser.me/portraits/thumb/men/41.jpg" alt="user image">
        </div>-->
        <!-- User name -->
        @if (session('password'))
            <div class="lockscreen-name">{{ session('password') }}</div>
        @else
            <div class="lockscreen-name">请输入访问密码</div>
            @endif

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">

            <!-- lockscreen credentials (contains the form) -->
            <div class="lockscreen-credentials">

                <form id='form1' action='{{url('i').'/'.$url.'/mydoc'}}' method='post'>
                    {{csrf_field()}}
                <div class="input-group">

                    <input id="password" type="password" name="password" class="form-control" placeholder="password">
                    <div class="input-group-btn">
                        <button class="btn btn-flat"><i class="fa fa-arrow-right text-muted"></i>
                        </button>
                    </div>

                </div>
                </form>
            </div>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->

        <!--<div class="lockscreen-link">
            <a class="lock-link" href="login.html">Or sign in as a different user</a>
        </div>-->

    </section>

    <!-- FOOTER -->
    <footer class="footer navbar-fixed-bottom console_footer">
        <div class="container">
            <div class="text-center">
                <p>版权所有(C) 北京布衣科技有限公司 ICP证号：京ICP备14015023号-2</p>
            </div>
        </div>
    </footer>
    <!-- / END OF FOOTER -->
@endsection






    <!--  END OF PAPER WRAP -->
@section('javascript')


    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    {{--<script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('assets/js/load.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>



    <script type="text/javascript">
    $(function() {
        startTime();
        $(".center").center();
        $(window).resize(function() {
            $(".center").center();
        });
    });

    /*  */

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();

        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);

        //Check for PM and AM
        var day_or_night = (h > 11) ? "PM" : "AM";

        //Convert to 12 hours system
        if (h > 12)
            h -= 12;

        //Add time to the headline and update every 500 milliseconds
        $('#time').html(h + ":" + m + ":" + s + " " + day_or_night);
        setTimeout(function() {
            startTime()
        }, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    /* CENTER ELEMENTS IN THE SCREEN */
    jQuery.fn.center = function() {
        this.css("position", "absolute");
        this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
            $(window).scrollTop()) - 30 + "px");
        this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
            $(window).scrollLeft()) + "px");
        return this;
    }
    </script>

@endsection
