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
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3" />
                    </svg>
                    Admin Workspace
                </a>
            </li> 
            <li>
                <a href="#" class="flex items-center gap-2 font-semibold text-base-content hover:text-primary transition-colors text-xl">
                    @if (request()->routeIs('dashboard'))
                        <span class="text-primary bg-primary/10 px-2 py-1 rounded text-sm shadow-sm">📊</span>
                        Dashboard
                    @elseif (request()->routeIs('roadmap'))
                        <span class="text-primary bg-primary/10 px-2 py-1 rounded text-sm shadow-sm">🚀</span>
                        Roadmap 2026
                    @elseif (request()->routeIs('meeting-notes'))
                        <span class="text-primary bg-primary/10 px-2 py-1 rounded text-sm shadow-sm">📝</span>
                        Meeting Notes
                    @elseif (request()->routeIs('objectives'))
                        <span class="text-primary bg-primary/10 px-2 py-1 rounded text-sm shadow-sm">🎯</span>
                        Objectives
                    @elseif (request()->routeIs('trash'))
                        <span class="text-error bg-error/10 px-2 py-1 rounded text-sm shadow-sm">🗑️</span>
                        <span class="text-error">Trash</span>
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
