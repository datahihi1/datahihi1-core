@extends('admin.layout.main')
@section('title')
    Trang Dashboard
@endsection
@section('content')
<?php if (session('login_notify')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session('login_notify'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session('login_notify', 'unset'); ?>
<?php endif; ?>

Dashboard!
<br>
Xin chào, {{ session('username') }}

@endsection