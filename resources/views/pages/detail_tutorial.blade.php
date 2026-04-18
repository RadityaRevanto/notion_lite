@extends('layouts.app')

@section('content')
<div class="w-full text-left pb-20">
    
    <!-- Top Bar Navigation (Fixed or Absolute inside content) -->
    <div class="mb-8 flex items-center justify-between pb-4">
        <a href="{{ route('master-tutorial') }}" class="btn btn-sm btn-ghost gap-2 text-base-content/70 hover:text-primary pl-1">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Kembali
        </a>
        <div class="badge badge-success badge-outline gap-1 shadow-sm font-medium">
            <span class="w-1.5 h-1.5 rounded-full bg-success animate-pulse"></span>
            Tersimpan
        </div>
    </div>

    <!-- NOTION-LIKE EDITOR CONTAINER -->
    <div class="max-w-4xl  mx-auto px-16 sm:px-20">
        
        <!-- Document Header -->
        <div class="group relative">
     
            <!-- Cover / Icon placeholder -->
            <input type="text" value="Laragon & VSCode Setup untuk Pemula" class="w-full bg-transparent text-4xl sm:text-5xl font-extrabold text-base-content placeholder-base-content/30 outline-none border-none focus:ring-0 px-0 mb-4" placeholder="Judul Tutorial Kosong..." readonly>
            <div class="flex items-center gap-4 text-sm font-bold text-base-content/50 uppercase tracking-widest  pb-6">
                <span>Kode MK: <span class="text-info">IT102</span></span>
                <span>•</span>
                <span>Creator: admin@notion.app</span>
                <span>•</span>
                <span>Ditambahkan: 24 Okt 2026</span>
            </div>
        </div>

        <!-- BLOCKS CONTAINER -->
        <div class="space-y-6">

            <!-- Block 1: TEXT FORMATTING -->
            <div class="group py-1 px-4 -mx-4 rounded-lg hover:bg-base-200/30 transition-colors">
                <!-- Action Bar & Meta Indicators -->
                <div class="flex items-center gap-3 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <!-- Actions -->
                    <div class="flex items-center gap-1">
                        <button class="p-1 text-base-content/30 hover:bg-base-300 rounded cursor-grab" title="Drag to reorder">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.5 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm7-7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                        </button>
                        <button class="p-1 text-base-content/30 hover:bg-info/20 hover:text-info rounded" title="Edit Step" onclick="openModal('text')">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </button>
                        <button class="p-1 text-base-content/30 hover:bg-error/20 hover:text-error rounded" title="Hapus Step">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                    
                    <!-- Meta Indicators -->
                    <div class="flex items-center gap-2 text-xs font-bold tracking-wider uppercase text-base-content/40">
                        <span class="bg-base-300 text-base-content/70 px-1.5 py-0.5 rounded">Tipe: Text</span>
                        <span class="bg-success/10 text-success px-1.5 py-0.5 rounded">Status: Show</span>
                        <span>Order: 1</span>
                    </div>
                </div>
                
                <div class="w-full">
                    <div class="prose prose-base sm:prose-lg max-w-none text-base-content/90 leading-relaxed outline-none" contenteditable="false">
                        <p>Mari kita mulai dengan mengunduh Laragon versi terbaru. Laragon sangat ringan dan cepat karena berjalan di lingkungan <code>isolated</code>. Pastikan Anda mengunduh edisi **Full** agar sudah termasuk Apache, Nginx, MySQL, dan PHP versi terbaru.</p>
                    </div>
                </div>
            </div>

            <!-- Block 2: CODE SNIPPET -->
            <div class="group py-4 px-4 -mx-4 rounded-lg hover:bg-base-200/30 transition-colors">
                <div class="flex items-center gap-3 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <!-- Actions -->
                    <div class="flex items-center gap-1">
                        <button class="p-1 text-base-content/30 hover:bg-base-300 rounded cursor-grab">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.5 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm7-7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                        </button>
                        <button class="p-1 text-base-content/30 hover:bg-info/20 hover:text-info rounded" title="Edit Step" onclick="openModal('code')">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </button>
                        <button class="p-1 text-base-content/30 hover:bg-error/20 hover:text-error rounded">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                    
                    <!-- Meta Indicators -->
                    <div class="flex items-center gap-2 text-xs font-bold tracking-wider uppercase text-base-content/40">
                        <span class="bg-base-300 text-base-content/70 px-1.5 py-0.5 rounded">Tipe: Code</span>
                        <span class="bg-success/10 text-success px-1.5 py-0.5 rounded">Status: Show</span>
                        <span>Order: 2</span>
                    </div>
                </div>
                
                <div class="w-full relative">
                    <div class="mockup-code bg-[#1e1e1e] text-base overflow-hidden text-left shadow-lg scale-100 border border-[#333] pt-6">
                        <!-- Language Badge -->
                        <!-- <div class="absolute top-2 right-4 text-sm font-mono text-base-content/40">bash</div> -->
                        <pre data-prefix=">" class="text-warning"><code>Bash</code></pre>
                        <pre data-prefix="$" class="text-success"><code>composer create-project laravel/laravel my-app</code></pre>
                        <pre data-prefix=">" class="text-warning"><code>Installing laravel/laravel (v11.x)</code></pre>
                        <pre data-prefix=">" class="text-warning"><code>Created project in /path/my-app</code></pre>
                        <pre data-prefix="$"><code>cd my-app</code></pre>
                        <pre data-prefix="$"><code>php artisan serve</code></pre>
                    </div>
                </div>
            </div>

            <!-- Block 3: IMAGE -->
            <div class="group py-4 px-4 -mx-4 rounded-lg hover:bg-base-200/30 transition-colors">
                <div class="flex items-center gap-3 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <!-- Actions -->
                    <div class="flex items-center gap-1">
                        <button class="p-1 text-base-content/30 hover:bg-base-300 rounded cursor-grab">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.5 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm7-7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                        </button>
                        <button class="p-1 text-base-content/30 hover:bg-info/20 hover:text-info rounded" title="Edit Step" onclick="openModal('image')">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </button>
                        <button class="p-1 text-base-content/30 hover:bg-error/20 hover:text-error rounded">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                    
                    <!-- Meta Indicators -->
                    <div class="text-xs font-bold tracking-wider uppercase text-base-content/40 flex items-center gap-2">
                        <span class="bg-base-300 text-base-content/70 px-1.5 py-0.5 rounded">Tipe: Image</span>
                        <span class="bg-base-300 text-base-content/50 px-1.5 py-0.5 rounded">Status: Hide (Draft)</span>
                        <span>Order: 3</span>
                    </div>
                </div>
                
                <div class="w-full">
                    <figure class="rounded-xl overflow-hidden shadow-sm border border-base-300 max-h-[400px] bg-base-200/50 flex items-center justify-center opacity-70 grayscale-[30%]">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Laragon Settings" class="object-cover w-full h-full" />
                    </figure>
                    <figcaption class="text-center text-sm text-base-content/50 mt-2 font-medium">Buka panel menu Preferences pada Laragon.</figcaption>
                </div>
            </div>

            <!-- Block 4: URL MATCHING/EMBED -->
            <div class="group py-2 px-4 -mx-4 rounded-lg hover:bg-base-200/30 transition-colors">
                <div class="flex items-center gap-3 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <!-- Actions -->
                    <div class="flex items-center gap-1">
                        <button class="p-1 text-base-content/30 hover:bg-base-300 rounded cursor-grab">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.5 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm7-7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                        </button>
                        <button class="p-1 text-base-content/30 hover:bg-info/20 hover:text-info rounded" title="Edit Step" onclick="openModal('url')">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </button>
                        <button class="p-1 text-base-content/30 hover:bg-error/20 hover:text-error rounded">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                    
                    <!-- Meta Indicators -->
                    <div class="flex items-center gap-2 text-xs font-bold tracking-wider uppercase text-base-content/40">
                        <span class="bg-base-300 text-base-content/70 px-1.5 py-0.5 rounded">Tipe: URL</span>
                        <span class="bg-success/10 text-success px-1.5 py-0.5 rounded">Status: Show</span>
                        <span>Order: 4</span>
                    </div>
                </div>
                
                <div class="w-full">
                    <a href="https://marketplace.visualstudio.com" target="_blank" class="block w-full rounded-xl border border-base-300 hover:bg-base-200/50 transition-colors overflow-hidden group/link">
                        <div class="flex items-stretch h-36">
                            <div class="flex-1 p-5 flex flex-col justify-center">
                                <h4 class="font-bold text-base sm:text-lg text-base-content group-hover/link:text-primary transition-colors line-clamp-1">VS Code Marketplace - Extensions</h4>
                                <p class="text-sm text-base-content/70 mt-1 line-clamp-2">Temukan dan install plugin keren yang akan mempermudah alur kerja Anda di Laravel, seperti PHP Intelephense.</p>
                                <span class="text-xs uppercase font-bold text-base-content/40 mt-4 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                    marketplace.visualstudio.com
                                </span>
                            </div>
                            <div class="w-1/4 sm:w-1/3 bg-base-300 relative shrink-0">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Visual_Studio_Code_1.35_icon.svg" class="absolute inset-0 w-full h-full object-contain p-4 opacity-50" />
                            </div>
                        </div>
                    </a>
                </div>
            </div>

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

    <!-- MODAL: Input Block Detail -->
    <dialog id="modal_input_step" class="modal modal-bottom sm:modal-middle backdrop-blur-sm">
        <div class="modal-box bg-base-100 shadow-2xl rounded-2xl border border-base-300/60 p-0 overflow-hidden w-11/12 max-w-6xl">
            <!-- Header Modal -->
            <div class="bg-base-200/50 px-6 py-4 border-b border-base-300 flex justify-between items-center">
                <h3 class="font-extrabold text-lg flex items-center gap-2">
                    <div class="p-1.5 bg-indigo-500/10 rounded-lg text-indigo-500">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
                    </div>
                    <span>Edit Tipe: <span id="modal_title_text">Teks Paragraf</span></span>
                </h3>
            </div>
            
            <form action="#" method="dialog" class="p-6 space-y-5">
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="form-control w-full justify-end">
                        <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Tipe Block</span></label>
                        <select id="select_tipe_block" class="select select-sm h-10 select-bordered border-base-300 bg-base-100 focus:border-primary shadow-sm" required onchange="toggleBlockInput()">
                            <option value="text" selected>📝 Text Paragraph</option>
                            <option value="image">🖼️ Upload Gambar</option>
                            <option value="code">💻 Code Snippet</option>
                            <option value="url">🔗 URL Bookmark</option>
                        </select>
                    </div>

                    <div class="form-control w-full justify-end">
                        <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Urutan</span></label>
                        <input type="number" value="1" class="input input-sm h-10 input-bordered border-base-300 bg-base-100 focus:border-primary shadow-sm" required />
                    </div>

                    <div class="form-control w-full justify-end">
                        <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Status Tampil</span></label>
                        <select class="select select-sm h-10 select-bordered border-base-300 bg-base-100 focus:border-primary shadow-sm" required>
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
                            <div class="divider divider-horizontal mx-0 w-1"></div>
                            <button type="button" class="btn btn-xs btn-ghost btn-square"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg></button>
                        </div>
                        <textarea class="textarea textarea-bordered border-none focus:ring-0 w-full h-64 rounded-none resize-none font-sans text-base leading-relaxed" placeholder="Tulis instruksi langkah ini disini..."></textarea>
                    </div>
                </div>

                <!-- TYPE: IMAGE -->
                <div id="input_type_image" class="form-control w-full hidden transition-all">
                    <label class="label pb-1">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Upload Gambar</span>
                    </label>
                    <input type="file" class="file-input file-input-bordered w-full shadow-sm" />
                    
                    <label class="label pb-1 mt-4">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Caption Gambar (Opsional)</span>
                    </label>
                    <input type="text" class="input input-bordered w-full shadow-sm" placeholder="Contoh: Tampilan layar dashboard..." />
                </div>

                <!-- TYPE: CODE -->
                <div id="input_type_code" class="form-control w-full hidden transition-all">
                    <div class="w-1/3 mb-4">
                        <label class="label pb-1"><span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Bahasa Pemrograman</span></label>
                        <input type="text" class="input input-sm h-10 input-bordered w-full shadow-sm font-mono" placeholder="Contoh: bash, html, php" value="bash" />
                    </div>
                    
                    <label class="label pb-1">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">Script Kode</span>
                    </label>
                    <textarea class="textarea textarea-bordered font-mono bg-[#1e1e1e] text-base-content/80 text-sm h-64 w-full shadow-sm" placeholder="Tulis atau paste baris kode di sini..."></textarea>
                </div>

                <!-- TYPE: URL -->
                <div id="input_type_url" class="form-control w-full hidden transition-all">
                    <label class="label pb-1">
                        <span class="label-text font-bold text-[11px] tracking-widest uppercase text-base-content/70">URL Tautan</span>
                    </label>
                    <input type="url" class="input input-bordered w-full shadow-sm" placeholder="https://..." />
                </div>

                <div class="modal-action mt-6 border-t border-base-200 pt-5 flex justify-end gap-2">
                    <button type="button" class="btn btn-sm h-9 px-6 bg-base-200 hover:bg-base-300 border-none font-semibold text-base-content/70 transition-colors" onclick="document.getElementById('modal_input_step').close()">Batal</button>
                    <button type="submit" class="btn btn-sm h-9 px-6 bg-indigo-600 hover:bg-indigo-700 text-white shadow-[0_4px_14px_0_rgba(79,70,229,0.39)] border-none font-semibold transition-all">Simpan Step</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-base-content/20">
            <button>close</button>
        </form>
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
                if(el) {
                    if(t === type) {
                        el.classList.remove('hidden');
                    } else {
                        el.classList.add('hidden');
                    }
                }
            });

            // Update title
            const titles = {
                'text': 'Teks Paragraf',
                'image': 'Upload Gambar',
                'code': 'Code Snippet',
                'url': 'Tautan URL'
            };
            const titleEl = document.getElementById('modal_title_text');
            if(titleEl && titles[type]) titleEl.innerText = titles[type];
        }
    </script>
</div>
@endsection
