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
            <!-- <div class="form-control relative hidden sm:block">
                <input type="text" placeholder="Cari judul / kode MK..." class="input input-sm input-bordered border-base-300 bg-base-200/50 focus:bg-base-100 pl-9 w-48 xl:w-64 transition-all" />
                <svg class="w-4 h-4 absolute left-3 top-2.5 text-base-content/40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </div> -->
            
            <button class="btn btn-sm bg-indigo-600 hover:bg-indigo-700 text-white border-none " onclick="document.getElementById('modal_tambah_tutorial').showModal()">
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
                @forelse ($tutorials as $item)
                <tr>
                    <td>
                        <div class="font-bold text-sm">{{ $item->judul }}</div>
                        <span class="text-xs">Created: {{ $item->created_at->format('d M Y') }}</span>
                    </td>

                    <td>{{ $item->kdmk }}</td>

                    <td>{{ $item->creator_email }}</td>

                    <td>
                        <a href="{{ url($item->presentation_url) }}" class="text-primary">Presentation</a><br>
                        <a href="{{ url($item->finished_url) }}" class="text-secondary">PDF</a>
                    </td>

                    <td class="text-right flex items-center justify-end gap-2">
                        <a href="{{ route('detail_tutorial', $item->id) }}" class="btn btn-sm">Detail</a>
                        <form action="{{ route('tutorial.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus tutorial ini beserta semua detailnya?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-error">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data</td>
                </tr>
                @endforelse
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
            
            <form action="{{ route('tutorial.store') }}" method="POST">
                @csrf
                <div class="form-control w-full">
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Judul Tutorial</span></label>
                    <input name="judul" type="text" placeholder="Ketikkan judul tutorial presentasi..." class="input input-sm h-10 input-bordered border-base-300 bg-base-100 focus:border-primary transition-all shadow-sm" required />
                </div>

                <div class="form-control w-full">
                    <label class="label pb-1">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Kode Mata Kuliah</span>
                        <span class="label-text-alt text-success flex items-center gap-1 font-semibold">
                            <span class="relative flex h-1.5 w-1.5"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success opacity-75"></span><span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-success"></span></span>
                            API Webservice Connected
                        </span>
                    </label>
                    <select name="kdmk" class="select select-sm h-10 select-bordered w-full" required>
                        <option disabled selected>-- Pilih Data Mengambil Dari API --</option>

                        @foreach ($matkuls as $mk)
                            <option value="{{ $mk['kdmk'] }}">
                                {{ $mk['kdmk'] }} - {{ $mk['nama'] }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-control w-full">
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Email Creator</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-base-content/40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input type="email" value="{{ session('user_email') }}" class="input input-sm h-10 input-bordered border-base-300 bg-base-200 text-base-content/70 w-full pl-9" readonly />
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
