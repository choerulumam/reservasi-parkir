          <!-- Start Top  Navbar Menu-->
          <nav class="navbar navbar-static-top">
            <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
            <div class="navbar-custom-menu">
              <ul class="top-nav"> <!-- Start User Menu-->
                <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                  <ul class="dropdown-menu settings-menu">
                    <li><a href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                  </ul>
                </li>
              </ul><!-- End User Menu-->
            </div>
          </nav>
          <!-- End Top Navbar Menu-->