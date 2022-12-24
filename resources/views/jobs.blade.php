<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicoding | Jobs</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen font-inter bg-zinc-900">
    <nav class="flex flex-row justify-between w-full h-[70px] text-white bg-zinc-900 px-10 align-middle">
        <div id="nav-left" class="flex flex-row my-auto gap-x-8">
            <img src="{{ asset('assets/image/logo.png') }}" alt="Dicoding Jobs" class="w-[179px] h-[32px]"> |
            <ul class="flex flex-row list-none gap-x-5">
                <li>Looking for job</li>
                <li>Hiring</li>
            </ul>
        </div>
        <div id="nav-right" class="my-auto gap-x-5 flex flex-row">
            <button><i class="bx bx-bell text-2xl"></i></button>
        </div>
    </nav>

    <main class="flex flex-col flex-grow">
        <section id="header" class="flex flex-col justify-around w-full gap-5 py-10 px-28 bg-zinc-900">
            <p class="text-[#3B82F6] font-bold">Dicoding Jobs</p>
            <h1 class="text-2xl font-bold text-white">Temukan lowongan yang<br> cocok untuk anda. </h1>
        </section>
        <section id="body" class="flex flex-row bg-white rounded-t-2xl px-28 w-full gap-x-5 justify-start">
            <div id="content" class="my-10 flex flex-col flex-none w-2/3">
                <h1 class="text-xl font-bold mb-5">Daftar Pekerjaan Terbaru</h1>
                {{-- <div class="w-full flex justify-start items-center relative">
                <i class="absolute m-5 w-10 bx bx-search" alt="Search Icon"></i>
                <input
                placeholder="Pekerjaan apa yang sedang anda cari ?"
                class="border border-zinc-200 p-4 pl-10 w-full"
                />
            </div> --}}
                @for ($i = 0; $i < 10; $i++)
                    <div id="card-{{ $i }}"
                        class="flex flex-row w-full my-2 items-center gap-x-5 border border-zinc-200 p-5 text-sm">
                        <img src="{{ asset('assets/image/example-joblist.png') }}" alt="Job Image" class="h-24 w-24">
                        <div id="card-body" class="flex flex-col justify-between w-full">
                            <h5 class="font-bold text-lg">Job Position</h5>
                            <div id="card-info" class="flex flex-row w-full justify-between">
                                <div class="flex flex-col">
                                    <p><i class="bx bx-buildings"></i> Company</p>
                                    <div class="flex flex-row gap-5">
                                        <p><i class="bx bx-map"></i> Information 1</p>
                                        <p><i class="bx bx-briefcase"></i> Information 2</p>
                                    </div>
                                </div>
                                <div class="flex flex-col text-right">
                                    <p>Dibuat pada 15 Juni 2022</p>
                                    <p>Lamar Sebelum 15 Juni 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <aside class="flex flex-initial w-full flex-col my-10 gap-y-5">
                <div class="w-full flex justify-start items-center relative">
                    <i class="absolute m-5 w-10 bx bx-search" alt="Search Icon"></i>
                    <input placeholder="Pekerjaan apa yang sedang anda cari ?"
                        class="border border-zinc-200 p-4 pl-10 w-full" />
                </div>
                <div class="flex flex-col gap-y-5">
                    <div id="filter-card" class="flex flex-col p-5 border border-zinc-200 gap-y-2">
                        <h1 class="font-bold text-lg">Keahlian</h1>
                        @foreach (['Back-End Developer', 'Front-End Developer', 'Product Manager', 'Product Designer', 'iOS Developer'] as $index => $item)
                            <div class="form-check text-zinc-500">
                                <input
                                    class="form-check-input h-4 w-4 border border-gray-300 rounded-sm mt-1 align-top float-left mr-2"
                                    type="checkbox" value="{{ $item }}" name="skill"
                                    id="skill-check-{{ $index }}">
                                <label class="form-check-label inline-block text-gray-800"
                                    for="skill-check-{{ $index }}">
                                    {{ $item }}
                                </label>
                            </div>
                        @endforeach
                        <p class="text-sm text-center w-full text-zinc-500">Selengkapnya <i class="bx bx-plus"></i></p>
                    </div>
                    <div id="filter-card" class="flex flex-col p-5 border border-zinc-200 gap-y-2">
                        <h1 class="font-bold text-lg">Tipe Pekerjaan</h1>
                        @foreach (['Full-time', 'Freelance', 'Intern', 'Bisa Remote'] as $index => $item)
                            <div class="form-check text-zinc-500">
                                <input
                                    class="form-check-input h-4 w-4 border border-gray-300 rounded-sm mt-1 align-top float-left mr-2"
                                    type="checkbox" value="{{ $item }}" name="work_type"
                                    id="work-type-check-{{ $index }}">
                                <label class="form-check-label inline-block text-gray-800"
                                    for="work-type-check-{{ $index }}">
                                    {{ $item }}
                                </label>
                            </div>
                        @endforeach
                        <p class="text-sm text-center w-full text-zinc-500">Selengkapnya <i class="bx bx-plus"></i>
                        </p>
                    </div>
                    <div id="filter-card" class="flex flex-col p-5 border border-zinc-200 gap-y-2">
                        <h1 class="font-bold text-lg">Kota</h1>
                        @foreach (['Bandung', 'Jakarta', 'Yogyakarta'] as $index => $item)
                            <div class="form-check text-zinc-500">
                                <input
                                    class="form-check-input h-4 w-4 border border-gray-300 rounded-sm mt-1 align-top float-left mr-2"
                                    type="checkbox" value="{{ $item }}" name="location"
                                    id="location-check-{{ $index }}">
                                <label class="form-check-label inline-block text-gray-800"
                                    for="location-check-{{ $index }}">
                                    {{ $item }}
                                </label>
                            </div>
                        @endforeach
                        <p class="text-sm text-center w-full text-zinc-500">Selengkapnya <i class="bx bx-plus"></i>
                        </p>
                    </div>
                    <div id="filter-card" class="flex flex-col p-5 border border-zinc-200 gap-y-2">
                        <h1 class="font-bold text-lg">Pengalaman</h1>
                        @foreach (['Freshgraduate', '1-3 tahun', '3-5 tahun', '5-10 tahun', 'Lebih dari 10 tahun'] as $index => $item)
                            <div class="form-check text-zinc-500">
                                <input
                                    class="form-check-input h-4 w-4 border border-gray-300 rounded-sm mt-1 align-top float-left mr-2"
                                    type="checkbox" value="{{ $item }}" name="work_experience"
                                    id="work-experience-check-{{ $index }}">
                                <label class="form-check-label inline-block text-gray-800"
                                    for="work-experience-check-{{ $index }}">
                                    {{ $item }}
                                </label>
                            </div>
                        @endforeach
                        <p class="text-sm text-center w-full text-zinc-500">Selengkapnya <i class="bx bx-plus"></i>
                        </p>
                    </div>
                </div>

                {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus consequuntur itaque quidem vel sunt facere quis iusto ad consequatur enim officiis, explicabo modi labore, quod, voluptatibus incidunt veniam a ipsa! --}}
            </aside>
        </section>
    </main>

    <footer id="footer-body" class="flex flex-col w-full gap-5 py-14 border-t-[1px] px-28 border-zinc-200 bg-white">
        <img src="{{ asset('assets/image/dicoding-logo-master.png') }}" alt="Dicoding Logo"
            class="w-[138px] h-[34px]">
        <p class="text-zinc-500">
            Dicoding Space<br>
            Jl.Batik Kumeli No.50, Sukaluyu<br>
            Kec. Cibeunying Kaler, Kota Bandung<br>
            Jawa Barat 40123
        </p>
        <div id="footer-copyright" class="flex flex-row justify-between">
            <div id="social-media" class="flex flex-row gap-10 text-zinc-700">
                <p class="font-bold">Decode Ideas Discover Potential</p>
                <ul class="flex flex-row list-none gap-x-5">
                    <li><a href="https://www.instagram.com/dicoding" target="_blank"><i
                                class="bx bxl-instagram-alt"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCM6BWkgiGrCHG967i_PyMiw" target="_blank"><i
                                class="bx bxl-youtube"></i></a></li>
                    <li><a href="https://www.twitter.com/dicoding" target="_blank"><i class="bx bxl-twitter"></i></a>
                    </li>
                    <li><a href="https://www.facebook.com/dicoding" target="_blank"><i
                                class="bx bxl-facebook"></i></a></li>
                </ul>
            </div>
            <div id="copyright" class="flex flex-row gap-5 text-zinc-400">
                <div id="copyright-left">
                    <p>&#169; Dicoding Indonesia 2022</p>
                </div>
                <div id="terms-privacy" class="flex flex-row gap-2">
                    <p>Terms</p>
                    <p>&#8226;</p>
                    <p>Privacy</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
