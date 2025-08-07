
 @extends('layouts.app')

@section('content')
 <div class="max-w-6xl mx-auto px-6 py-16">
            <div class="mb-16 text-center">
            <h1 class="text-3xl font-light tracking-wide text-gray-800 mb-4">Post</h1>
            <p class="text-gray-500 text-sm">
                Platform Pembelajaran Pengaturcaraan</p>
            </div>

            <div class="mb-12">
            <h2 class="text-2xl font-light text-gray-800 mb-2">Dari Blog Kami</h2>
            <p class="text-gray-600 text-sm">
                Belajar cara membangunkan kemahiran pengaturcaraan dan teknologi dengan panduan kami.</p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <article class="bg-gray-50 rounded-lg p-6 hover:shadow-sm transition-shadow duration-200">
                <div class="flex items-center gap-x-3 text-xs mb-4">
                <time datetime="2024-12-15" class="text-gray-400">15 Dis 2024</time>
                <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs">Pembangunan Web</span>
                </div>
                <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-3 leading-snug">
                    <a href="#" class="hover:text-gray-600 transition-colors">
                    Asas Laravel untuk Pemula
                    </a>
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">Pelajari asas-asas Laravel dari awal hingga mahir. Panduan lengkap untuk memulakan projek pertama anda dengan kerangka kerja PHP yang popular ini. Termasuk tips dan trik untuk pembangunan yang berkesan.</p>
                </div>
                <div class="flex items-center gap-x-3 pt-4 border-t border-gray-100">
                <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="w-8 h-8 rounded-full" />
                <div class="text-xs">
                    <p class="font-medium text-gray-900">Ahmad Rahman</p>
                    <p class="text-gray-500">Pengajar Laravel</p>
                </div>
                </div>
            </article>
            <article class="bg-gray-50 rounded-lg p-6 hover:shadow-sm transition-shadow duration-200">
                <div class="flex items-center gap-x-3 text-xs mb-4">
                <time datetime="2024-12-10" class="text-gray-400">10 Dis 2024</time>
                <span class="px-2 py-1 bg-green-50 text-green-600 rounded text-xs">Pangkalan Data</span>
                </div>
                <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-3 leading-snug">
                    <a href="#" class="hover:text-gray-600 transition-colors">
                    Menguasai Eloquent ORM dalam Laravel
                    </a>
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">Panduan komprehensif untuk menggunakan Eloquent ORM dengan berkesan. Pelajari relationship, query builder, dan tips optimisasi untuk aplikasi yang lebih pantas.</p>
                </div>
                <div class="flex items-center gap-x-3 pt-4 border-t border-gray-100">
                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="w-8 h-8 rounded-full" />
                <div class="text-xs">
                    <p class="font-medium text-gray-900">Siti Nurhaliza</p>
                    <p class="text-gray-500">Pembangun Backend</p>
                </div>
                </div>
            </article>
            <article class="bg-gray-50 rounded-lg p-6 hover:shadow-sm transition-shadow duration-200">
                <div class="flex items-center gap-x-3 text-xs mb-4">
                <time datetime="2024-12-05" class="text-gray-400">5 Dis 2024</time>
                <span class="px-2 py-1 bg-purple-50 text-purple-600 rounded text-xs">Frontend</span>
                </div>
                <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-3 leading-snug">
                    <a href="#" class="hover:text-gray-600 transition-colors">
                    Reka Bentuk Responsif dengan Tailwind CSS
                    </a>
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">Pelajari cara mencipta antara muka pengguna yang menarik dan responsif menggunakan Tailwind CSS. Tips dan teknik terkini untuk reka bentuk web moden yang mesra mudah alih.</p>
                </div>
                <div class="flex items-center gap-x-3 pt-4 border-t border-gray-100">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="w-8 h-8 rounded-full" />
                <div class="text-xs">
                    <p class="font-medium text-gray-900">Farid Azman</p>
                    <p class="text-gray-500">Pereka UI/UX</p>
                </div>
                </div>
            </article>
            </div>
        </div>
@endsection
