<div class="navbar bg-base-100 shadow-sm">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg aria-label="Menu" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> </svg>
      </div>
      <ul
        tabindex="-1"
        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="/listings">Home</a></li>
      </ul>
    </div>
    <a class="btn btn-ghost text-xl" href="/listings">OLY</a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="/listings">Home</a></li>
    </ul>
  </div>
  <div class="navbar-end">
    <div class="dropdown dropdown-end">
        @guest
        <button tabindex="0" role="button" class="btn">Login</button>
        <ul tabindex="-1" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
        </ul>
        @endguest
        @auth
        <button tabindex="0" role="button" class="btn">{{ Auth::user()->name }}</button>
        <ul tabindex="-1" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
            <li><a href="/profile">Profile</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left">Logout</button>
                </form>
            </li>
        </ul>
        @endauth
    </div>
  </div>
</div>
