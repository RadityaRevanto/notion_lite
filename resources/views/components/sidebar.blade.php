<aside class="w-64 min-h-screen bg-base-200 text-base-content border-r border-base-300 flex flex-col transition-all duration-300 text-base leading-relaxed" id="sidebar">
    
    <!-- Brand / Logo -->
    <div class="p-4 flex items-center justify-center border-b border-base-300 bg-base-200/50">
        <a class="flex items-center gap-2 font-bold text-2xl normal-case hover:opacity-80 transition-opacity" href="{{ route('dashboard') }}">
            <span>Notion<span class="text-primary">App</span></span>
        </a>
    </div>

    <!-- Navigation -->
    <div class="flex-1 overflow-y-auto w-full px-2">
        <ul class="menu w-full gap-1">

            <!-- Title -->
            <li class="menu-title text-sm uppercase tracking-wide font-semibold flex flex-row items-center justify-between mt-2 py-1">
                Workspace
                <button class="btn btn-xs btn-ghost btn-circle hover:bg-base-300">
                    <svg class="w-4 h-4 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </button>
            </li>

            <!-- Dashboard -->
            <li class="mt-2">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-primary/10 text-primary border-l-2 border-primary -ml-[1px]' : 'hover:bg-base-300/50 text-base-content/80' }} py-2 text-base flex items-center gap-2 rounded-r-lg transition-colors">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? '' : 'opacity-60' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="{{ request()->routeIs('dashboard') ? 'font-medium' : '' }}">Dashboard</span>
                </a>
            </li>
            
            <!-- Projects -->
            <li>
                <details {{ request()->routeIs('roadmap', 'meeting-notes', 'objectives') ? 'open' : '' }}>
                    <summary class="hover:bg-base-300/50 py-2 text-base">
                        <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                        </svg>
                        <span class="font-medium text-base">Projects</span>
                    </summary>

                    <ul class="ml-3 pl-3 border-l border-base-300/50 space-y-1 mt-1">
                        <li>
                            <a href="{{ route('roadmap') }}" class="{{ request()->routeIs('roadmap') ? 'active bg-primary/10 text-primary border-l-2 border-primary -ml-[13px] rounded-none rounded-r-lg font-medium' : 'hover:bg-base-300/50 opacity-80 hover:opacity-100 -ml-[11px]' }} py-2 text-base transition-colors">
                                🚀 Roadmap 2026
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('meeting-notes') }}" class="{{ request()->routeIs('meeting-notes') ? 'active bg-primary/10 text-primary border-l-2 border-primary -ml-[13px] rounded-none rounded-r-lg font-medium' : 'hover:bg-base-300/50 opacity-80 hover:opacity-100 -ml-[11px]' }} py-2 text-base transition-colors">
                                📝 Meeting Notes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('objectives') }}" class="{{ request()->routeIs('objectives') ? 'active bg-primary/10 text-primary border-l-2 border-primary -ml-[13px] rounded-none rounded-r-lg font-medium' : 'hover:bg-base-300/50 opacity-80 hover:opacity-100 -ml-[11px]' }} py-2 text-base transition-colors">
                                🎯 Objectives
                            </a>
                        </li>
                    </ul>
                </details>
            </li>

            <div class="divider my-2 px-2 h-0 opacity-50"></div>

            <!-- Trash -->
            <li>
                <a href="{{ route('trash') }}" class="{{ request()->routeIs('trash') ? 'bg-error/10 text-error border-l-2 border-error -ml-[1px]' : 'hover:bg-error/10 hover:text-error text-base-content/70' }} transition-colors py-2 text-base flex items-center gap-2 rounded-r-lg">
                    <svg class="w-5 h-5 {{ request()->routeIs('trash') ? '' : 'opacity-60' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    <span class="{{ request()->routeIs('trash') ? 'font-medium' : '' }}">Trash</span>
                </a>
            </li>

        </ul>
    </div>

    <!-- Profile -->
    <div class="px-3 pb-3 pt-2 border-t border-base-300 bg-base-200/50">
        <div class="dropdown dropdown-top w-full">
            <div tabindex="0" role="button" class="btn btn-ghost w-full flex items-center justify-start px-2 py-2 h-auto hover:bg-base-300/80">

                <div class="avatar">
                    <div class="w-10 rounded-full ring ring-primary/30 ring-offset-base-100 ring-offset-1">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=random" />
                    </div>
                </div>

                <div class="flex flex-col ml-3 flex-1 text-left overflow-hidden">
                    <span class="text-base font-semibold truncate">Admin Workspace</span>
                    <span class="text-xs font-medium text-base-content/50 uppercase tracking-wide mt-0.5">Pro Plan</span>
                </div>

                <svg class="w-5 h-5 ml-2 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>

            <ul tabindex="0" class="dropdown-content menu p-2 shadow-xl bg-base-100 rounded-box w-full mb-2 border border-base-300 space-y-1">
                <li>
                    <a href="#" class="hover:bg-primary/10 hover:text-primary flex items-center gap-2 text-base">
                        <svg class="w-5 h-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="#" class="hover:bg-primary/10 hover:text-primary flex items-center gap-2 text-base">
                        <svg class="w-5 h-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0"/>
                        </svg>
                        Settings & Billing
                    </a>
                </li>

                <div class="divider my-1"></div>

                <li>
                    <a href="#" class="text-error hover:bg-error/10 flex items-center gap-2 text-base">
                        <svg class="w-5 h-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4"/>
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

</aside>