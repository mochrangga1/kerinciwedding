<!doctype html>
<html lang="id" data-bs-theme="dark">

<head>
    <!-- Common Tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Undangan Pernikahan Wahyu & Riski">
    <meta name="description" content="Website Undangan Pernikahan Wahyu & Riski Secara Online">
    <meta name="theme-color" content="#212529">
    <meta name="color-scheme" content="dark">
    <link rel="icon" type="image/png" href="https://ulems.my.id/assets/images/icon-192x192.png">
    <title>Undangan Pernikahan {{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}}</title>

    <!-- SEO Tag -->
    <meta property="og:title" content="Undangan Pernikahan Wahyu & Riski">
    <meta property="og:description" content="Website Undangan Pernikahan Wahyu & Riski Secara Online">
    <meta property="og:image" content="https://ulems.my.id/assets/images/bg.jpeg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt" content="Undangan Pernikahan Wahyu & Riski">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="Undangan">
    <meta property="og:url" content="https://ulems.my.id/">

    <!-- Preconnect CDN -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Dependencies CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css" integrity="sha256-WAgYcAck1C1/zEl5sBl5cfyhxtLgKGdpI3oKyJffVRI=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha256-MBffSnbbXwHCuZtgPYiwMQbfE7z+GOZ7fBPCNB06Z98=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css" integrity="sha256-CTSx/A06dm1B063156EVh15m6Y67pAjZZaQc89LLSrU=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" integrity="sha256-GqiEX9BuR1rv5zPU5Vs2qS/NSHl1BJyBcjQYJ6ycwD4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&display=swap">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('Undangan-Tema-1')}}/css/app.css">
</head>

