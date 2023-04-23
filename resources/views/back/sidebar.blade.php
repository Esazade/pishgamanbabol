<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
    
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          تنظیمات سایت
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('slider.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>اسلایدر</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('dialogue.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>سخن روز</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('founder.index') }}"  class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>پیام موسس</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('album.index') }}" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>گالری</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('library.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>کتابخانه</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('information.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>دانستنی ها</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('aboutus.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>درباره ما</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('contactinfo.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>اطلاعات تماس</p>
          </a>
        </li>
      </ul>
    </li>

  </ul>
</nav>