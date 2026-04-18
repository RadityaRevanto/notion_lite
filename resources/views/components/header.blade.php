<header class="navbar bg-base-100/90 backdrop-blur border-b border-base-200 sticky top-0 z-30 px-2 lg:px-6 min-h-[4rem]">
    <!-- Left Section: Breadcrumb & Title -->
    <div class="flex-1">
        <!-- Mobile Sidebar Toggle -->
        <label for="dashboard-drawer" class="btn btn-square btn-ghost lg:hidden mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </label>
        
    <div class="breadcrumbs text-lg hidden sm:block">
        <ul>
            <li>
                <a href="/" class="flex items-center gap-2 text-base-content/70 hover:text-primary transition-colors text-lg">
                    Admin Workspace
                </a>
            </li> 
            <li>
                <a href="#" class="flex items-center gap-2 font-semibold text-base-content hover:text-primary transition-colors text-xl">
                    @if (request()->routeIs('dashboard'))
                        Dashboard
                    @elseif (request()->routeIs('master-tutorial'))
                        Master Tutorial
                    @elseif (request()->routeIs('meeting-notes'))
                        Meeting Notes
                    @elseif (request()->routeIs('mata-kuliah'))
                        Mata Kuliah
                    @else
                        <span class="text-primary bg-primary/10 px-2 py-1 rounded text-sm shadow-sm">✨</span>
                        Page
                    @endif
                </a>
            </li>
        </ul>
    </div>

    <!-- Right Section: Actions & Search -->

</header>
