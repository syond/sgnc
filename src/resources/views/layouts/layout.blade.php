@include('layouts/header')

@include('layouts/nav')

@include('layouts/sidebar')

<div class="content-main">

    <!--banner-->	
    <div class="banner">
		   
        <h2>
            <a href="{{ url('dashboard') }}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
            <span>@yield('nav-map-name')</span>
        </h2>
    </div>





    <div class="grid-form">
        <div class="grid-form1">
            @include('layouts/flash-message')
            @yield('content')
        </div>
    </div>
    


</div>

@include('layouts/footer')
