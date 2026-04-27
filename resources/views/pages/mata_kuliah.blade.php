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
</div>
@endsection