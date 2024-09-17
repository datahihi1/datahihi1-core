<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('client.asset.style')
</head>
<body class="light-theme">
    <div class="d-flex" id="wrapper" >
        <div class="border-end bg-white" id="sidebar-wrapper">
            @include('client.music.layout.sidebar')
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    @include('client.music.layout.header')
                </div>
            </nav>
            <div class="container-fluid">
                @yield('content')  
            </div>
        </div>
    </div>

</body>
@include('client.asset.script')
</html>
