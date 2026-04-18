@extends('layouts.app')

@section('content')
<div class="w-full text-left pb-10">
    <!-- Header Section -->
    <section class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <h1 class="text-3xl font-extrabold tracking-tight">Manajemen Master Tutorial</h1>
            </div>
            <p class="text-sm text-base-content/60">Kelola master tutorial, mata kuliah (Webservice API), dan URL Presentasi.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <!-- Search -->
            <div class="form-control relative hidden sm:block">
                <input type="text" placeholder="Cari judul / kode MK..." class="input input-sm input-bordered border-base-300 bg-base-200/50 focus:bg-base-100 pl-9 w-48 xl:w-64 transition-all" />
                <svg class="w-4 h-4 absolute left-3 top-2.5 text-base-content/40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </div>
            
            <button class="btn btn-sm bg-indigo-600 hover:bg-indigo-700 text-white border-none shadow-[0_4px_14px_0_rgba(79,70,229,0.39)] no-animation" onclick="document.getElementById('modal_tambah_tutorial').showModal()">
                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Buat Tutorial Baru
            </button>
        </div>
    </section>

    <!-- Content Table -->
    <div class="card bg-base-100 border border-base-300 shadow-sm rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-zebra table-md w-full">
                <!-- head -->
                <thead class="bg-base-200/50 text-base-content/60 border-b border-base-300">
                    <tr>
                        <th class="font-semibold uppercase tracking-widest text-[11px] w-1/3">Detail Tutorial</th>
                        <th class="font-semibold uppercase tracking-widest text-[11px]">Mata Kuliah</th>
                        <th class="font-semibold uppercase tracking-widest text-[11px]">Creator</th>
                        <th class="font-semibold uppercase tracking-widest text-[11px]">Public URL</th>
                        <th class="font-semibold uppercase tracking-widest text-[11px] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr class="hover:bg-base-200/30 transition-colors group">
                        <td>
                            <div class="font-bold text-sm tracking-tight text-base-content group-hover:text-primary transition-colors">Laragon & VSCode Setup untuk Pemula</div>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-[10px] bg-base-200 px-1.5 py-0.5 rounded text-base-content/60 font-medium">Created: 24 Okt 2026</span>
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-info badge-outline border-info/30 bg-info/5 text-xs font-semibold gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                IT102
                            </div>
                        </td>
                        <td>
                            <div class="flex flex-col">
                                <span class="text-xs font-medium">admin@notion.app</span>
                            </div>
                        </td>
                        <td>
                            <div class="flex flex-col gap-1.5">
                                <a href="#" class="text-[11px] font-medium flex items-center gap-1 text-primary hover:underline hover:opacity-80">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    View Presentation
                                </a>
                                <a href="#" class="text-[11px] font-medium flex items-center gap-1 text-secondary hover:underline hover:opacity-80">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                    Download PDF (Finished)
                                </a>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="join border border-base-300 shadow-sm rounded-lg opacity-80 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('detail-tutorial') }}" class="btn btn-sm btn-ghost join-item px-2 tooltip tooltip-top" data-tip="Manajemen Detail Tutorial (Steps)">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
                                </a>
                                <button class="btn btn-sm btn-ghost join-item px-2 tooltip tooltip-top pointer-events-auto" data-tip="Edit Master">
                                    <svg class="w-4 h-4 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </button>
                                <button class="btn btn-sm btn-ghost join-item px-2 hover:bg-error/20 hover:text-error tooltip tooltip-top" data-tip="Hapus Master">
                                    <svg class="w-4 h-4 text-base-content/60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Placeholder -->
        <div class="px-4 py-3 border-t border-base-200 bg-base-100 flex items-center justify-between">
            <span class="text-xs text-base-content/50 font-medium uppercase tracking-wider">Menampilkan 1 dari 1 Master Data</span>
            <div class="join shadow-sm border border-base-200">
                <button class="join-item btn btn-xs btn-ghost">&laquo;</button>
                <button class="join-item btn btn-xs btn-ghost bg-base-200 font-bold">1</button>
                <button class="join-item btn btn-xs btn-ghost">&raquo;</button>
            </div>
        </div>
    </div>

    <!-- MODAL: Tambah Tutorial -->
    <dialog id="modal_tambah_tutorial" class="modal modal-bottom sm:modal-middle backdrop-blur-sm">
        <div class="modal-box bg-base-100 shadow-2xl rounded-2xl border border-base-300/60 p-0 overflow-hidden">
            <!-- Header Modal -->
            <div class="bg-base-200/50 px-6 py-4 border-b border-base-300">
                <h3 class="font-extrabold text-lg flex items-center gap-2">
                    <div class="p-1.5 bg-indigo-500/10 rounded-lg text-indigo-500">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    Tambah Master Tutorial Baru
                </h3>
            </div>
            
            <form action="#" method="dialog" class="p-6 space-y-5">
                
                <div class="form-control w-full">
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Judul Tutorial</span></label>
                    <input type="text" placeholder="Ketikkan judul tutorial presentasi..." class="input input-sm h-10 input-bordered border-base-300 bg-base-100 focus:border-primary transition-all shadow-sm" required />
                </div>

                <div class="form-control w-full">
                    <label class="label pb-1">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Kode Mata Kuliah</span>
                        <span class="label-text-alt text-success flex items-center gap-1 font-semibold">
                            <span class="relative flex h-1.5 w-1.5"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success opacity-75"></span><span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-success"></span></span>
                            API Webservice Connected
                        </span>
                    </label>
                    <select class="select select-sm h-10 select-bordered border-base-300 bg-base-100 focus:border-primary shadow-sm" required>
                        <option disabled selected>-- Pilih Data Mengambil Dari API --</option>
                        <option>IT102 - Pemrograman Web Lanjut</option>
                        <option>IT304 - Web Service Terapan</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control w-full">
                        <label class="label pb-1">
                            <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">URL Presentasi</span>
                        </label>
                        <div class="join w-full shadow-sm">
                            <span class="join-item btn btn-sm h-10 bg-base-200 border border-base-300 text-base-content/50 pointer-events-none px-2 text-xs">/p/</span>
                            <input type="text" placeholder="Auto-generated UUID" class="join-item input input-sm h-10 input-bordered border-base-300 bg-base-100 focus:border-primary w-full" readonly/>
                        </div>
                    </div>
                    <div class="form-control w-full">
                        <label class="label pb-1">
                            <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">URL Finished (PDF)</span>
                        </label>
                        <div class="join w-full shadow-sm">
                            <span class="join-item btn btn-sm h-10 bg-base-200 border border-base-300 text-base-content/50 pointer-events-none px-2 text-xs">/f/</span>
                            <input type="text" placeholder="Auto-generated UUID" class="join-item input input-sm h-10 input-bordered border-base-300 bg-base-100 focus:border-primary w-full" readonly/>
                        </div>
                    </div>
                </div>

                <div class="form-control w-full">
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Email Creator</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-base-content/40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input type="email" value="admin@notion.app" class="input input-sm h-10 input-bordered border-base-300 bg-base-200 text-base-content/70 w-full pl-9" readonly />
                    </div>
                </div>

                <div class="modal-action mt-6 border-t border-base-200 pt-5 flex justify-end gap-2">
                    <button type="button" class="btn btn-sm h-9 px-6 bg-base-200 hover:bg-base-300 border-none font-semibold text-base-content/70 transition-colors" onclick="document.getElementById('modal_tambah_tutorial').close()">Batal</button>
                    <button type="submit" class="btn btn-sm h-9 px-6 bg-indigo-600 hover:bg-indigo-700 text-white shadow-[0_4px_14px_0_rgba(79,70,229,0.39)] border-none font-semibold transition-all">Simpan Master Data</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-base-content/20">
            <button>close</button>
        </form>
    </dialog>

</div>
@endsection
