@extends('layouts.app')
@section('content')
<div class="w-full text-left pb-10">
    <!-- Header Section -->
    <section class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <h1 class="text-3xl font-extrabold tracking-tight">Daftar Mata Kuliah</h1>
            </div>
            <p class="text-sm text-base-content/60">Daftar kode dan nama mata kuliah yang tersedia.</p>
        </div>

        <!-- <div class="flex items-center gap-3">
            <div class="form-control relative hidden sm:block">
                <input type="text" placeholder="Cari kode / nama MK..." class="input input-sm input-bordered border-base-300 bg-base-200/50 focus:bg-base-100 pl-9 w-48 xl:w-64 transition-all" />
                <svg class="w-4 h-4 absolute left-3 top-2.5 text-base-content/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <button class="btn btn-sm bg-indigo-600 hover:bg-indigo-700 text-white border-none shadow-[0_4px_14px_0_rgba(79,70,229,0.39)] no-animation" onclick="document.getElementById('modal_tambah_mk').showModal()">
                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Mata Kuliah
            </button>
        </div> -->
    </section>

    <!-- Content Table -->
    <div class="card bg-base-100 border border-base-300 shadow-sm rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-zebra table-md w-full">
                <!-- head -->
                <thead class="bg-base-200/50 text-base-content/60 border-b border-base-300">
                    <tr>
                        <th class="font-semibold uppercase tracking-widest text-[11px] w-12">No</th>
                        <th class="font-semibold uppercase tracking-widest text-[11px] w-1/4">Kode Mata Kuliah</th>
                        <th class="font-semibold uppercase tracking-widest text-[11px]">Nama Mata Kuliah</th>
                        <!-- <th class="font-semibold uppercase tracking-widest text-[11px]">Aksi</th> -->
                    </tr>
                </thead>
        <tbody>
            @forelse ($matkul as $index => $item)
                <tr class="hover:bg-base-200/30 transition-colors group">
                    <td class="text-base-content/50 text-xs font-medium">
                        {{ $index + 1 }}
                    </td>
                    <td>{{ $item['kdmk'] }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <!-- <td>
                        <div class="join border border-base-300 shadow-sm rounded-lg">
                            <button class="btn btn-sm btn-ghost join-item">Edit</button>
                            <button class="btn btn-sm btn-ghost join-item text-error">Hapus</button>
                        </div>
                    </td> -->
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-base-content/50">
                        Data tidak ditemukan
                    </td>
                </tr>
            @endforelse
        </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-base-200 bg-base-100 flex items-center justify-between">
            <span class="text-xs text-base-content/50 font-medium uppercase tracking-wider">
                Menampilkan 1 Data Mata Kuliah
            </span>
            <div class="join shadow-sm border border-base-200">
                <button class="join-item btn btn-xs btn-ghost">&laquo;</button>
                <button class="join-item btn btn-xs btn-ghost bg-base-200 font-bold">1</button>
                <button class="join-item btn btn-xs btn-ghost">&raquo;</button>
            </div>
        </div>
    </div>

    <!-- MODAL: Tambah Mata Kuliah -->
    <dialog id="modal_tambah_mk" class="modal modal-bottom sm:modal-middle backdrop-blur-sm">
        <div class="modal-box bg-base-100 shadow-2xl rounded-2xl border border-base-300/60 p-0 overflow-hidden">
            <!-- Header Modal -->
            <div class="bg-base-200/50 px-6 py-4 border-b border-base-300">
                <h3 class="font-extrabold text-lg flex items-center gap-2">
                    <div class="p-1.5 bg-indigo-500/10 rounded-lg text-indigo-500">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    Tambah Mata Kuliah Baru
                </h3>
            </div>

            <form action="#" method="POST" class="p-6 space-y-5">
                @csrf

                <div class="form-control w-full">
                    <label class="label pb-1">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Kode Mata Kuliah</span>
                    </label>
                    <input type="text" name="kode" placeholder="Contoh: IT102" class="input input-sm h-10 input-bordered border-base-300 bg-base-100 focus:border-primary transition-all shadow-sm" required />
                </div>

                <div class="form-control w-full">
                    <label class="label pb-1">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Nama Mata Kuliah</span>
                    </label>
                    <input type="text" name="nama" placeholder="Contoh: Pemrograman Web Lanjut" class="input input-sm h-10 input-bordered border-base-300 bg-base-100 focus:border-primary transition-all shadow-sm" required />
                </div>

                <div class="modal-action mt-6 border-t border-base-200 pt-5 flex justify-end gap-2">
                    <button type="button" class="btn btn-sm h-9 px-6 bg-base-200 hover:bg-base-300 border-none font-semibold text-base-content/70 transition-colors" onclick="document.getElementById('modal_tambah_mk').close()">Batal</button>
                    <button type="submit" class="btn btn-sm h-9 px-6 bg-indigo-600 hover:bg-indigo-700 text-white shadow-[0_4px_14px_0_rgba(79,70,229,0.39)] border-none font-semibold transition-all">Simpan Data</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-base-content/20">
            <button>close</button>
        </form>
    </dialog>
</div>
@endsection