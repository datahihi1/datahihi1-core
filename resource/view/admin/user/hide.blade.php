@extends('admin.layout.main')
@section('title')
    Trang User bị ẩn - Danh sách - Datahihi1-Lite(Admin)
@endsection
@section('content')
<?php if (isset($_SESSION['user_notification'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?php echo $_SESSION['user_notification']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php unset($_SESSION['user_notification']); ?>
<?php endif; ?>
<a href="{{route('admin/users')}}" class="btn btn-outline-secondary">Trở về</a>
<a href="{{route('admin/destroy/')}}" class="btn btn-outline-danger">Xóa hàng chọn</a>
    <table class="table">
        <thead>
          <tr>
            <th></th>
            <th scope="col">STT</th>
            <th scope="col">Tên tài khoản</th>
            <th scope="col">Ảnh</th>
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
                      onclick="alert('Email: {{$u->email}}\nFull name: {{$u->first_name}} {{$u->last_name}}\nAuthorization: {{$u->role_name}}\nCreated at: {{$u->created_at}}\nUpdated at: {{$u->updated_at}}\nDeleted at: {{$u->deleted_at}} ')">Thông tin</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="alert('Pass: {{$u->pass}}\nPass hash: {{$u->pass_hash}}')">K.tra m.khẩu</a></li>
                    <li><a class="dropdown-item" href="{{route('admin/users/edit/'.$u->id)}}">C.nhật t.khoản</a></li>
                    <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-success" href="{{route('admin/users/restore/'.$u->id)}}">Khôi phục</a></li>
                      <li><a class="dropdown-item text-danger" href="{{route('admin/users/destroy/'.$u->id)}}" onclick="return confirm('Hành động này không thể phục hồi !\nXác nhận hủy tài khoản v.v: {{$u->username}} ?')">Xóa v.viễn</a></li>
                  </ul>
                </div>
              </div>
            </td>
            
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>

@endsection