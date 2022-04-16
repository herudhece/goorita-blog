<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/admin">Admin</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/">Admin</a>
    </div>
    <ul class="sidebar-menu">

        <li class="menu-header">Dashboard</li>
        <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
          <a href="/admin" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        
        <li class="nav-item {{ Request::is('admin/berita*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/berita"><i class="far fa-file-alt"></i> <span>Berita</span></a>
        </li>

        <li class="menu-header">Setting</li>
        <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}">
          <a class="nav-link" href="/admin/user"><i class="far fa-user"></i> <span>User</span></a>
        </li>

      </ul>
  </aside>
