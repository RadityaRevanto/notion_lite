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

        <div class="flex items-center gap-3">
            <!-- Search -->
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
        </div>
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
                        <th class="font-semibold uppercase tracking-widest text-[11px]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-base-200/30 transition-colors group">
                        <td class="text-base-content/50 text-xs font-medium">1</td>
                        <td>PBW-01</td>
                        <td> Pemograman Web Lanjut</td>
                        <td>
                            <div class="join border border-base-300 shadow-sm rounded-lg opacity-80 group-hover:opacity-100 transition-opacity">
                                <button class="btn btn-sm btn-ghost join-item px-2 tooltip tooltip-top" data-tip="Edit">
                                    <svg class="w-4 h-4 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="btn btn-sm btn-ghost join-item px-2 hover:bg-error/20 hover:text-error tooltip tooltip-top" data-tip="Hapus">
                                    <svg class="w-4 h-4 text-base-content/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
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