<div class="product row">
  @if(Auth::check())
  <h6>ADMIN</h6>
  <table class="table table-hover">
    <tr><td>
    <a href="/admin/product">Quản lý Sản Phẩm</a></td></tr>
    <tr><td>
    <a href="/admin/news">Quản lý Tin Tức</a></td></tr>
    <tr><td>
    <a href="/admin/project">Quản lý Thông Tin Công Trình</a></td></tr>
    <tr><td>
    <a href="/logout">Logout</a></td></tr>
  </table>
  @endif
</div>
