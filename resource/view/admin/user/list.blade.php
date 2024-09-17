@extends('admin.layout.main')
@section('title')
    Trang User - Danh sách - Datahihi1-Lite(Admin)
@endsection
@section('content')
<?php if (isset($_SESSION['user_notification'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?php echo $_SESSION['user_notification']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php unset($_SESSION['user_notification']); ?>
<?php endif; ?>
{{-- <a class="btn btn-outline-info" href="{{route('admin/users/create')}}">Thêm mới</a> --}}
<a href="{{route('admin/users/hide')}}" class="btn btn-outline-secondary">T.khoản xóa tạm</a>
<a href="#" class="btn btn-danger">Xóa nhiều</a>
<a href="#" class="btn btn-light">Xuất dữ liệu</a>
    <table class="table">
        <thead>
          <tr>
            <th></th>
            <th scope="col">STT</th>
            <th scope="col">Tên t.khoản</th>
            <th scope="col">Ảnh nền</th>
            <th scope="col">Hành động</th>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach ($user as $key=>$u):?>
          <tr>
            <td><input type="checkbox" name="ids[]" value="{{$u->id}}"></td>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$u->username}}</td>
            <td><img src="{{$u->avatar}}" class="circle-img"></td>
            <td>
              <div class="ms-auto mt-2 mt-lg-0">
                <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Chính</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);" 
                      onclick="alert('Email: {{$u->email}}\nFull name: {{$u->first_name}} {{$u->last_name}}\nAuthorization: {{$u->role_name}}\nCreated at: {{$u->created_at}}\nUpdated at: {{$u->updated_at}} ')">Thông tin</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="alert('Pass: {{$u->pass}}\nPass hash: {{$u->pass_hash}}')">H.thị m.khẩu</a></li>
                    <li><a class="dropdown-item" href="{{route('admin/users/ban/'.$u->id)}}">Cấm t.khoản</a></li>
                    <li><a class="dropdown-item" href="{{route('admin/users/edit/'.$u->id)}}">C.nhật t.khoản</a></li>
                    <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{route('admin/users/delete/'.$u->id)}}" onclick="return confirm('Xác nhận xóa tài khoản tạm thời ?')">Xóa tạm</a></li>
                      <li><a class="dropdown-item text-danger" href="{{route('admin/users/destroy/'.$u->id)}}" onclick="return confirm('Hành động này không thể phục hồi !\nXác nhận hủy tài khoản v.v: {{$u->username}} ?')">Xóa v.viễn</a></li>
                  </ul>
                </div>
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Lịch sử</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="">L.sử t.đấu</a></li>
                    <li><a class="dropdown-item" href="">L.sử g.dịch</a></li>
                    <li><a class="dropdown-item" href="">L.sử b.luận</a></li>
                  </ul>
                </div>
              </div>
            </td>
            
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
@endsection