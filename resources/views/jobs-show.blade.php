<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicoding | Jobs</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="{{asset('assets/image/favicon.png')}}">
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen font-inter">
    <nav class="flex flex-row justify-between w-full h-[70px] px-10 align-middle">
        <div id="nav-left" class="flex flex-row my-auto gap-x-8">
            <a href="{{ url('/jobs') }}"><img src="{{ asset('assets/image/logo-light-theme.png') }}" alt="Dicoding Jobs" class="w-[179px] h-[32px]"></a> |
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
        <section id="company-info" class="px-16 py-8 flex flex-col gap-y-5 border-y">
            <a href="{{url('/jobs')}}" class="text-sm underline">Semua daftar pekerjaan <i class='bx bx-right-top-arrow-circle'></i></a>
            <div class="flex flex-row gap-x-5 justify-between">
                <div class="flex flex-row content-center">
                    <img src="{{ asset('assets/image/'.$job->company->image) }}" alt="Job Image" class="h-24 w-24">
                    <div class="flex flex-col justify-between pl-2 gap-y-2">
                        <h5 class="font-bold text-xl">{{$job->name}}</h5>
                        <div class="flex flex-col gap-y-2">
                            <p><i class="bx bx-buildings"></i> {{$job->company->name}}</p>
                            <div class="flex flex-row gap-5">
                                <p><i class="bx bx-map"></i> {{$job->job_location}}</p>
                                <p><i class="bx bx-briefcase"></i> {{$job->experience_type->experience}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="action-button" class="flex flex-row justify-self-end gap-x-5 h-fit">
                    <button><i class='bx bx-share-alt text-2xl'></i></button>
                    <button><i class='bx bx-heart text-2xl'></i></button>
                    <a href="{{ url('jobs/'.$job->id.'/apply') }}" class="bg-zinc-900 text-white px-5 py-2 rounded">Kirim lamaran</a>
                </div>
            </div>
        </section>
        <section class="flex flex-col px-28 py-6 gap-y-5">
            <div class="flex flex-row gap-x-5 bg-blue-50 border border-blue-400 text-blue-500 w-fit py-2 px-5 rounded-full">
                {{$job->job_type->type}}
            </div>
            <div id="company-description" class="flex flex-col gap-y-2">
                <h1 class="text-xl font-bold">Tentang Perusahaan</h1>
                <p class="text-justify">{{$job->company->description}}</p>
            </div>
            <div id="job-description" class="flex flex-col gap-y-2">
                <h1 class="text-xl font-bold">Deskripsi Pekerjaan</h1>
                <p class="text-justify">{{$job->description}}</p>
            </div>
            <div id="job-responsibilities" class="flex flex-col gap-y-2">
                <h1 class="text-xl font-bold">Responsibilities</h1>
                <p class="text-justify">{{$job->job_responsibilities}}</p>
            </div>
            <div id="job-requirements" class="flex flex-col gap-y-2">
                <h1 class="text-xl font-bold">Syarat Pelamar</h1>
                <p class="text-justify">{{$job->job_requirements}}</p>
            </div>
            <div id="closing-statement" class="flex flex-col gap-y-2 p-5 border">
                <h1 class="text-xl font-bold">Tertarik?</h1>
                <p class="text-justify">{{$job->closing_statement}}</p>
            </div>
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
