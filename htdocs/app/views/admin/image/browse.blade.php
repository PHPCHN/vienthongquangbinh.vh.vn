<!DOCTYPE html>
<html lang="vn">
  <head>
      @include('user.partial.headtag')
  </head>
  <body>
    <div class="wrapper container-fluid">
      <div class="row">
      @foreach($images as $image)
      <?php $link = asset(Config::get('uploads.'.Slider::UPLOAD_KEY).$image->image)?>
        <div class="col-xs-4 col-sm-2">
          <a href="javascript:select('{{$link}}');">
            <img alt="{{$image->image}}"
              src="{{$link}}" width="100%">
          </a>
        </div>
      @endforeach
      </div>
    </div>
  </body>
  <script>
    function select(fileUrl) {
      var funcNum = {{Session::get('func_num')}};
      window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
      window.close();
    }
  </script>
</html>
