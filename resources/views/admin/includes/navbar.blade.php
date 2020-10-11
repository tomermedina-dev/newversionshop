<div class="nv-navbar">
  <div class="nv-invisible-padding"></div>
  <div class="nv-navbar-content">
    <a id="sidebarCollapse" class="nv-toggle-button">
        <i class="fas fa-bars"></i>

    </a>

    <div class="dropdown">
      <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i>
          @if( session('role') == 'subadmin' )
            <div class="nv-name nv-font-bc">{{session('userName')}}</div>
          @else
            <div class="nv-name nv-font-bc">Admin</div>
          @endif

        <i class="fas fa-angle-down"></i>
      </div>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/logout">Logout</a>
        <!-- <a class="dropdown-item" href="#">Something again</a>
        <a class="dropdown-item" href="#">Another Something</a> -->
      </div>
    </div>
  </div>
</div>
