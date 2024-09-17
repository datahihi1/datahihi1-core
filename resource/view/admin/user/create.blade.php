@extends('admin.layout.main')
@section('title')
    Trang Thêm - Datahihi1-Lite(Admin)
@endsection
@section('content')
    <a href="{{route('admin/users')}}" class="btn btn-outline-secondary">Trở về</a>
    <form action="{{route('admin/users/store')}}" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Tên tài khoản</label>
      <input type="text" class="form-control" name="username">
    </div>
    <div class="mb-3">
        <label class="form-label">Tên</label>
        <input type="text" class="form-control" name="f-name">
    </div>
    <div class="mb-3">
        <label class="form-label">Họ</label>
        <input type="text" class="form-control" name="l-name">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">Ảnh đại diện</label>
        <input type="file" class="form-control" name="image" id="imageUpload" accept="image/*">
        <div class="image-preview" id="imagePreview">
            <img src="" alt="" class="image-preview__image" height="100">
            <span class="image-preview__default-text"></span>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="pass">
    </div>
    <div class="mb-3">
      <label class="form-label">Nhập lại mật khẩu</label>
      <input type="password" class="form-control" name="re-pass">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
@endsection