@if (Auth::guard('web')->check())
  <p>
    You are logged in as <strong>User!!!</strong>
  </p>
@else
  <p class="text-danger">
    You are logout as a <strong>User</strong>
  </p>
@endif

@if (Auth::guard('admin')->check())
  <p class="text-danger">
    You are logged in as <strong>ADMIN!!!</strong>
  </p>
@else
  <p>
    You are logout as a <strong>ADMIN</strong>
  </p>
@endif
