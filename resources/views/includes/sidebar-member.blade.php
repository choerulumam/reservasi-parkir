          <section class="sidebar">
            <div class="user-panel">
              <div class="pull-left image"><img class="img-circle" src="{{ asset('images') . "/" . Auth::user()->images }}" alt="User Image"></div>
              <div class="pull-left info">
                <p> {{ Auth::user()->name }} </p>
                <p class="designation">Member</p>
              </div>
            </div>
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
              <li class="active"><a href="{{ url('/member') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
              <li><a href="{{ url('/member/profile')}}"><i class="fa fa-user"></i><span>Profile</span></a></li>
              <li><a href="{{ url('/member/slot') }}"><i class="fa fa-car"></i><span>Booking</span></a></li>
              <li><a href="{{ url('/member/monitoring') }}"><i class="fa fa-video-camera"></i><span>Monitoring</span></a></li>
              <li><a href="{{ url('/member/slot/logs') }}"><i class="fa fa-history"></i><span>History</span></a></li>
            </ul>
            <!-- End Sidebar Menu -->
          </section>