<body data-email="user@example.com" data-password="12345678" data-url="https://api.ulems.my.id/" style="overflow-y: hidden;">

    <!-- Navbar Bottom -->
    <nav class="navbar navbar-dark bg-dark navbar-expand fixed-bottom rounded-top-4 p-0" id="navbar-menus">
        <ul class="navbar-nav nav-justified w-100 align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="#home">
                    <i class="fas fa-home"></i>
                    <span class="d-block" style="font-size: 0.7rem;">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mempelai">
                    <i class="fa-solid fa-user-group"></i>
                    <span class="d-block" style="font-size: 0.7rem;">Mempelai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tanggal">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span class="d-block" style="font-size: 0.7rem;">Tanggal</span>
                </a>
            </li>
            
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="text-light" data-bs-spy="scroll" data-bs-target="#navbar-menus" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">

        <!-- Home -->
        <section class="container" id="home">

            <div class="text-center pt-4">
                <h1 class="font-esthetic my-4" style="font-size: 2.5rem;">Undangan Pernikahan</h1>

                <div class="py-4">
                    <div class="img-crop border border-3 border-light shadow mx-auto">
                        {{-- <img src="{{asset('Undangan-Tema-1')}}/assets/images/bg.jpeg" alt="bg" onclick="util.modal(this)"> --}}
                        <img src="{{ asset('images/' . $undangan->foto_prewed) }}" alt="Foto Cover" onclick="util.modal(this)">
                    </div>
                </div>

                <h1 class="font-esthetic my-4" style="font-size: 3rem;">{{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}}</h1>
                <h4>{{ $tanggal_resepsi }}</h4>

                <div class="d-flex justify-content-center align-items-center mt-4 mb-2">
                    <div class="mouse-animation">
                        <div class="scroll-animation"></div>
                    </div>
                </div>

                <p class="m-0">Scroll Down</p>
            </div>
        </section>

        <!-- Wave Separator -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,106.7C384,117,480,171,576,165.3C672,160,768,96,864,96C960,96,1056,160,1152,154.7C1248,149,1344,75,1392,37.3L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>

        <!-- Mempelai -->
        <section class="dark-section" id="mempelai">

            <div class="text-center">
                <h1 class="font-arabic py-4 px-2" style="font-size: 2rem">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</h1>
                <h1 class="font-esthetic py-4 px-2" style="font-size: 2rem">Assalamualaikum Warahmatullahi Wabarakatuh</h1>

                <p class="pb-3 px-3">
                    Tanpa mengurangi rasa hormat. Kami mengundang Bapak/Ibu/Saudara/i serta kerabat
                    sekalian untuk menghadiri acara pernikahan kami:
                </p>

                <div class="overflow-x-hidden">

                    <div data-aos="fade-right" data-aos-duration="2000">
                        <div class="img-crop border border-3 border-light shadow my-4 mx-auto">
                            <img src="{{ asset('images/' . $undangan->foto_pria) }}" alt="Foto Pria" onclick="util.modal(this)">
                        </div>
                        <h1 class="font-esthetic" style="font-size: 3rem;">{{$undangan->nama_mempelai_pria}}</h1>
                        <h5 class="mt-3 mb-0">Putra</h5>
                        <p class="mb-0">Bapak {{$undangan->nama_ayah_pria}} & Ibu {{$undangan->nama_ibu_pria}}</p>
                    </div>

                    <h1 class="font-esthetic my-4" style="font-size: 4rem;">&</h1>

                    <div data-aos="fade-left" data-aos-duration="2000">
                        <div class="img-crop border border-3 border-light shadow my-4 mx-auto">
                            <img src="{{ asset('images/' . $undangan->foto_wanita) }}" alt="Foto Wanita" onclick="util.modal(this)">
                        </div>
                        <h1 class="font-esthetic" style="font-size: 3rem;">{{$undangan->nama_mempelai_wanita}}</h1>
                        <h5 class="mt-3 mb-0">Putri</h5>
                        <p class="mb-0">Bapak {{$undangan->nama_ayah_wanita}} & Ibu {{$undangan->nama_ibu_wanita}}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Wave Separator -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1" d="M0,192L40,181.3C80,171,160,149,240,149.3C320,149,400,171,480,165.3C560,160,640,128,720,128C800,128,880,160,960,186.7C1040,213,1120,235,1200,218.7C1280,203,1360,149,1400,122.7L1440,96L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
        </svg>

        <!-- Firman Allah Subhanahu Wa Ta'ala -->
        <div class="container">
            <div class="text-center" data-aos="fade-up" data-aos-duration="2000">

                <h1 class="font-esthetic mt-0 mb-3" style="font-size: 2rem">
                    Allah Subhanahu Wa Ta'ala berfirman
                </h1>

                <p style="font-size: 0.9rem;" class="px-2">
                    Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari
                    jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu
                    rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda
                    (kebesaran Allah) bagi kaum yang berpikir.
                </p>

                <span class="mb-0"><strong>QS. Ar-Rum Ayat 21</strong></span>
            </div>
        </div>

        <!-- Wave Separator -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1" d="M0,96L30,106.7C60,117,120,139,180,154.7C240,171,300,181,360,186.7C420,192,480,192,540,181.3C600,171,660,149,720,154.7C780,160,840,192,900,208C960,224,1020,224,1080,208C1140,192,1200,160,1260,138.7C1320,117,1380,107,1410,101.3L1440,96L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
        </svg>

        <!-- Tanggal -->
        <section class="dark-section" id="tanggal">

            <div class="container">
                <div class="text-center">

                    

                    <p style="font-size: 0.9rem;" class="mt-4 py-2">
                        Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta'ala, insyaAllah kami akan menyelenggarakan
                        acara :
                    </p>

                    <div class="overflow-x-hidden">
                        <div class="py-2" data-aos="fade-left" data-aos-duration="1500">
                            <h1 class="font-esthetic" style="font-size: 2rem;">Akad</h1>
                            <p>Pukul {{$jam_akad}} - Selesai</p>
                        </div>

                        <div class="py-2" data-aos="fade-right" data-aos-duration="1500">
                            <h1 class="font-esthetic" style="font-size: 2rem;">Resepsi</h1>
                            <p>Pukul {{$jam_resepsi}} WIB - Selesai</p>
                        </div>
                    </div>

                    <div class="py-2" data-aos="fade-up" data-aos-duration="1500">
                        <a href="{{$undangan->maps}}" target="_blank" class="btn btn-outline-light btn-sm rounded-pill shadow-sm mb-2 px-3">
                            <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                        </a>
                        <p class="mb-0 mt-1 mx-1 pb-4" style="font-size: 0.9rem;">
                           {{$undangan->lokasi_acara}}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        

        <!-- Wave Separator -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1" d="M0,96L30,106.7C60,117,120,139,180,154.7C240,171,300,181,360,186.7C420,192,480,192,540,181.3C600,171,660,149,720,154.7C780,160,840,192,900,208C960,224,1020,224,1080,208C1140,192,1200,160,1260,138.7C1320,117,1380,107,1410,101.3L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
        </svg>

       

        <!-- Ucapan -->
        @isset($kehadiran)
            
       
        @if ($kehadiran === 5 || $kehadiran === 0)
        <center><b>Anda belum mengisi konfirmasi kehadiran</b></center>
        @else
        <center><b>Anda sudah mengisi konfirmasi kehadiran, Anda tetap bisa merubah status kehadiran</b></center>
        @endif
        <section class="m-0 p-0" id="ucapan">
            <div class="container">
                <div class="card-body border rounded-4 shadow p-3">
                    <h1 class="font-esthetic text-center mb-3" style="font-size: 3rem;">Konfirmasi Kehadiran</h1>
                    <div class="mb-1" id="balasan"></div>
                    <form action="/kehadiran/tamu" method="POST">
                    @csrf
                    <input type="hidden" name="kode_tamu" value="{{$code}}">
                    <div class="mb-3">
                        <select class="form-select shadow-sm" id="form-kehadiran" name="kehadiran">
                            <option selected>--- Konfirmasi Kehadiran ---</option>
                            <option value="1">Hadir</option>
                            <option value="2">Berhalangan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </section>
        @endisset
       
        <!-- Wave Separator -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1" d="M0,224L34.3,234.7C68.6,245,137,267,206,266.7C274.3,267,343,245,411,234.7C480,224,549,224,617,213.3C685.7,203,754,181,823,197.3C891.4,213,960,267,1029,266.7C1097.1,267,1166,213,1234,192C1302.9,171,1371,181,1406,186.7L1440,192L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
        </svg>
    </main>

    <!-- Footer Undangan -->
    <footer>
        <div class="container">
            <div class="text-center">

                <p style="font-size: 0.9rem;" class="pt-2 pb-1 px-2" data-aos="fade-up" data-aos-duration="1500">
                    Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila, Bapak / Ibu / Saudara / i.
                    berkenan hadir untuk memberikan do'a restunya kami ucapkan terimakasih.
                </p>

                <h1 class="font-esthetic" data-aos="fade-up" data-aos-duration="2000">Wassalamualaikum Warahmatullahi Wabarakatuh</h1>
                <h1 class="font-arabic py-4 px-2" data-aos="fade-up" data-aos-duration="2000" style="font-size: 2rem">الحَمْدُ لله رَبِّ العَالَمِيْن</h1>

                <hr class="mt-3 mb-2">

                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto">
                        <small class="text-light">
                            Sanggar Rias Kerinci
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Welcome Page -->
    <div class="loading-page" id="welcome" style="opacity: 1;">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh !important;">

            <div class="text-center">
                <h1 class="font-esthetic mb-4" style="font-size: 2.5rem;">The Wedding Of</h1>

                <div class="img-crop border border-3 border-light shadow mb-4 mx-auto">
                   <img src="{{ asset('images/' . $undangan->foto_prewed) }}" alt="Foto Cover" onclick="util.modal(this)">
                </div>

                <h1 class="font-esthetic my-4" style="font-size: 2.5rem;">{{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}}</h1>
                @isset($nama_tamu)
                <h3 class="font-esthetic my-4" style="font-size: 2rem;">Kepada : {{$nama_tamu}}</h3>@endisset
                <div id="nama-tamu"></div>

                <button type="button" class="btn btn-light shadow rounded-4 mt-4" onclick="util.buka()">
                    <i class="fa-solid fa-envelope-open me-2"></i>Buka Undangan
                </button>
            </div>
        </div>
    </div>

    <!-- Audio Button -->
    <button type="button" id="tombol-musik" style="display: none;" class="btn btn-light btn-sm rounded-circle btn-music" onclick="util.play(this)" data-status="true" data-url="./assets/music/sound.mp3">
        <i class="fa-solid fa-circle-pause"></i>
    </button>

    <!-- Loading page -->
    <div class="loading-page" id="loading" style="opacity: 1;">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh !important;">
            <div class="text-center w-75">
                <img class="img-fluid mb-3" src="{{asset('Undangan-Tema-1')}}/assets/images/icon-192x192.png" alt="icon" style="width: 3.5rem;">
                <div class="progress" role="progressbar" style="height: 0.5rem;">
                    <div class="progress-bar" id="bar" style="width: 0%"></div>
                </div>
                <small class="mt-1 text-light" id="progress-info">Loading asset</small>
            </div>
        </div>
    </div>

    <!-- Modal Foto Large -->
    <div class="modal fade" id="modal-image" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                        <img src="{{asset('Undangan-Tema-1')}}/assets/images/bg.jpeg" class="w-100" alt="foto" id="show-modal-image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dependencies JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha256-gvZPYrsDwbwYJLD5yeBfcNujPhRoGOY831wwbIzz3t0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" integrity="sha256-pQBbLkFHcP1cy0C8IhoSdxlm0CtcH5yJ2ki9jjgR03c=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.12.0/tsparticles.confetti.bundle.min.js" integrity="sha256-XG5M9shcLLpu8ct5bVbu6lLVzLpfZChl+csxdyLVP18=" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="{{asset('Undangan-Tema-1')}}/js/app.js"></script>
</body>

</html>