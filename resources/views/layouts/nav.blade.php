 <nav class="navbar navbar-expand-lg bg-dark px-5">
     <div class="container-fluid">
         <a class="navbar-brand text-light" href="{{ route('home') }}">Contact Management</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
             <div class="dropdown text-end">
                 <a href="javascript:void(0)"
                     class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-light"
                     data-bs-toggle="dropdown" aria-expanded="true">
                     <img src="{{ isset(Auth::user()->image) ? asset('images/' . Auth::user()->image) : asset('images/placeholder-img.png') }}" alt="mdo" width="32" height="32"
                         class="rounded-circle">
                 </a>
                 <ul class="dropdown-menu text-small mt-1" data-popper-placement="bottom-start"
                     style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-70%, 45px, 0px);">
                     <li><a class="dropdown-item" href="">Profile</a></li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                 </ul>
             </div>
         </div>
     </div>
 </nav>
