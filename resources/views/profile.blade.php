@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Profil SMK Negeri 4 Kota Bogor</h1>

    {{-- Tentang Kami --}}
    @foreach($profiles as $profile)
        @if($profile->judul == "Tentang Kami")
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8 text-center">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $profile->judul }}</h2>
                <div class="prose max-w-none mx-auto">
                    {!! nl2br(e($profile->isi)) !!}
                </div>
                <div class="text-sm text-gray-500 mt-4">
                    Dibuat pada: {{ \Carbon\Carbon::parse($profile->created_at)->format('d M Y') }}
                </div>
            </div>
        </div>
        @endif
    @endforeach

    {{-- Sambutan Kepala Sekolah --}}
    @foreach($profiles as $profile)
        @if($profile->judul == "Sambutan Kepala Sekolah")
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8 flex flex-col lg:flex-row items-center">
            {{-- Foto Kepala Sekolah --}}
            <div class="w-full lg:w-1/3">
                <img src="{{ asset('images/kepala_sekolah.jpg') }}" 
                     alt="Foto Kepala Sekolah" 
                     class="w-full h-full object-cover">
            </div>

            {{-- Isi Sambutan --}}
            <div class="p-6 w-full lg:w-2/3">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $profile->judul }}</h2>
                <div class="prose max-w-none">
                    {!! nl2br(e($profile->isi)) !!}
                </div>
                <div class="text-sm text-gray-500 mt-4">
                    Dibuat pada: {{ \Carbon\Carbon::parse($profile->created_at)->format('d M Y') }}
                </div>
            </div>
        </div>
        @endif
    @endforeach

    {{-- Visi --}}
    @foreach($profiles as $profile)
        @if($profile->judul == "Visi")
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8 text-center">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $profile->judul }}</h2>
                <div class="prose max-w-none mx-auto">
                    {!! nl2br(e($profile->isi)) !!}
                </div>
                <div class="text-sm text-gray-500 mt-4">
                    Dibuat pada: {{ \Carbon\Carbon::parse($profile->created_at)->format('d M Y') }}
                </div>
            </div>
        </div>
        @endif
    @endforeach

    {{-- Misi --}}
    @foreach($profiles as $profile)
        @if($profile->judul == "Misi")
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8 text-center">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $profile->judul }}</h2>
                <div class="prose max-w-none mx-auto">
                    {!! nl2br(e($profile->isi)) !!}
                </div>
                <div class="text-sm text-gray-500 mt-4">
                    Dibuat pada: {{ \Carbon\Carbon::parse($profile->created_at)->format('d M Y') }}
                </div>
            </div>
        </div>
        @endif
    @endforeach
    {{-- Jurusan --}}
<div class="bg-gray-100 py-12">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Jurusan di SMK Negeri 4 Kota Bogor</h2>
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        {{-- PPLG --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden text-center">
            <img src="{{ asset('images/logo-pplg.png') }}" 
                 alt="Logo PPLG" 
                 class="w-full h-32 object-contain bg-gray-200 p-4">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">PPLG</h3>
                <button onclick="toggleDetails('pplg-details')" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                    Baca Selengkapnya
                </button>
                <div id="pplg-details" class="hidden mt-4 bg-gray-50 p-4 rounded shadow">
                    <p class="text-gray-600">
                        Rekayasa Perangkat Lunak (PPLG) mempersiapkan siswa untuk menjadi programmer, desainer aplikasi, dan pengembang perangkat lunak yang profesional.
                    </p>
                </div>
            </div>
        </div>

        {{-- TJKT --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden text-center">
            <img src="{{ asset('images/logo-tjkt.png') }}" 
                 alt="Logo TJKT" 
                 class="w-full h-32 object-contain bg-gray-200 p-4">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">TJKT</h3>
                <button onclick="toggleDetails('tjkt-details')" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                    Baca Selengkapnya
                </button>
                <div id="tjkt-details" class="hidden mt-4 bg-gray-50 p-4 rounded shadow">
                    <p class="text-gray-600">
                        Teknik Jaringan Komputer dan Telekomunikasi (TJKT) mengajarkan siswa untuk menguasai teknologi jaringan komputer dan telekomunikasi.
                    </p>
                </div>
            </div>
        </div>

        {{-- Teknik Otomotif --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden text-center">
            <img src="{{ asset('images/logo-to.png') }}" 
                 alt="Logo Teknik Otomotif" 
                 class="w-full h-32 object-contain bg-gray-200 p-4">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Teknik Otomotif</h3>
                <button onclick="toggleDetails('otomotif-details')" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                    Baca Selengkapnya
                </button>
                <div id="otomotif-details" class="hidden mt-4 bg-gray-50 p-4 rounded shadow">
                    <p class="text-gray-600">
                        Teknik Otomotif membekali siswa dengan keterampilan perbaikan dan perawatan kendaraan bermotor, baik roda dua maupun roda empat.
                    </p>
                </div>
            </div>
        </div>

        {{-- TPFL --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden text-center">
            <img src="{{ asset('images/logo-tpfl.png') }}" 
                 alt="Logo TPFL" 
                 class="w-full h-32 object-contain bg-gray-200 p-4">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">TPFL</h3>
                <button onclick="toggleDetails('tpfl-details')" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                    Baca Selengkapnya
                </button>
                <div id="tpfl-details" class="hidden mt-4 bg-gray-50 p-4 rounded shadow">
                    <p class="text-gray-600">
                        Teknik Pengelasan dan Fabrikasi Logam (TPFL) mengajarkan keterampilan dalam teknik pengelasan dan fabrikasi logam.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDetails(id) {
        const element = document.getElementById(id);
        element.classList.toggle('hidden');
    }
</script>

</div>
@endsection
