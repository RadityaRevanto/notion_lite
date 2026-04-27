<!DOCTYPE html>
<html lang="id" data-theme="corporate">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Presentasi Tutorial: {{ $tutorial->judul }}">
    <title>{{ $tutorial->judul }} — Presentasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-100 text-base-content antialiased my-40">

 <div class="max-w-4xl mx-auto px-16 sm:px-20 ">
            <div class="group relative">
                <!-- Judul -->
                <h1 class="w-full bg-transparent text-4xl sm:text-5xl font-extrabold text-base-content outline-none border-none px-0 mb-4">
                    {{ $tutorial->judul }}
                </h1>
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
            <div class="space-y-6 gap-4">
                @foreach($details as $d)

                @if($d->type === 'text')
                <div class="py-1 px-4 -mx-4 rounded-lg">
                    <div class="prose">
                        {!! nl2br(e($d->content)) !!}
                    </div>
                </div>

                @elseif($d->type === 'code')
                <div class="py-4 px-4 -mx-4 rounded-lg">
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

                @elseif($d->type === 'image')
                <div class="py-4 px-4 -mx-4 rounded-lg">
                    <img src="{{ asset('storage/'.$d->image_path) }}" class="rounded-xl">
                    <figcaption class="text-center text-sm mt-2 text-base-content/50">{{ $d->caption }}</figcaption>
                </div>

                @elseif($d->type === 'url')
                <div class="py-2 px-4 -mx-4 rounded-lg">
                    <a href="{{ $d->url }}" target="_blank"
                        class="flex items-center gap-2 p-3 rounded-lg border border-base-300 hover:border-indigo-400/50 hover:bg-indigo-500/5 transition-all group/url">
                        <svg class="w-4 h-4 text-indigo-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        <span class="text-sm text-base-content/70 group-hover/url:text-indigo-500 truncate transition-colors">{{ $d->url }}</span>
                    </a>
                </div>
                @endif

                @endforeach

                @if($details->isEmpty())
                <div class="text-center py-20">
                    <div class="text-6xl mb-4">📭</div>
                    <h3 class="text-xl font-bold text-base-content/60 mb-2">Belum Ada Konten</h3>
                    <p class="text-base-content/40">Tutorial ini belum memiliki langkah yang dipublikasikan.</p>
                </div>
                @endif

                <!-- Footer -->
                <div class="pt-8">
                    <div class="divider text-base-content/30 text-sm font-bold uppercase tracking-widest my-4">Akhir Presentasi</div>
                </div>
            </div>
        </div>

</body>
</html>
