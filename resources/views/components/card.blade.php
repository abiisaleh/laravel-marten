<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="detail/{{ $id }}">
        <img class="rounded-t-lg" src="storage/{{ $gambar }}" alt="" />
    </a>
    <div class="p-5 text-left">
        <a href="detail/{{ $id }}">
            <h5 class="mb-2 text-xl  font-bold tracking-tight text-gray-900 dark:text-white">{!! $nama !!}</h5>
        </a>

        <span class="bg-primary-100 text-primary-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $kelurahan }} • {{ $kecamatan }}</span>
        
        <p class="mb-3 mt-2 font-normal text-gray-700 dark:text-gray-400 text-sm">
            📍 {{ $alamat }}
        </p>
    </div>
</div>