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

<body class="flex flex-col min-h-screen font-inter bg-zinc-900">
    <nav class="flex flex-row justify-between w-full h-[70px] text-white bg-zinc-900 px-10 align-middle">
        <div id="nav-left" class="flex flex-row my-auto gap-x-8">
            <a href="{{ url('/jobs') }}"><img src="{{ asset('assets/image/logo-dark-theme.png') }}" alt="Dicoding Jobs" class="w-[179px] h-[32px]"></a> |
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
        <section id="header" class="flex flex-col justify-around w-full gap-5 py-10 px-28 bg-zinc-900">
            <p class="text-[#3B82F6] font-bold">Dicoding Jobs</p>
            <h1 class="text-2xl font-bold text-white">Temukan lowongan yang<br> cocok untuk anda. </h1>
        </section>
        <section id="body" class="flex flex-row justify-start w-full bg-white rounded-t-2xl px-28 gap-x-5">
            <div id="content" class="flex flex-col flex-none w-2/3 my-10">
                <h1 class="mb-5 text-xl font-bold">Daftar Pekerjaan Terbaru</h1>
                @foreach ($listJobs as $index => $job)
                <a href="{{url('jobs/'.$job->id.'/show')}}">
                    <div id="card-{{ $index }}"
                        class="flex flex-row items-center w-full p-5 my-2 text-sm border gap-x-5 border-zinc-200">
                        <img src="{{ asset('assets/image/'.$job->company->image) }}" alt="Job Image" class="w-24 h-24">
                        <div id="card-body" class="flex flex-col justify-between w-full">
                            <h5 class="text-lg font-bold">{{$job->name}}</h5>
                            <div id="card-info" class="flex flex-row justify-between w-full">
                                <div class="flex flex-col">
                                    <p><i class="bx bx-buildings"></i> {{$job->company->name}}</p>
                                    <div class="flex flex-row gap-5">
                                        <p><i class="bx bx-map"></i> {{$job->job_location}}</p>
                                        <p><i class="bx bx-briefcase"></i> {{$job->experience_type->experience}}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col text-right">
                                    <p>Dibuat pada {{\Carbon\Carbon::create($job->create_at)->format("d F Y")}}</p>
                                    <p>Lamar Sebelum {{\Carbon\Carbon::create($job->closed_date)->format("d F Y")}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </a>
                <div id="pagination">
                </div>
            </div>
            <aside class="flex flex-col flex-initial w-full my-10 gap-y-5">
                <form action="" id="job-filter" method="GET">
                    <div class="relative flex items-center justify-start w-full">
                        <i class="absolute w-10 m-5 bx bx-search" alt="Search Icon"></i>
                        <input placeholder="Pekerjaan apa yang sedang anda cari ?"
                            class="w-full p-4 pl-10 border border-zinc-200" id="job-search" name="job_name_search" value="{{app('request')->input('job_name_search')}}"/>
                    </div>
                    <div class="flex flex-col gap-y-5">
                        <div id="filter-card" class="flex flex-col p-5 border border-zinc-200 gap-y-2">
                            <h1 class="text-lg font-bold">Keahlian</h1>
                            @foreach ($listSkills as $index => $skill)
                                <div class="form-check text-zinc-500">
                                    <input
                                        class="float-left w-4 h-4 mt-1 mr-2 align-top border border-gray-300 rounded-sm form-check-input"
                                        type="checkbox" value="{{ $skill->skill }}" name="skill"
                                        id="skill-check-{{ $index }}" @if(app('request')->has('skill') && app('request')->input('skill') == $skill->skill) @checked(true) @endif>
                                    <label class="inline-block text-gray-800 form-check-label"
                                        for="skill-check-{{ $index }}">
                                        {{ $skill->skill }}
                                    </label>
                                </div>
                            @endforeach
                            <p class="w-full text-sm text-center text-zinc-500">Selengkapnya <i class="bx bx-plus"></i></p>
                        </div>
                        <div id="filter-card" class="flex flex-col p-5 border border-zinc-200 gap-y-2">
                            <h1 class="text-lg font-bold">Tipe Pekerjaan</h1>
                            @foreach ($listJobTypes as $index => $JobType)
                                <div class="form-check text-zinc-500">
                                    <input
                                        class="float-left w-4 h-4 mt-1 mr-2 align-top border border-gray-300 rounded-sm form-check-input"
                                        type="checkbox" value="{{ $JobType->type }}" name="work_type"
                                        id="work-type-check-{{ $index }}" @if(app('request')->has('work_type') && app('request')->input('work_type') == $JobType->type) @checked(true) @endif>
                                    <label class="inline-block text-gray-800 form-check-label"
                                        for="work-type-check-{{ $index }}">
                                        {{ $JobType->type }}
                                    </label>
                                </div>
                            @endforeach
                            <p class="w-full text-sm text-center text-zinc-500">Selengkapnya <i class="bx bx-plus"></i>
                            </p>
                        </div>
                        <div id="filter-card" class="flex flex-col p-5 border border-zinc-200 gap-y-2">
                            <h1 class="text-lg font-bold">Kota</h1>
                            @foreach ($listLocations as $index => $location)
                                <div class="form-check text-zinc-500">
                                    <input
                                        class="float-left w-4 h-4 mt-1 mr-2 align-top border border-gray-300 rounded-sm form-check-input"
                                        type="checkbox" value="{{ $location['city_name'] }}" name="location"
                                        id="location-check-{{ $index }}" @if(app('request')->has('location') && app('request')->input('location') == $location['city_name']) @checked(true) @endif>
                                    <label class="inline-block text-gray-800 form-check-label"
                                        for="location-check-{{ $index }}">
                                        {{ $location['city_name'] }}
                                    </label>
                                </div>
                            @endforeach
                            <p class="w-full text-sm text-center text-zinc-500">Selengkapnya <i class="bx bx-plus"></i>
                            </p>
                        </div>
                        <div id="filter-card" class="flex flex-col p-5 border border-zinc-200 gap-y-2">
                            <h1 class="text-lg font-bold">Pengalaman</h1>
                            @foreach ($listExperienceTypes as $index => $experienceType)
                                <div class="form-check text-zinc-500">
                                    <input
                                        class="float-left w-4 h-4 mt-1 mr-2 align-top border border-gray-300 rounded-sm form-check-input"
                                        type="checkbox" value="{{ $experienceType->experience }}" name="work_experience"
                                        id="work-experience-check-{{ $index }}" @if(app('request')->has('work_experience') && app('request')->input('work_experience') == $experienceType->experience) @checked(true) @endif>
                                    <label class="inline-block text-gray-800 form-check-label"
                                        for="work-experience-check-{{ $index }}">
                                        {{ $experienceType->experience }}
                                    </label>
                                </div>
                            @endforeach
                            <p class="w-full text-sm text-center text-zinc-500">Selengkapnya <i class="bx bx-plus"></i>
                            </p>
                        </div>
                    </div>
                </form>
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

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        const form = $('#job-filter');
        $('#job-search, [name=skill], [name=work_type], [name=location], [name=work_experience]').on('change', function() {
            form.submit();
        });
    });
</script>

</html>
