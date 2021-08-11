<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.product.index') }}">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category.index') }}">
              <span data-feather="users"></span>
              Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
              <span data-feather="bar-chart-2"></span>
              User & oder
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.contact.index') }}">
              <span data-feather="bar-chart-2"></span>
              Contact
            </a>
          </li>
        </ul>
      </div>
    </nav>