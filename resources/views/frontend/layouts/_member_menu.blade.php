<style>
      .nav-pills .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
      }
</style>

<h5 class="fw-bold mb-3">Member Menu</h5>
<ul class="nav nav-pills flex-column">
      <li class="nav-item">
            <a href="/members/profile-dashboard" class="nav-link {{ request()->is('members/profile-dashboard') ? 'active text-white bg-primary' : 'text-dark' }}">
                  <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
      </li>
      <li>
            <a href="/members/profile-view" class="nav-link {{ request()->is('members/profile-view*') ? 'active text-white bg-primary' : 'text-dark' }}">
                  <i class="fas fa-user me-2"></i> My Profile
            </a>
      </li>
      <li>
            <a href="/members/profile-events" class="nav-link {{ request()->is('members/profile-events*') ? 'active text-white bg-primary' : 'text-dark' }}">
                  <i class="fas fa-calendar-alt me-2"></i> Events Registered
            </a>
      </li>
      <li>
            <a href="/members/profile-our-member" class="nav-link {{ request()->is('members/profile-our-member*') ? 'active text-white bg-primary' : 'text-dark' }}">
                  <i class="fas fa-calendar-alt me-2"></i> Our Members
            </a>
      </li>
      <li style="display: none;">
            <a href="/members/settings" class="nav-link {{ request()->is('members/settings*') ? 'active text-white bg-primary' : 'text-dark' }}">
                  <i class="fas fa-cogs me-2"></i> Settings
            </a>
      </li>
      <li>
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                  @csrf
                  <button type="button" class="nav-link text-dark bg-transparent border-0 text-start w-100" onclick="confirmLogout()">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                  </button>
            </form>
      </li>
</ul>