<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend/component/header')
</head>

<body>        
        @include('backend/component/navbar')        
        
        <div class="content">
            @yield('content')        
        </div>

        {{-- @include('backend/component/footer') --}}

    @include('backend/component/script')
</body>
    @include('backend/component/footer')

</html>