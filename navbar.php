<div class="navbar bg-base-100 fixed top-0 z-10">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
          <li class="font-bold"><a>Beranda</a></li>
          <li class=""><a>Peta</a></li>
          <li class=""><a>Konsultasi</a></li>
      </ul>
    </div>
    <a class="btn btn-ghost text-xl">SIPETA</a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li class=""><a href="index.php?page=beranda">Beranda</a></li>
      <li class=""><a href="index.php?page=peta">Peta</a></li>
      <li class=""><a href="index.php?page=konsultasi">Konsultasi</a></li>
    </ul>
  </div>
  <div class="navbar-end">
    <div class="hidden lg:flex">
      <button class="btn btn-ghost btn-circle" onclick="trigger()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
      </button>
      <form action="" id="searchInput" class="hidden transition ease-in-out delay-150 duration-1500">
          <input type="text" class="input input-bordered rounded-full w-full max-w-xs">
      </form>
      
    </div>
    <script>
        function trigger() {
            const searchInput = document.getElementById('searchInput');
            searchInput.classList.toggle('hidden');
        }
    </script>
    <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img alt="Tailwind CSS Navbar component" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
        </div>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-neutral-100 rounded-box w-52">
        <?php 
          if (isset($_SESSION['username'])) {
            echo "
              <li><a href='online/index.php?page=dashboard'>Dashboard</a></li>
              <li><a href='online/index.php?page=profile'>Profile</a></li>
              <li><a>Logout</a></li>";
          } else {
            echo "
              <li><a href='index.php?page=signin'>Login</a></li>
            ";
          }
        ?>
        
      </ul>
    </div>
  </div>
</div>