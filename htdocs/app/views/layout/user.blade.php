<!DOCTYPE html>
<html lang="vi-vn" itemscope itemtype="http://schema.org/LocalBusiness">
    <head>
        @include('user.partial.headtag')
    </head>
    <body>
      <div class="vcard hidden-all">
        <p class="fn">@yield('title')</p>
        <p class="note">@yield('description')</p>
        <p class="url">{{asset(Request::path())}}</p>
        <img class="photo" src="@yield('og-image')">
      </div>
      <div id="fb-root"></div>
      <div class="wrapper">
        @include('user.partial.header')
        @yield('headcontent')
        <div id="main-content" class="content row">
          <div class="products col-sm-9">
            @yield('content')
          </div>
          <div id="news" class="news col-sm-3">
            @include('user.partial.news')
          </div>
        </div>
        @yield('extra')
        @include('user.partial.about')
        @include('user.partial.footer')
        @include('user.partial.extra-fixed')
      </div>
      <script src="https://apis.google.com/js/platform.js" async defer>
      {lang: 'vi'}
      </script>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
      @yield('js')
    </body>
</html>
