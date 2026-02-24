@extends('layouts.app')

@section('header', 'Manajemen SDM')

@section('content')
    <div class="mb-8">
        <a href="{{ route('team-members.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">
            <i class="ph ph-arrow-left text-base"></i> Kembali ke Direktori
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-6 mb-8 text-sm flex gap-4 items-start">
            <i class="ph ph-warning-circle text-2xl shrink-0 mt-0.5"></i>
            <div>
                <p class="font-bold uppercase tracking-widest text-[10px] mb-2">Kesalahan Validasi</p>
                <ul class="list-disc pl-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="bg-white border border-zinc-200 shadow-sm overflow-hidden">
        <div class="border-b border-zinc-200 px-8 py-6 flex justify-between items-center bg-zinc-50/50">
            <div>
                <h3 class="font-serif text-2xl text-zinc-900 tracking-tight">Perbarui Profil Anggota</h3>
                <p class="text-xs text-zinc-500 mt-1">Ubah informasi atau pasfoto untuk anggota tim: <span class="font-bold text-zinc-900">{{ $teamMember->name }}</span>.</p>
            </div>
            <i class="ph ph-pencil-simple text-3xl text-zinc-300"></i>
        </div>

        <form action="{{ route('team-members.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data" class="p-8 group">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-6">
                
                <div class="md:col-span-4 flex flex-col items-center justify-start border-b md:border-b-0 md:border-r border-zinc-200 pb-8 md:pb-0 md:pr-8">
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-6 text-center w-full">Pasfoto Profil</label>
                    
                    <div class="relative w-48 h-48 rounded-full border-2 border-dashed border-zinc-300 bg-zinc-50 hover:bg-zinc-100 hover:border-zinc-900 transition-colors duration-300 flex justify-center items-center overflow-hidden shadow-inner group/avatar">
                        
                        <input type="file" name="image" id="imageInput" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="previewAvatar(event)">
                        
                        @if($teamMember->image)
                            <img id="imagePreview" src="{{ asset('storage/' . $teamMember->image) }}" alt="Pratinjau Lama" class="absolute inset-0 w-full h-full object-cover z-10 group-hover/avatar:opacity-40 transition-opacity duration-300">
                            
                            <div id="uploadPlaceholder" class="text-center z-10 pointer-events-none opacity-0 group-hover/avatar:opacity-100 transition-opacity duration-300 drop-shadow-md">
                                <i class="ph ph-arrows-clockwise text-4xl text-zinc-900 mb-2"></i>
                                <p class="text-[10px] text-zinc-900 font-bold uppercase tracking-widest bg-white/80 px-2 py-1 rounded">Ganti Foto</p>
                            </div>
                        @else
                            <div id="uploadPlaceholder" class="text-center z-10 pointer-events-none px-2 flex flex-col items-center">
                                <i class="ph ph-camera-plus text-4xl text-zinc-400 mb-2"></i>
                                <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest">Unggah</p>
                            </div>
                            <img id="imagePreview" src="#" alt="Pratinjau Baru" class="absolute inset-0 w-full h-full object-cover hidden z-10">
                        @endif
                    </div>
                    
                    <p class="text-[10px] text-zinc-400 mt-6 text-center leading-relaxed font-medium">Format: JPG/PNG.<br>Biarkan kosong jika tidak ingin mengubah foto.</p>
                </div>

                <div class="md:col-span-8 space-y-8">
                    
                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-user text-zinc-400 text-lg"></i>
                            </div>
                            <input type="text" name="name" value="{{ old('name', $teamMember->name) }}" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="Contoh: Dimas Ramadhan">
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-lg"></i>
                                <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-lg"></i>
                            </div>
                        </div>
                        <p class="mt-2 text-[10px] font-bold text-red-500 hidden peer-invalid:block uppercase tracking-widest">Peringatan: Kolom nama wajib diisi.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Jabatan / Peran <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-briefcase text-zinc-400 text-lg"></i>
                            </div>
                            <input type="text" name="role" value="{{ old('role', $teamMember->role) }}" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="Contoh: Head Barista">
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-lg"></i>
                                <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-lg"></i>
                            </div>
                        </div>
                        <p class="mt-2 text-[10px] font-bold text-red-500 hidden peer-invalid:block uppercase tracking-widest">Peringatan: Kolom jabatan wajib diisi.</p>
                    </div>
                    
                    <div class="bg-zinc-50 border border-zinc-200 p-5 flex items-start gap-4">
                        <i class="ph ph-info text-zinc-500 text-xl shrink-0"></i>
                        <p class="text-xs text-zinc-600 leading-relaxed">Perubahan data ini akan langsung direfleksikan pada halaman situs web perusahaan.</p>
                    </div>
                </div>

            </div>

            <div class="flex items-center justify-end gap-4 pt-8 border-t border-zinc-200 mt-4">
                <a href="{{ route('team-members.index') }}" class="px-6 py-3 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">Batal</a>
                <button type="submit" class="bg-zinc-900 text-white px-8 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300 flex items-center gap-2 group-invalid:bg-zinc-300 group-invalid:text-zinc-500 group-invalid:cursor-not-allowed">
                    Perbarui Data <i class="ph ph-floppy-disk text-base"></i>
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewAvatar(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('uploadPlaceholder');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    
                    // Modifikasi tampilan placeholder untuk state "telah dipilih"
                    placeholder.innerHTML = '<i class="ph ph-arrows-clockwise text-4xl text-zinc-900 mb-2"></i><p class="text-[10px] text-zinc-900 font-bold uppercase tracking-widest bg-white/80 px-2 py-1 rounded">Ganti Foto</p>';
                    placeholder.classList.add('opacity-0', 'group-hover/avatar:opacity-100', 'drop-shadow-md');
                    preview.classList.add('group-hover/avatar:opacity-40', 'transition-opacity', 'duration-300');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection