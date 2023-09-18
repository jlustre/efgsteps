<!DOCTYPE html>
<html lang="en">
    @include('admin.body.header')
<body>
    <div class="main-wrapper">
        @include('admin.body.sidebar')
        @include('admin.body.settings')

        <div class="page-wrapper">
            @include('admin.body.navbar')
            @yield('page-content')
            @include('admin.body.footer')
        </div>
    </div>

    @include('admin.body.scripts')

</body>
</html>
