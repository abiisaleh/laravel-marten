@extends('template')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
        
<h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Rekomendasi</h1>
<p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Berikut merupakan hasil perhitungan rekomendasi cafe sesuai kriteria yang didapatkan menggunakan algoritma Simple Multi Attribute Rating Technique (SMART). </p>

  <div id="accordion-collapse" class="my-5" data-accordion="collapse">
    <h2 id="accordion-collapse-heading-1">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
        <span>Menentukan Kriteria</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
      <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
        <p class="mb-2 text-gray-500 dark:text-gray-400">Kriteria-kriteria yang digunakan dalam menentukan pemilihan Cafe yaitu:</p>
        
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3" width="10px">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kriteria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bobot
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Normalisasi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($kriteria as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            K{{$i++}}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nama }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->bobot }}
                        </td>
                        <td class="px-6 py-4">
                            {{ round($normalisasi[$i - 2], 3) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      </div>
    </div>
    <h2 id="accordion-collapse-heading-2">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
        <span>Mencari Data Alternatif</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
      <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
        <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3" width="10px">
                      #
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Cafe
                  </th>
                  <th scope="col" class="px-6 py-3">
                      K1
                  </th>
                  <th scope="col" class="px-6 py-3">
                      K2
                  </th>
                  <th scope="col" class="px-6 py-3">
                      K3
                  </th>
                  <th scope="col" class="px-6 py-3">
                      K4
                  </th>
                  <th scope="col" class="px-6 py-3">
                      K5
                  </th>
              </tr>
          </thead>
          <tbody>
              @php
                  $i = 1
              @endphp
              @foreach ($alternatif as $item)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <td class="px-6 py-4">
                      {{$i++}}
                  </td>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $item['nama'] }}
                  </th>
                  <td class="px-6 py-4">
                      {{ $item['nilai'][0] }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $item['nilai'][1] }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $item['nilai'][2] }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $item['nilai'][3] }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $item['nilai'][4] }}
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <h2 id="accordion-collapse-heading-4">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
        <span>Menghitung Nilai Utility</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
      <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
        <p class="mb-2 text-gray-500 dark:text-gray-400">Menentukan nilai akhir dari masing-masing kriteria dengan mengalihkan nilai yang didapat dari hasil normalisasi bobot kriteria dan hasil nilai utility. Kemudian jumlahkan hasil dari perkalian nilai normalisasi dan utility.</p>
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                          Cafe
                      </th>
                      <th scope="col" class="px-6 py-3">
                          U1
                      </th>
                      <th scope="col" class="px-6 py-3">
                          U2
                      </th>
                      <th scope="col" class="px-6 py-3">
                          U3
                      </th>
                      <th scope="col" class="px-6 py-3">
                          U4
                      </th>
                      <th scope="col" class="px-6 py-3">
                          U5
                      </th>
                      <th scope="col" class="px-6 py-3">
                          UW1
                      </th>
                      <th scope="col" class="px-6 py-3">
                          UW2
                      </th>
                      <th scope="col" class="px-6 py-3">
                          UW3
                      </th>
                      <th scope="col" class="px-6 py-3">
                          UW4
                      </th>
                      <th scope="col" class="px-6 py-3">
                          UW5
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @php
                      $i = 0
                  @endphp
                  @foreach ($alternatif as $item)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $item['nama'] }}
                      </td>
                      <th scope="row" class="px-6 py-4">
                          {{ round($utility[$i][0],3) }}
                      </th>
                      <th scope="row" class="px-6 py-4">
                          {{ round($utility[$i][1],3) }}
                      </th>
                      <th scope="row" class="px-6 py-4">
                          {{ round($utility[$i][2],3) }}
                      </th>
                      <th scope="row" class="px-6 py-4">
                          {{ round($utility[$i][3],3) }}
                      </th>
                      <th scope="row" class="px-6 py-4">
                          {{ round($utility[$i][4],3) }}
                      </th>
                      <th scope="row" class="px-6 py-4">
                          {{ round($uw[$i][0],3) }}
                      </th>
                      <th scope="row" class="px-6 py-4">
                          {{ round($uw[$i][1],3) }}
                      </th>
                      <th scope="row" class="px-6 py-4">
                          {{ round($uw[$i][2],3) }}
                      </th>
                      <th scope="row" class="px-6 py-4">
                          {{ round($uw[$i][3],3) }}
                      </th>
                      <th scope="row" class="px-6 py-4">
                          {{ round($uw[$i][4],3) }}
                      </th>
                      @php
                          $i++;
                      @endphp
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      </div>
    </div>
    <h2 id="accordion-collapse-heading-4">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
          <span>Menghitung Nilai Akhir</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-3">
        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
          <p class="mb-2 text-gray-500 dark:text-gray-400">Menentukan nilai akhir dari masing-masing kriteria dengan mengalihkan nilai yang didapat dari hasil normalisasi bobot kriteria dan hasil nilai utility. Kemudian jumlahkan hasil dari perkalian nilai normalisasi dan utility.</p>
          <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Cafe
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nilai Akhir
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($result as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item['alternatif'] }}
                        </td>
                        <th scope="row" class="px-6 py-4">
                            {{ round($item['value'],3) }}
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
  </div>

  
<h3 class="text-3xl font-bold dark:text-white">Hasil Rekomendasi</h3>
  
<div class="flex flex-wrap gap-3 mt-5">
    @foreach ($cafe as $item)
    <x-card nama='{{$item->nama}}' kecamatan='{{$item->kecamatan}}' kelurahan='{{$item->kelurahan}}' alamat='{{$item->alamat}}' id='{{$item->id}}' gambar='{{$item->gambar}}' />
        @endforeach
    </div>
</div>
</section>
@endsection
