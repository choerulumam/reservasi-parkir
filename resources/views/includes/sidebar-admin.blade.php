          <section class="sidebar">
            <div class="user-panel">
              <div class="pull-left image"><img class="img-circle" src="{{ asset('images'). "/" . Auth::user()->name . ".png" }}" alt="User Image"></div>
              <div class="pull-left info">
                <p> {{ Auth::user()->name }} </p>
                <p class="designation">Administrator</p>
              </div>
            </div>
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
              <li class="active"><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
              <li class="treeview"><a href="#"><i class="fa fa-user"></i><span>Management User</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="{{ url('/admin/user') }}"><i class="fa fa-circle-o"></i> Management Data</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Import Data</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Export Data</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Parking</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Management Parking</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Booking Request</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-file-text"></i><span>Monitoring</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> CCTV</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Data Logs</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-share"></i><span>Multilevel Menu</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="blank-page.html"><i class="fa fa-circle-o"></i> Level One</a></li>
                  <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i><span> Level One</span><i class="fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                      <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                      <li><a href="#"><i class="fa fa-circle-o"></i><span> Level Two</span></a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- End Sidebar Menu -->
          </section>