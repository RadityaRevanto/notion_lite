@extends('layouts.app')
@section('content')

<div class="w-full text-left pb-20">
    <!-- Top Bar Navigation (Fixed or Absolute inside content) -->
    <div class="mb-8 flex items-center justify-between pb-4">
        <a href="{{ route('master-tutorial') }}" class="btn btn-sm btn-ghost gap-2 text-base-content/70 hover:text-primary pl-1">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Kembali
        </a>
    </div>
    <!-- NOTION-LIKE EDITOR CONTAINER -->
<div class="max-w-4xl  mx-auto px-16 sm:px-20">

    <div class="group relative">
        <!-- Judul -->
        <input type="text"
            value="{{ $tutorial->judul }}"
            class="w-full bg-transparent text-4xl sm:text-5xl font-extrabold text-base-content outline-none border-none px-0 mb-4"
            readonly>
        <!-- Meta -->
        <div class="flex items-center gap-4 text-sm font-bold text-base-content/50 uppercase tracking-widest pb-6">
            <span>
                Kode MK:
                <span class="text-info">{{ $tutorial->kdmk }}</span>
            </span>
            <span>•</span>
            <span>
                Creator: {{ $tutorial->creator_email }}
            </span>
            <span>•</span>
            <span>
                Ditambahkan:
                {{ $tutorial->created_at->format('d M Y') }}
            </span>
        </div>
    </div>
        <!-- BLOCKS CONTAINER -->
        <div class="space-y-6">
            @foreach($details as $d)
            {{-- TEXT --}}
            @if($d->type === 'text')
            <div class="group py-1 px-4 -mx-4 rounded-lg hover:bg-base-200/30 transition-colors">
                <div class="flex items-center gap-3 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase text-base-content/40">
                        <span class="bg-base-300 px-1.5 py-0.5 rounded">Tipe: Text</span>
                        <span class="{{ $d->status=='show' ? 'text-success' : 'text-base-content/50' }}">Status: {{ $d->status }}</span>
                    </div>
                    <div class="ml-auto flex items-center gap-1">
                        <button type="button" title="Edit"
                            onclick="openEditModal({{ $d->id }}, 'text', {{ $d->step_order }}, '{{ $d->status }}', {{ json_encode($d->content) }}, '', '', '', '')"
                            class="btn btn-xs btn-ghost gap-1 text-indigo-400 hover:text-indigo-600 hover:bg-indigo-500/10">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Edit
                        </button>
                        <form action="{{ route('detail.delete', $d->id) }}" method="POST" onsubmit="return confirm('Hapus block ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" title="Hapus" class="btn btn-xs btn-ghost text-error hover:bg-error/10">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="prose">
                    {{$d->content}}
                </div>
            </div>

            {{-- CODE --}}
            @elseif($d->type === 'code')
            <div class="group py-4 px-4 -mx-4 rounded-lg hover:bg-base-200/30">
                <div class="flex items-center gap-2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="flex items-center gap-1 text-xs font-bold uppercase text-base-content/40">
                        <span class="bg-base-300 px-1.5 py-0.5 rounded">Tipe: Code</span>
                        <span class="font-mono text-base-content/40">{{ $d->language }}</span>
                        <span class="{{ $d->status=='show' ? 'text-success' : 'text-base-content/50' }}">Status: {{ $d->status }}</span>
                    </div>
                    <div class="ml-auto flex items-center gap-1">
                        <button type="button" title="Edit"
                            onclick="openEditModal({{ $d->id }}, 'code', {{ $d->step_order }}, '{{ $d->status }}', '', {{ json_encode($d->content) }}, {{ json_encode($d->language ?? 'bash') }}, '', '')"
                            class="btn btn-xs btn-ghost gap-1 text-indigo-400 hover:text-indigo-600 hover:bg-indigo-500/10">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Edit
                        </button>
                        <form action="{{ route('detail.delete', $d->id) }}" method="POST" onsubmit="return confirm('Hapus block ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" title="Hapus" class="btn btn-xs btn-ghost text-error hover:bg-error/10">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="rounded-xl bg-[#1e1e1e] overflow-hidden shadow-2xl">
                    <div class="flex items-center gap-2 px-4 py-3 bg-[#2d2d2d] border-b border-[#404040]">
                        <div class="flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-[#ff5f57]"></span>
                            <span class="w-3 h-3 rounded-full bg-[#febc2e]"></span>
                            <span class="w-3 h-3 rounded-full bg-[#28c840]"></span>
                        </div>
                        <span class="ml-2 text-xs text-white/40 font-mono">{{ $d->language ?? 'code' }}</span>
                    </div>
                    <div class="p-5 overflow-x-auto">
                        <pre class="font-mono text-sm text-white/90 leading-relaxed"><code>{{ $d->content }}</code></pre>
                    </div>
                </div>
            </div>

            {{-- IMAGE --}}
            @elseif($d->type === 'image')
            <div class="group py-4 px-4 -mx-4 rounded-lg hover:bg-base-200/30">
                <div class="flex items-center gap-2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="flex items-center gap-1 text-xs font-bold uppercase text-base-content/40">
                        <span class="bg-base-300 px-1.5 py-0.5 rounded">Tipe: Image</span>
                        <span class="{{ $d->status=='show' ? 'text-success' : 'text-base-content/50' }}">Status: {{ $d->status }}</span>
                    </div>
                    <div class="ml-auto flex items-center gap-1">
                        <button type="button" title="Edit"
                            onclick="openEditModal({{ $d->id }}, 'image', {{ $d->step_order }}, '{{ $d->status }}', '', '', '', {{ json_encode($d->caption ?? '') }}, '')"
                            class="btn btn-xs btn-ghost gap-1 text-indigo-400 hover:text-indigo-600 hover:bg-indigo-500/10">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Edit
                        </button>
                        <form action="{{ route('detail.delete', $d->id) }}" method="POST" onsubmit="return confirm('Hapus block ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" title="Hapus" class="btn btn-xs btn-ghost text-error hover:bg-error/10">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
                <img src="{{ asset('storage/'.$d->image_path) }}" class="rounded-xl">
                <figcaption class="text-center text-sm mt-2 text-base-content/50">{{ $d->caption }}</figcaption>
            </div>

            {{-- URL --}}
            @elseif($d->type === 'url')
            <div class="group py-2 px-4 -mx-4 rounded-lg hover:bg-base-200/30">
                <div class="flex items-center gap-2 mb-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="flex items-center gap-1 text-xs font-bold uppercase text-base-content/40">
                        <span class="bg-base-300 px-1.5 py-0.5 rounded">Tipe: URL</span>
                        <span class="{{ $d->status=='show' ? 'text-success' : 'text-base-content/50' }}">Status: {{ $d->status }}</span>
                    </div>
                    <div class="ml-auto flex items-center gap-1">
                        <button type="button" title="Edit"
                            onclick="openEditModal({{ $d->id }}, 'url', {{ $d->step_order }}, '{{ $d->status }}', '', '', '', '', {{ json_encode($d->url ?? '') }})"
                            class="btn btn-xs btn-ghost gap-1 text-indigo-400 hover:text-indigo-600 hover:bg-indigo-500/10">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Edit
                        </button>
                        <form action="{{ route('detail.delete', $d->id) }}" method="POST" onsubmit="return confirm('Hapus block ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" title="Hapus" class="btn btn-xs btn-ghost text-error hover:bg-error/10">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
                <a href="{{ $d->url }}" target="_blank"
                    class="flex items-center gap-2 p-3 rounded-lg border border-base-300 hover:border-indigo-400/50 hover:bg-indigo-500/5 transition-all group/url">
                    <svg class="w-4 h-4 text-indigo-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    <span class="text-sm text-base-content/70 group-hover/url:text-indigo-500 truncate transition-colors">{{ $d->url }}</span>
                </a>
            </div>
            @endif

            @endforeach

            <!-- ADD BLOCK / STEP BUTTON -->
            <div class="pt-8">
                <div class="divider text-base-content/30 text-sm font-bold uppercase tracking-widest my-4">Akhir Tutorial</div>
                <div class="dropdown w-full">
                    <div tabindex="0" role="button" class="btn btn-ghost w-full flex items-center gap-2 text-lg text-base-content/50 hover:text-indigo-500 hover:bg-indigo-500/10 border border-dashed border-base-300 hover:border-indigo-500/50 min-h-[60px]">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Step Detail Baru
                    </div>
                    <ul tabindex="0" class="dropdown-content mt-2 z-[1] menu p-2 shadow-xl bg-base-100 rounded-box border border-base-300 w-56 font-medium">
                        <li class="menu-title py-1 px-3 text-[10px] tracking-widest uppercase">Pilih Tipe Block</li>
                        <li><a onclick="openModal('text')"><span class="text-xl w-6 text-center">📝</span> Text Paragraph</a></li>
                        <li><a onclick="openModal('image')"><span class="text-xl w-6 text-center">🖼️</span> Upload Gambar</a></li>
                        <li><a onclick="openModal('code')"><span class="text-xl w-6 text-center">💻</span> Code Snippet</a></li>
                        <li><a onclick="openModal('url')"><span class="text-xl w-6 text-center">🔗</span> URL Bookmark</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: Tambah Block Detail (Store) -->
    <dialog id="modal_input_step" class="modal modal-bottom sm:modal-middle backdrop-blur-sm">
        <div class="modal-box bg-base-100 shadow-2xl rounded-2xl border border-base-300/60 p-0 overflow-hidden w-11/12 max-w-6xl">
            <!-- Header Modal -->
            <div class="bg-base-200/50 px-6 py-4 border-b border-base-300 flex justify-between items-center">
                <h3 class="font-extrabold text-lg flex items-center gap-2">
                    <div class="p-1.5 bg-indigo-500/10 rounded-lg text-indigo-500">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                    </div>
                    <span>Tambah Block: <span id="modal_title_text">Teks Paragraf</span></span>
                </h3>
            </div>
            <form action="{{ route('detail.store', $tutorial->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                    <div class="form-control w-full justify-end">
                        <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Tipe Block</span></label>
                        <select name="type" id="select_tipe_block" class="select select-sm h-10 select-bordered border-base-300 bg-base-100 focus:border-primary shadow-sm" required onchange="toggleBlockInput()">
                            <option value="text" selected>Text Paragraph</option>
                            <option value="image">Upload Gambar</option>
                            <option value="code">Code Snippet</option>
                            <option value="url">URL Bookmark</option>
                        </select>
                    </div>
                    <div class="form-control w-full justify-end">
                        <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Status Tampil</span></label>
                        <select name="status" class="select select-sm h-10 select-bordered border-base-300 bg-base-100 focus:border-primary shadow-sm" required>
                            <option value="show" selected>Show</option>
                            <option value="hide">Hide</option>
                        </select>
                    </div>
                </div>
                <!-- TYPE: TEXT -->
                <div id="input_type_text" class="form-control w-full transition-all">
                    <label class="label pb-1">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Konten Detail</span>
                        <span class="label-text-alt text-base-content/50">Mendukung Markdown</span>
                    </label>
                    <div class="border border-base-300 rounded-lg overflow-hidden shadow-sm">
                        <div class="bg-base-200/50 border-b border-base-300 px-3 py-2 flex items-center gap-1">
                            <button type="button" class="btn btn-xs btn-ghost btn-square font-bold">B</button>
                            <button type="button" class="btn btn-xs btn-ghost btn-square italic font-serif">I</button>
                            <button type="button" class="btn btn-xs btn-ghost btn-square underline">U</button>
                        </div>
                        <textarea name="content" class="textarea textarea-bordered border-none focus:ring-0 w-full h-64 rounded-none resize-none font-sans text-base leading-relaxed" placeholder="Tulis instruksi langkah ini disini..."></textarea>
                    </div>
                </div>
                <!-- TYPE: IMAGE -->
                <div id="input_type_image" class="form-control w-full hidden transition-all">
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Upload Gambar</span></label>
                    <input type="file" name="image" class="file-input file-input-bordered w-full shadow-sm" />
                    <label class="label pb-1 mt-4"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Caption Gambar (Opsional)</span></label>
                    <input type="text" name="caption" class="input input-bordered w-full shadow-sm" placeholder="Contoh: Tampilan layar dashboard..." />
                </div>
                <!-- TYPE: CODE -->
                <div id="input_type_code" class="form-control w-full hidden transition-all">
                    <div class="w-1/3 mb-4">
                        <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Bahasa Pemrograman</span></label>
                        <input type="text" name="language" class="input input-sm h-10 input-bordered w-full shadow-sm font-mono" placeholder="Contoh: bash, html, php" value="bash" />
                    </div>
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Script Kode</span></label>
                    <textarea name="code" class="textarea textarea-bordered font-mono bg-[#1e1e1e] text-base-content/80 text-sm h-64 w-full shadow-sm" placeholder="Tulis atau paste baris kode di sini..."></textarea>
                </div>
                <!-- TYPE: URL -->
                <div id="input_type_url" class="form-control w-full hidden transition-all">
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">URL Tautan</span></label>
                    <input type="url" name="url" class="input input-bordered w-full shadow-sm" placeholder="https://..." />
                </div>
                <div class="modal-action mt-6 border-t border-base-200 pt-5 flex justify-end gap-2">
                    <button type="button" class="btn btn-sm h-9 px-6 bg-base-200 hover:bg-base-300 border-none font-semibold text-base-content/70 transition-colors" onclick="document.getElementById('modal_input_step').close()">Batal</button>
                    <button type="submit" class="btn btn-sm h-9 px-6 bg-indigo-600 hover:bg-indigo-700 text-white shadow-[0_4px_14px_0_rgba(79,70,229,0.39)] border-none font-semibold transition-all">Simpan Step</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-base-content/20"><button>close</button></form>
    </dialog>

    <!-- MODAL: Edit Block Detail -->
    <dialog id="modal_edit_step" class="modal modal-bottom sm:modal-middle backdrop-blur-sm">
        <div class="modal-box bg-base-100 shadow-2xl rounded-2xl border border-base-300/60 p-0 overflow-hidden w-11/12 max-w-6xl">
            <!-- Header -->
            <div class="bg-base-200/50 px-6 py-4 border-b border-base-300 flex justify-between items-center">
                <h3 class="font-extrabold text-lg flex items-center gap-2">
                    <div class="p-1.5 bg-indigo-500/10 rounded-lg text-indigo-500">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <span>Edit Block: <span id="edit_modal_title">—</span></span>
                </h3>
                <span id="edit_modal_badge" class="badge badge-outline  text-xs font-bold uppercase tracking-widest">text</span>
            </div>

            <form id="form_edit_detail" action="" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">

                    <div class="form-control w-full">
                        <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Status Tampil</span></label>
                        <select id="edit_status" name="status" class="select select-sm h-10 select-bordered border-base-300 bg-base-100 focus:border-indigo-400 shadow-sm" required>
                            <option value="show">Show</option>
                            <option value="hide">Hide</option>
                        </select>
                    </div>
                </div>

                <!-- EDIT TYPE: TEXT -->
                <div id="edit_input_text" class="form-control w-full hidden">
                    <label class="label pb-1">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Konten Teks</span>
                        <span class="label-text-alt text-base-content/40">Mendukung Markdown</span>
                    </label>
                    <div class="border border-base-300 rounded-lg overflow-hidden shadow-sm">
                        <div class="bg-base-200/50 border-b border-base-300 px-3 py-2 flex items-center gap-1">
                            <button type="button" class="btn btn-xs btn-ghost btn-square font-bold">B</button>
                            <button type="button" class="btn btn-xs btn-ghost btn-square italic font-serif">I</button>
                            <button type="button" class="btn btn-xs btn-ghost btn-square underline">U</button>
                        </div>
                        <textarea id="edit_content" name="content" class="textarea textarea-bordered border-none focus:ring-0 w-full h-64 rounded-none resize-none font-sans text-base leading-relaxed" placeholder="Tulis konten teks..."></textarea>
                    </div>
                </div>

                <!-- EDIT TYPE: CODE -->
                <div id="edit_input_code" class="form-control w-full hidden">
                    <div class="w-1/3 mb-4">
                        <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Bahasa Pemrograman</span></label>
                        <input type="text" id="edit_language" name="language" class="input input-sm h-10 input-bordered w-full shadow-sm font-mono" placeholder="bash, php, html..." />
                    </div>
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Script Kode</span></label>
                    <textarea id="edit_code" name="code" class="textarea textarea-bordered font-mono bg-[#1e1e1e] text-base-content/80 text-sm h-64 w-full shadow-sm" placeholder="Paste kode di sini..."></textarea>
                </div>

                <!-- EDIT TYPE: IMAGE -->
                <div id="edit_input_image" class="form-control w-full hidden">
                    <div id="edit_image_preview" class="mb-4 hidden">
                        <p class="text-xs font-bold uppercase text-base-content/40 mb-1">Gambar Saat Ini</p>
                        <img id="edit_image_preview_img" src="" class="h-32 rounded-lg object-cover border border-base-300" />
                    </div>
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Ganti Gambar (Opsional)</span></label>
                    <input type="file" name="image" class="file-input file-input-bordered w-full shadow-sm" />
                    <label class="label pb-1 mt-4"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Caption Gambar</span></label>
                    <input type="text" id="edit_caption" name="caption" class="input input-bordered w-full shadow-sm" placeholder="Caption untuk gambar..." />
                </div>

                <!-- EDIT TYPE: URL -->
                <div id="edit_input_url" class="form-control w-full hidden">
                    <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">URL Tautan</span></label>
                    <input type="url" id="edit_url" name="url" class="input input-bordered w-full shadow-sm" placeholder="https://..." />
                </div>

                <div class="modal-action mt-6 border-t border-base-200 pt-5 flex justify-end gap-2">
                    <button type="button" class="btn btn-sm h-9 px-6 bg-base-200 hover:bg-base-300 border-none font-semibold text-base-content/70 transition-colors" onclick="document.getElementById('modal_edit_step').close()">Batal</button>
                    <button type="submit" class="btn btn-sm h-9 px-6 bg-indigo-500 hover:bg-indigo-600 text-white  border-none font-semibold transition-all">Simpan Perubahan</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-base-content/20"><button>close</button></form>
    </dialog>

    <script>
        function openModal(type) {
            document.getElementById('select_tipe_block').value = type;
            toggleBlockInput();
            document.getElementById('modal_input_step').showModal();
        }

        function toggleBlockInput() {
            const type = document.getElementById('select_tipe_block').value;
            const types = ['text', 'image', 'code', 'url'];
            types.forEach(t => {
                const el = document.getElementById('input_type_' + t);
                if (el) el.classList.toggle('hidden', t !== type);
            });
            const titles = { text: 'Teks Paragraf', image: 'Upload Gambar', code: 'Code Snippet', url: 'Tautan URL' };
            const titleEl = document.getElementById('modal_title_text');
            if (titleEl && titles[type]) titleEl.innerText = titles[type];
        }

        function openEditModal(id, type, stepOrder, status, textContent, codeContent, language, caption, url) {
            const titles = { text: 'Teks Paragraf', image: 'Upload Gambar', code: 'Code Snippet', url: 'Tautan URL' };

            // Set form action to PUT route
            document.getElementById('form_edit_detail').action = '/detail/' + id;

            // Fill meta fields
            const statusSel = document.getElementById('edit_status');
            statusSel.value = status;

            // Update modal title & badge
            document.getElementById('edit_modal_title').innerText = titles[type] || type;
            document.getElementById('edit_modal_badge').innerText = type;

            // Show only relevant block input
            const types = ['text', 'image', 'code', 'url'];
            types.forEach(t => {
                document.getElementById('edit_input_' + t).classList.toggle('hidden', t !== type);
            });

            // Pre-fill values
            if (type === 'text') {
                document.getElementById('edit_content').value = textContent;
            }
            if (type === 'code') {
                document.getElementById('edit_code').value = codeContent;
                document.getElementById('edit_language').value = language;
            }
            if (type === 'image') {
                document.getElementById('edit_caption').value = caption;
            }
            if (type === 'url') {
                document.getElementById('edit_url').value = url;
            }

            document.getElementById('modal_edit_step').showModal();
        }
    </script>
</div>

@endsection
