@extends('admin.layout.main')
@section('title')
    Trang Sửa - Datahihi1-Lite(Admin)
@endsection
@section('content')
    <a href="{{route('admin/users')}}" class="btn btn-outline-secondary">Trở về</a>
    <form action="{{route('admin/users/update/'.$u->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <input type="hidden" name="id" value="{{$u->id}}">
    <div class="mb-3">
      <label class="form-label">Tên t.khoản</label>
      <input type="text" class="form-control" name="username" value="{{$u->username}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Tên</label>
        <input type="text" class="form-control" name="f-name" value="{{$u->first_name}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Họ</label>
        <input type="text" class="form-control" name="l-name" value="{{$u->last_name}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{$u->email}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Ảnh đ.diện</label>
        <input type="file" class="form-control" name="image" id="imageUpload" accept="image/*">
        <div class="image-preview" id="imagePreview">
            <img src="{{BASE_URL.$u->avatar}}" alt="" class="image-preview__image" height="100">
            <span class="image-preview__default-text"></span>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="pass" value="{{$u->pass}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Nhập lại m.khẩu</label>
      <input type="password" class="form-control" name="re-pass" value="{{$u->pass}}">
    </div>
    <button type="submit" class="btn btn-success">Thay đổi</button>
  </form>
@endsection