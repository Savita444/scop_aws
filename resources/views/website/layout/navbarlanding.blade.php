<style>
     /* Custom CSS for active link */
     .navbar-nav>li.active>a,
        .navbar-nav>li.active>a:hover,
        .navbar-nav>li.active>a:focus {
            color: #ed6d70;; /* Replace with your desired active color */
            background-color: transparent; /* You can customize the background color if needed */
        }

        /* Custom CSS for hover effect */
        .navbar-nav>li>a:hover,
        .navbar-nav>li>a:focus {
            color: blue; /* Replace with your desired hover color */
            background-color: transparent; /* You can customize the background color if needed */
        }
    </style>
<nav class="navbar navbar-default  bootsnav">
    <div class="container">
        <div class="row">
            <!-- <div class="attr-nav">
                <a class="sponsor-button" href="{{ url('registration') }}">Registration</a> 
                 <a class="donation" href="{{ url('login') }}">Login</a>
            </div> -->
            <div class="navbar-header">
                {{-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button> --}}
                <a class="navbar-brand logo" href="{{ '/' }}"><img
                        src="{{ asset('website/assets/images/logo.jpeg') }}" class="img-responsive" style="padding:10px" /></a>
            </div>
            <!-- <div class="collapse navbar-collapse" id="navbar-menu">
             
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                    <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ url('about') }}">About Us</a></li>
                    <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a href="{{ url('contact-us') }}">Contact Us</a></li>
                </ul>
            </div> -->
        </div>
    </div>
</nav>