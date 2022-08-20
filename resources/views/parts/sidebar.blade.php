<!-- Sidebar -->
@auth
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <h4>Dashboard</h4>
        <a href="{{route('role')}}" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>Roles</span>
        </a>
        <a href="{{route('permission')}}" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-lock fa-fw me-3"></i><span>Permissions</span></a
        >
      </div>
    </div>
  </nav>
  <!-- Sidebar -->
@endauth