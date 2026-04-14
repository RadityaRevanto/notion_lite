@extends('layouts.app')

@section('content')
<div class="w-full text-left">
    <!-- Header -->
    <section class="mb-6 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-extrabold mb-1 tracking-tight">Dashboard Overview</h1>
            <p class="text-sm text-base-content/60">Statistik dan performa aplikasi Anda saat ini.</p>
        </div>
        <button class="btn btn-sm btn-primary btn-outline hidden sm:flex">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
            Refresh
        </button>
    </section>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Card 1: Total Tutorial -->
        <div class="card bg-base-200/60 border border-base-300 shadow-sm rounded-xl hover:shadow-md transition-shadow">
            <div class="card-body p-5">
                <div class="flex justify-between items-start">
                    <h3 class="text-[11px] font-bold text-base-content/60 uppercase tracking-widest pt-0.5">Total Tutorial</h3>
                    <div class="text-primary opacity-80">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </div>
                </div>
                <div class="mt-2 text-3xl font-extrabold text-base-content relative group">
                    0
                </div>
            </div>
        </div>

        <!-- Card 2: Total Detail -->
        <div class="card bg-base-200/60 border border-base-300 shadow-sm rounded-xl hover:shadow-md transition-shadow">
            <div class="card-body p-5">
                <div class="flex justify-between items-start">
                    <h3 class="text-[11px] font-bold text-base-content/60 uppercase tracking-widest pt-0.5">Total Detail</h3>
                    <div class="text-indigo-500 opacity-80">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" /></svg>
                    </div>
                </div>
                <div class="mt-2 text-3xl font-extrabold text-base-content">
                    0
                </div>
            </div>
        </div>

        <!-- Card 3: Mata Kuliah -->
        <div class="card bg-base-200/60 border border-base-300 shadow-sm rounded-xl hover:shadow-md transition-shadow">
            <div class="card-body p-5">
                <div class="flex justify-between items-start">
                    <h3 class="text-[11px] font-bold text-base-content/60 uppercase tracking-widest pt-0.5">Mata Kuliah</h3>
                    <div class="text-blue-500 opacity-80">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                </div>
                <div class="mt-2 text-3xl font-extrabold text-base-content">
                    0
                </div>
            </div>
        </div>

        <!-- Card 4: Status Show -->
        <div class="card bg-base-200/60 border border-base-300 shadow-sm rounded-xl hover:shadow-md transition-shadow">
            <div class="card-body p-5">
                <div class="flex justify-between items-start">
                    <h3 class="text-[11px] font-bold text-base-content/60 uppercase tracking-widest pt-0.5">Status Show</h3>
                    <div class="text-success opacity-80">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    </div>
                </div>
                <div class="mt-2 text-3xl font-extrabold text-base-content">
                    0
                </div>
            </div>
        </div>

    </div>

    <!-- Tutorial Terbaru Section -->
    <section class="mt-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-[12px] font-bold text-base-content/60 uppercase tracking-widest">Tutorial Terbaru</h2>
            <a href="#" class="text-indigo-500 hover:text-indigo-600 text-sm font-semibold transition-colors flex items-center gap-1">
                Lihat Semua <span class="text-lg leading-none">&rarr;</span>
            </a>
        </div>
        
        <div class="card bg-base-200/40 border border-base-300 shadow-sm rounded-2xl w-full py-16 flex items-center justify-center">
            <div class="text-center p-4">
                <div class="text-base-content/20 mb-3 flex justify-center">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                </div>
                <h3 class="text-base font-bold text-base-content/70 mb-1">Belum ada tutorial</h3>
                <p class="text-sm text-base-content/40 mb-6">Mulai buat tutorial pertama Anda</p>
                <button class="btn bg-[#6366f1] hover:bg-[#4f46e5] text-white border-none shadow-[0_4px_14px_0_rgba(99,102,241,0.39)] rounded-lg px-6 font-semibold min-h-[40px] h-[40px]">
                    + Buat Tutorial Baru
                </button>
            </div>
        </div>
    </section>
</div>
@endsection
