@extends('template')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
        <div class="mx-auto max-w-screen-sm text-center">
            <img class="mb-4 mx-auto" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/404/404-computer.svg" alt="404 Not Found">

            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Data tidak ditemukan.</p>
            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Maaf, rekomendasi tidak bisa diberikan karena data yang anda cari tidak ditemukan. </p>
            <a href="/" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back to Homepage</a>
        </div>   
    </div>

</section>
@endsection
