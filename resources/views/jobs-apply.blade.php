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
        <div id="nav-right" class="flex flex-row my-auto gap-x-5">
            <button><i class="text-2xl bx bx-bell"></i></button>
        </div>
    </nav>

    <main class="flex flex-col flex-grow">
        <section id="company-info" class="flex flex-col px-16 py-8 gap-y-5 border-y">
            <div class="flex flex-row justify-between gap-x-5">
                <div class="flex flex-row content-center">
                    <img src="{{ asset('assets/image/'.$job->company->image) }}" alt="Job Image" class="w-24 h-24">
                    <div class="flex flex-col justify-between pl-2 gap-y-2">
                        <h5 class="text-xl font-bold">{{$job->name}}</h5>
                        <div class="flex flex-col gap-y-2">
                            <p><i class="bx bx-buildings"></i> {{$job->company->name}}</p>
                            <div class="flex flex-row gap-5">
                                <p><i class="bx bx-map"></i> {{$job->job_location}}</p>
                                <p><i class="bx bx-briefcase"></i> {{$job->experience_type->experience}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col py-6 px-28 gap-y-5">
            @if($errors->any())
                <div class="border px-10 py-5 rounded-lg text-red-500">
                    <ul class="list-disc">
                        @foreach ($errors->all() as $item)
                            <li>{{$item}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('success'))
            <div class="border px-10 py-5 rounded-lg text-green-500">
                <p>{{session('success')}}</p>
            </div>
            @endif
            <form method="POST" class="flex flex-col gap-y-5">
                @csrf
                <div id="applicant-info" class="flex flex-col gap-y-3">
                    <h1 class="text-xl font-bold">Data Diri</h1>
                    <div class="flex items-center justify-start w-full">
                        <i class="absolute w-10 m-5 bx bx-user" alt="User Icon"></i>
                        <input placeholder="Nama Lengkap"
                        class="w-full p-4 pl-10 border border-zinc-200" type="text" name="name"/>
                    </div>
                    <div class="flex flex-row gap-x-3">
                        <div class="flex items-center justify-start w-full">
                            <i class="absolute w-10 m-5 bx bx-envelope" alt="Email Icon"></i>
                            <input placeholder="Email"
                            class="w-full p-4 pl-10 border border-zinc-200" type="text" name="email"/>
                        </div>
                        <div class="flex items-center justify-start w-full">
                            <i class="absolute w-10 m-5 bx bx-phone" alt="Phone Icon"></i>
                            <input placeholder="Phone"
                            class="w-full p-4 pl-10 border border-zinc-200" type="text" name="phone"/>
                        </div>
                    </div>
                </div>
                <div id="applicant-info" class="flex flex-col gap-y-3">
                    <h1 class="text-xl font-bold">Lamaran</h1>
                    <div class="flex items-center justify-start w-full">
                        <textarea name="cover_letter" id="" cols="30" rows="10" placeholder="Cover Letter" class="w-full p-4 border border-zinc-200"></textarea>
                    </div>
                    <div class="flex items-center justify-start w-full">
                        <i class="absolute w-10 m-5 bx bx-link" alt="Link Icon"></i>
                        <input placeholder="Link CV / Linked In"
                        class="w-full p-4 pl-10 border border-zinc-200" type="text" name="cv_link"/>
                    </div>
                    <div class="flex items-center justify-start w-full">
                        <i class="absolute w-10 m-5 bx bx-link" alt="Link Icon"></i>
                        <input placeholder="Link Dokumen Pendukung"
                        class="w-full p-4 pl-10 border border-zinc-200" type="text" name="additional_link"/>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <button class="px-5 py-2 text-white rounded bg-zinc-900">Kirim lamaran</button>
                </div>
            </form>
        </section>
    </main>

    <footer id="footer-body" class="flex flex-col w-full gap-5 py-14 border-t-[1px] px-28 border-zinc-200 bg-white">
        <img src="{{ asset('assets/image/dicoding-logo-master.png') }}" alt="Dicoding Logo" class="w-[138px] h-[34px]">
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
