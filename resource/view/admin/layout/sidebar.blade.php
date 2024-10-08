<div class="sidebar-heading border-bottom bg-light">Bootstrap</div>
<div class="list-group list-group-flush">
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin/')}}">Trang chủ</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin/users/')}}">Quản lí tài khoản</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Item sidebar</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Item sidebar</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Item sidebar</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Item sidebar</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Item sidebar</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Item sidebar</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Item sidebar</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Item sidebar</a>
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Item sidebar</a>
    <div class="d-flex flex-column flex-shrink-0 p-3">
    <div class="dropdown">
        <a href="javascript:void(0);" class="d-flex align-items-center text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{session('avatar')}}" alt="" width="40" height="40" class="rounded-circle me-3">
            <strong style="color: black">{{session('username')}}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#setting">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#logOut">Sign out</a></li>
        </ul>
    </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="setting" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Setting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal log out -->
<div class="modal fade" id="logOut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo: {{session('username')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Kết thúc phiên làm việc ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{route('admin/logout')}}" class="btn btn-primary">Log Out</a>
      </div>
    </div>
  </div>
</div>