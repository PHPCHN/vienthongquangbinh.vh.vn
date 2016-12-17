<!DOCTYPE html>
<html lang="vn">
    <head>
        @include('user.partial.headtag')
    </head>
    <body>
      <div class="wrapper container-fluid">
        @include('user.partial.header')
        <div id="main-content" class="content row">
          <div class="products col-sm-9">
            @yield('content')
          </div>
          <div id="news" class="news col-sm-3">
            @include('admin.partial.menu')
          </div>
        </div>
        @include('user.partial.footer')
        @include('user.partial.extra-fixed')
      </div>
    </body>
    @yield('js')
</html>
