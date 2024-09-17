@extends('admin.layout.main')
@section('title')
    Trang Dashboard
@endsection
@section('content')
<?php if (session('login_error')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session('login_error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session('login_error', 'unset'); ?>
<?php endif; ?>

Dashboard!
<br>
Xin chào, {{ session('username') }}

@endsection