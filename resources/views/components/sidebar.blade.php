<aside class="w-64 min-h-screen bg-base-200 text-base-content border-r border-base-300 flex flex-col transition-all duration-300 text-base leading-relaxed" id="sidebar">

    <!-- Brand / Logo -->
    <div class="p-4 flex items-center justify-center border-b border-base-300 bg-base-200/50">
        <a class="flex items-center gap-2 font-bold text-2xl normal-case hover:opacity-80 transition-opacity" href="{{ route('master-tutorial') }}">
            <span>Notion<span class="text-primary">App</span></span>
        </a>
    </div>

    <!-- Navigation -->
    <div class="flex-1 overflow-y-auto w-full px-2">
        <ul class="menu w-full gap-1">

            <!-- Title -->
            <li class="menu-title text-sm uppercase tracking-wide font-semibold flex flex-row items-center justify-between mt-2 py-1">
                Workspace
            </li>

            <li class="mt-2">
                <a href="{{ route('master-tutorial') }}" class="{{ request()->routeIs('master-tutorial') ? 'bg-primary/10 text-primary border-l-2 border-primary -ml-[1px]' : 'hover:bg-base-300/50 text-base-content/80' }} py-2 text-base flex items-center gap-2 rounded-r-lg transition-colors">
                    <svg class="w-5 h-5 {{ request()->routeIs('master-tutorial') ? '' : 'opacity-60' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="{{ request()->routeIs('master-tutorial') ? 'font-medium' : '' }}">Master Tutorial</span>
                </a>
            </li>

            <li class="mt-2">
                <a href="{{ route('mata-kuliah') }}" class="{{ request()->routeIs('mata-kuliah') ? 'bg-primary/10 text-primary border-l-2 border-primary -ml-[1px]' : 'hover:bg-base-300/50 text-base-content/80' }} py-2 text-base flex items-center gap-2 rounded-r-lg transition-colors">
                    <svg class="w-5 h-5 {{ request()->routeIs('mata-kuliah') ? '' : 'opacity-60' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="{{ request()->routeIs('mata-kuliah') ? 'font-medium' : '' }}">Mata Kuliah</span>
                </a>
            </li>
            <div class="divider my-2 px-2 h-0 opacity-50"></div>
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
                    <span class="text-base font-semibold truncate">{{ session('user_email') }}</span>
                    {{-- <span class="text-xs font-medium text-base-content/50 uppercase tracking-wide mt-0.5">Pro Plan</span> --}}
                </div>

                <svg class="w-5 h-5 ml-2 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
        <ul tabindex="0" class="dropdown-content menu p-2 shadow-xl bg-base-100 rounded-box w-full mb-2 border border-base-300 space-y-1">
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-error hover:bg-error/10 flex items-center gap-2 text-base w-full text-left px-2 py-2">
                        <svg class="w-5 h-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
        </div>
    </div>

</aside>
