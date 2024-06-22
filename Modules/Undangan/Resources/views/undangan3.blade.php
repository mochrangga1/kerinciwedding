<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Undangan Pernikahan {{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}}</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:wght@100;300;400;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />

    <!-- Simply Countdown -->
    <link
      rel="stylesheet"
      href="{{asset('Undangan-Tema-3')}}/assets/css/simplyCountdown.theme.default.css"
    />

    <!-- Style Css -->
    <link rel="stylesheet" href="{{asset('Undangan-Tema-3')}}/assets/css/style.css" />

    <style>
        .hero::before {
            background-image: url('{{ asset('images/' . $undangan->foto_cover) }}');
        }
    </style>
  </head>

  <body>
    <!-- Hero section -->
    <section
      id="hero"
      class="hero w-100 h-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white"
    >
      <main>
        <h4 class="hero__title">
          Kepada
          <span>Bapak/Ibu/Saudara/i,</span>
        </h4>
        <h1 class="mt-4 hero__subtitle">
            @if ($tamu)
              {{$tamu->nama_tamu}}
            @else
              {{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}}
            @endif
        </h1>
        <p class="mt-0 hero__description">
          Akan melangsungkan resepsi pernikahan dalam:
        </p>
        <div class="simply-countdown mt-5"></div>
        <a
          href="#home"
          class="btn btn-lg mt-4 hero__button"
          onClick="enableScroll()"
        >
          Lihat Undangan
        </a>
      </main>
    </section>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-transparent sticky-top mynavbar">
      <div class="container">
        <a class="navbar-brand" href="#">{{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}}</a>
        <button
          class="navbar-toggler border-0"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                {{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}}
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <div class="navbar-nav ms-auto">
              <a class="nav-link" href="#home">Home</a>
              <a class="nav-link" href="#info">Info</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- End -->

    <!-- Home -->
    <section class="home" id="home">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h4 class="couple__title">
              ِبِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيْم
            </h4>
            <h5 class="couple__subtitle">
              وَاللّٰهُ جَعَلَ لَكُمْ مِّنْ اَنْفُسِكُمْ اَزْوَاجًا وَّجَعَلَ
              لَكُمْ مِّنْ اَزْوَاجِكُمْ بَنِيْنَ وَحَفَدَةً وَّرَزَقَكُمْ مِّنَ
              الطَّيِّبٰتِۗ اَفَبِالْبَاطِلِ يُؤْمِنُوْنَ وَبِنِعْمَتِ اللّٰهِ
              هُمْ يَكْفُرُوْنَۙ ۝٧
            </h5>
            <p class="couple__subtitle">
              Allah menjadikan bagimu pasangan (suami atau istri) dari jenis
              kamu sendiri, menjadikan bagimu dari pasanganmu anak-anak dan
              cucu-cucu, serta menganugerahi kamu rezeki yang baik-baik. Mengapa
              terhadap yang batil mereka beriman, sedangkan terhadap nikmat
              Allah mereka ingkar?
            </p>
          </div>
        </div>
        <div class="row couple">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-8 text-end">
                <h3 class="couple__title">{{$undangan->nama_mempelai_pria}}</h3>
                <p class="couple__subtitle">
                  Putra Bpk. {{ $undangan->nama_ayah_pria }}
                  <br />
                  dan
                  <br />
                  Putra dari Ibu. {{ $undangan->nama_ibu_pria }}
                </p>
              </div>
              <div class="col-4">
                <img
                  src="{{ asset('images/' . $undangan->foto_pria) }}"
                  alt="Pria-image"
                  class="img-responsive rounded-circle couple__img"
                />
              </div>
            </div>
          </div>
          <span class="heart">
            <i class="bi bi-heart-fill"></i>
          </span>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-4">
                <img
                  src="{{ asset('images/' . $undangan->foto_wanita) }}"
                  alt="image1"
                  class="img-responsive rounded-circle couple-img"
                />
              </div>
              <div class="col-8">
                <h3 class="couple-title">{{ $undangan->nama_mempelai_wanita }}</h3>
                <p class="couple-subtitle">
                  Putri kedua dari Bpk. {{ $undangan->nama_ayah_wanita }}
                  <br />
                  dan
                  <br />
                  Putri dari Ibu. {{ $undangan->nama_ibu_wanita }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center couple">
          <div class="col-md-8 text-center">
            <h4 class="home__title">
              Assalamu’alaikum warahmatullahi wabarakatuh
            </h4>

            <p class="home__subtitle">
              Maha Suci Allah yang telah menciptakan makhluk-Nya
              berpasang-pasangan. Ya Allah semoga ridho-Mu tercurah
              mengiringi pernikahan kami.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End Home -->

    <!-- Info -->
    <section class="info" id="info">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-10 text-center">
            <!-- <h2>Informasi Acara</h2> -->
            <h2 class="info__title">Acara Pernikahan</h2>
            <p class="info__subtitle">
              Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta’ala,
              insyaAllah kami akan menyelenggarakan acara :
            </p>
            {{-- <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.39173973943!2d108.68241987412472!3d-6.963016068173296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0e9ecd3bd7db%3A0xd62099e59ff4913d!2sKecatan%20Jl.%20Cikeusal%20No.14%2C%20RT.06%2FRW.02%2C%20Dusun%20Kliwon%2C%20Cikeusal%2C%20Kec.%20Cimahi%2C%20Kabupaten%20Kuningan%2C%20Jawa%20Barat%2045582!5e0!3m2!1sen!2sid!4v1710040981509!5m2!1sen!2sid"
              width="100%"
              height="250"
              style="border: 0; margin-top: 2rem"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              class="info__img"
            ></iframe> --}}
            <a
              href="{{ $undangan->maps }}"
              target="_blank"
              class="btn btn-light btn-sm my-3 info__button"
            >
              Klik untuk membuka peta
            </a>
            <p class="description">
              Diharapkan untuk tidak salah alamat dan tanggal.
              <br />
              Manakala tiba di tujuan namun tidak ada tanda-tanda sedang
              dilangsungkan pernikahan, maka boleh jadi Anda salah jadwal, atau
              salah tempat.
            </p>
          </div>
        </div>

        <div class="row justify-content-center mt-4">
          <div class="col-md-5 col-10">
            <div class="card text-center mb-4">
              <div class="card-header">Akad Nikah</div>
              <div class="card-body">
                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <i class="bi bi-clock d-block"></i>
                    {{-- <span>09.00 - 10.00</span> --}}
                    <span>{{ $jam_akad }}</span>
                  </div>
                  <div class="col-md-6">
                    <i class="bi bi-calendar3 d-block"></i>
                    {{-- <span>Minggu, 14 April 2024</span> --}}
                    <span>{{ $tanggal_akad }}</span>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                Saat acara akad diharapkan untuk kondusif agar menjaga
                kekhidmatan dan kekhusyuan seluruh prosesi acara. terimakasih
              </div>
            </div>
          </div>
          <div class="col-md-5 col-10">
            <div class="card text-center">
              <div class="card-header">Resepsi</div>
              <div class="card-body">
                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <i class="bi bi-clock d-block"></i>
                    {{-- <span>10.00 - 17.00</span> --}}
                    <span>{{ $jam_resepsi }}</span>
                  </div>
                  <div class="col-md-6">
                    <i class="bi bi-calendar3 d-block"></i>
                    {{-- <span>Minggu, 14 April 2024</span> --}}
                    <span>{{ $tanggal_resepsi }} </span>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                Saat acara akad diharapkan untuk kondusif agar menjaga
                Ketertiban seluruh prosesi acara. terimakasih
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Info -->

    {{-- RSVP --}}
    <section class="rsvp" id="rsvp">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="rsvp__title">Konfirmasi Kehadiran</h2>
            <p class="rsvp__subtitle">
              Mohon konfirmasi kehadiran Anda dengan mengisi form di bawah ini
            </p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <form id="rsvp_form" action="/undangan/rsvp/{{ $tamu->kode ?? '' }}" method="POST">
              @csrf
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama" class="form-label">Nama</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nama"
                        name="nama"
                        required
                      />
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="jumlah" class="form-label">Jumlah Yang Akan Hadir</label>
                          <select class="form-select" id="jumlah" name="jumlah" required>
                              <option value="">Pilih Jumlah Tamu</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                          </select>
                          @error('jumlah')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>

                    <div class="col-md-12 mt-3">
                      <div class="form-group">
                        <label class="form-check-label d-block" for="kehadiran">
                          <input
                            type="radio"
                            class="form-check-input"
                            name="kehadiran"
                            id="kehadiran"
                            value="1"
                            required
                          />
                          Tentu saja kami akan hadir.
                        </label>
                        <label class="form-check-label d-block" for="kehadiran">
                          <input
                            type="radio"
                            class="form-check-input"
                            name="kehadiran"
                            id="kehadiran"
                            value="0"
                            required
                          />
                          Sayangnya kami tidak bisa hadir.
                        </label>
                        @error('kehadiran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>
              </div>
              <input type="hidden" name="undangan_id" value="{{ $undangan->id }}">
              <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <button type="button" id="modalSuksesBtn" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modalSukses" style="display: none;"></button>
    <div class="modal fade" id="modalSukses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title" id="modalSuksesLabel">Sukses</h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>

          <div class="modal-body">

            Konfirmasi Kehadiran Berhasil Dikirim

          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Ok</button>

          </div>

        </div>

      </div>

    </div>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <small class="block">
              &copy; 2024 {{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}} Wedding. All Rights Reserved.
            </small>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <!-- Audio -->
    <div id="audio-container">
      <audio id="song" autoplay loop>
        <source
          src="./{{asset('Undangan-Tema-3')}}/assets/audio/titi dj - jangan berhenti mencintaiku.m4a"
          type="audio/mp3"
        />
      </audio>

      <div class="audio-icon-wrapper" style="display: none">
        <i class="bi bi-disc"></i>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>

    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>

    <script src="{{asset('Undangan-Tema-3')}}/assets/js/scrollreveal.min.js"></script>
    <script src="{{asset('Undangan-Tema-3')}}/assets/js/simplyCountdown.min.js"></script>
    <script src="{{asset('Undangan-Tema-3')}}/assets/js/script.js"></script>

    <script>
      // rsvp form submit ajax
      const form = document.querySelector("#rsvp_form");
        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            const url = form.getAttribute("action");

            try {
            const response = await fetch(url, {
                method: "POST",
                body: formData,
            });

            if (!response.ok) {
                throw new Error("Gagal mengirim RSVP");
            }

            const data = await response.json();

            document.getElementById('modalSuksesBtn').click();
            form.reset();

            } catch (error) {
            console.error(error);
            }
        });
    </script>

    <script>
      simplyCountdown(".simply-countdown", {
        year: {{$tahun_akad_countdown}},
        month: {{$bulan_akad_countdown}},
        day: {{$tanggal_akad_countdown}},
        hours: {{$jam_akad_countdown}},
        words: {
          //words displayed into the countdown
          days: { singular: "Hari", plural: "Hari" },
          hours: { singular: "Jam", plural: "Jam" },
          minutes: { singular: "Menit", plural: "Menit" },
          seconds: { singular: "Detik", plural: "Detik" },
        },
      });
    </script>
    <script>
      /* Navbar */
      const stickyTop = document.querySelector(".sticky-top");
      const offcanvas = document.querySelector(".offcanvas");

      offcanvas.addEventListener("show.bs.offcanvas", function () {
        stickyTop.style.overflow = "visible";
      });

      offcanvas.addEventListener("hidden.bs.offcanvas", function () {
        stickyTop.style.overflow = "hidden";
      });
    </script>
    <script>
      /* Audio */
      const rootElement = document.querySelector(":root");
      const audioIconWrapper = document.querySelector(".audio-icon-wrapper");
      const audioIcon = document.querySelector(".audio-icon-wrapper i");
      const song = document.querySelector("#song");
      let isPlaying = false;

      function disableScroll() {
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

        window.onscroll = function () {
          window.scrollTo(scrollTop, scrollLeft);
        };

        rootElement.style.scrollBehavior = "auto";
      }

      function enableScroll() {
        window.onscroll = function () {};
        rootElement.style.scrollBehavior = "smooth";
        // localStorage.setItem("opened", "true");
        playAudio();
      }

      function playAudio() {
        song.volume = 0.5;
        audioIconWrapper.style.display = "flex";
        song.play();
        isPlaying = true;
      }

      audioIconWrapper.onclick = function () {
        if (isPlaying) {
          song.pause();
          audioIcon.classList.remove("bi-disc");
          audioIcon.classList.add("bi-pause-circle");
        } else {
          song.play();
          audioIcon.classList.add("bi-disc");
          audioIcon.classList.remove("bi-pause-circle");
        }

        isPlaying = !isPlaying;
      };

      // if (!localStorage.getItem("opened")) {
      //   disableScroll();
      // }
      disableScroll();
    </script>
    <script>
      const urlParams = new URLSearchParams(window.location.search);
      const nama = urlParams.get("n") || "";
      const pronoun = urlParams.get("p") || "Bapak/Ibu/Saudara/i";
      const namaContainer = document.querySelector(".hero h4 span");
      namaContainer.innerText = `${pronoun} ${nama},`.replace(/ ,$/, ",");

      document.querySelector("#nama").value = nama;
    </script>
  </body>
</html>
