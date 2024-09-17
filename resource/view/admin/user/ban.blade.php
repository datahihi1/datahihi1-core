@extends('admin.layout.main')
@section('title')
    Trang Ban tài khoản - Datahihi1-Lite
@endsection
@section('content')
    <?php if (isset($_SESSION['user_notification'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['user_notification']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['user_notification']); ?>
    <?php endif; ?>
    <form action="{{route('admin/users/ban/post/'.$u->id)}}" method="post">
    <input type="hidden" name="id" value="{{$u->id}}">
    <label for="">Tên tài khoản: {{$u->username}}</label>
    <label for="">Tên người dùng: {{$u->first_name}} {{$u->last_name}}</label>
    <div class="mb-3">
        <label for="" class="form-label">Nhập số ngày</label>
        <input type="number" class="form-control" name="dayban">
    </div>
    <button class="btn btn-success" type="submit">Xác nhận</button>
    </form>
@endsection