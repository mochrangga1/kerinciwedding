<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('Undangan-Tema-4')}}/src/output.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('Undangan-Tema-4')}}/src/simplyCountdown.theme.default.css" />
    <title>Undangan Pernikahan {{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}}</title>
  </head>
  <body class="bg-background font-nunito-sans overflow-x-hidden">
    <header id="sampul">
      <div class="w-full min-h-screen flex flex-col items-center justify-center">
        <h1 class="font-bold text-4xl lg:text-8xl text-primary font-arizonia text-center">وَلِيْمَةُ الْعُرْسِ</h1>
        <p class="font-bold lg:text-3xl text-base mb-4 text-white">Walimatul Urs</p>
        <div class="lg:w-48 lg:h-48 w-36 h-36 rounded-full border-2 shadow shadow-white border-primary flex items-center justify-center">
          <img src="{{ asset('images/' . $undangan->foto_cover) }}" class="w-full h-full object-cover rounded-full" />
        </div>
        <div class="flex items-center justify-center font-bold text-3xl lg:text-6xl text-primary font-playfair-display italic text-center lg:gap-4 gap-3 mt-4">
          <h1 class="text-end">{{$undangan->nama_mempelai_wanita}}</h1>
          <div>&</div>
          <h1 class="text-start">{{$undangan->nama_mempelai_pria}}</span></h1>
        </div>
        <h1 class="font-bold lg:text-4xl text-2xl mt-4 text-primary font-arizonia text-center">{{ $tanggal_akad }}</h1>
        <p class="descript text-white mt-4">Acara akan dimulai dalam</p>
        <div class="simply-countdown font-abril-fatface lg:mt-0 mb-4 animate__animated animate__fadeIn" id="simply-countdown"></div>
      </div>
    </header>

    <main>
      <section id="opening">
        <div class="container text-center py-16 px-8 relative">
          <div class="text-primary text-2xl flex items-center justify-center gap-4 mb-4" data-aos="fade-up">
            <i class="bx bx-heart-circle bx-spin"></i>
            <i class="bx bx-heart-circle bx-spin"></i>
            <i class="bx bx-heart-circle bx-spin"></i>
          </div>
          <p class="descript lg:max-w-[80rem] mx-auto mb-8 text-primary italic" data-aos="zoom-in">
            Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang. Sesungguhnya pada
            yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berfikir.
          </p>
          <p class="descript font-roboto-condensed text-primary italic" data-aos="fade-up">(QS. Ar-Ruum : 21)</p>
        </div>
      </section>

      <section id="couple">
        <div class="container py-16 px-8 relative">
          <h3 class="text-xs lg:text-3xl italic mb-2 lg:mb-4 text-center text-white font-arizonia" data-aos="fade-up">بِسْــــــــــــــــــمِ اللهِ الرَّحْمَنِ الرَّحِيْمِ</h3>
          <h2 class="text-xl lg:text-4xl text-center text-white font-arizonia" data-aos="zoom-in">Assalamu'alaikum Warahmatullahi Wabarakatuh</h2>
          <p class="descript text-center lg:max-w-[60rem] mx-auto mt-2 lg:mt-4" data-aos="zoom-in">Dengan memohon Rahmat dan Ridho Allah SWT, Kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk hadir dalam pernikahan kami</p>

          <div class="flex items-center flex-col lg:flex-row justify-center lg:gap-8 gap-6 mt-12 w-full">
            <div class="flex items-center justify-center lg:gap-8 gap-6" data-aos="fade-up">
              <div class="text-center text-white">
                <h4 class="font-bold font-playfair-display text-base lg:text-2xl text-primary">{{$undangan->nama_mempelai_wanita}}</h4>
                <hr class="lg:my-4 my-2" />
                <p class="descript lg:mb-2">Putri dari</p>
                <p class="descript">Bapak {{ $undangan->nama_ayah_wanita }} dan Ibu {{ $undangan->nama_ibu_wanita }}</p>
              </div>
              <div class="couple-image w-[15rem] h-[24rem] lg:w-[20rem] lg:h-[32rem] border-4 border-primary">
                <img src="{{ asset('images/' . $undangan->foto_wanita) }}" alt="{{$undangan->nama_mempelai_pria}}" class="w-full h-full object-cover" />
              </div>
            </div>
            <div class="font-arizonia text-primary text-4xl" data-aos="zoom-in">Dengan</div>
            <div class="flex items-center justify-center lg:gap-8 gap-6" data-aos="fade-up">
              <div class="couple-image w-[15rem] h-[24rem] lg:w-[20rem] lg:h-[32rem] border-4 border-primary">
                <img src="{{ asset('images/' . $undangan->foto_pria) }}" alt="{{$undangan->nama_mempelai_pria}}" class="w-full h-full object-cover" />
              </div>
              <div class="text-center text-white">
                <h4 class="font-bold font-playfair-display text-base lg:text-2xl text-primary">{{$undangan->nama_mempelai_pria}}</h4>
                <hr class="lg:my-4 my-2" />
                <p class="descript lg:mb-2">Putra pertama dari</p>
                <p class="descript">Bapak {{ $undangan->nama_ayah_pria }} dan Ibu {{ $undangan->nama_ibu_pria }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="event">
        <div class="container text-center py-16 px-4" data-aos="zoom-in">
          <div class="lg:w-[80%] mx-auto rounded-[1rem] pb-12">
            <div class="event-header w-full lg:h-[35rem] h-[23rem] relative flex items-center justify-center">
              <h1 class="font-bold font-arizonia lg:text-6xl text-xl z-10 text-primary">Save The Date</h1>
            </div>
            <div class="mt-8 lg:mb-4">
              <p class="descript" data-aos="fade-up">Akan diselenggarakan pada</p>
              <h2 class="lg:text-4xl text-xl font-arizonia text-primary" data-aos="zoom-in">{{ $tanggal_akad }}</h2>
            </div>
            <div class="flex flex-col lg:flex-row p-4 items-center justify-center lg:gap-10 gap-4">
              <div class="flex items-center justify-center flex-col lg:py-12 lg:px-16 px-12 gap-4" data-aos="fade-up">
                <h3 class="lg:text-4xl text-xl font-arizonia text-primary">Akad Nikah</h3>
                <div class="w-14 h-14 flex items-center justify-center rounded-full border-2 border-primary text-primary text-3xl">
                  <i class="bx bxs-calendar"></i>
                </div>
                <div>
                  <h3 class="lg:text-2xl text-xl font-roboto-condensed font-bold text-primary">{{ $tanggal_akad }}</h3>
                  <p class="descript">Pukul {{ $jam_akad }} s.d selesai</p>
                </div>
                <div class="flex items-center justify-center text-primary text-2xl gap-2">
                  <div class="bg-primary w-[100px] h-[1px]"></div>
                  <i class="bx bxs-home"></i>
                  <div class="bg-primary w-[100px] h-[1px]"></div>
                </div>
                <div class="w-14 h-14 flex items-center justify-center rounded-full border-2 border-primary text-primary text-3xl">
                  <i class="bx bxs-map-alt"></i>
                </div>
                <div class="text-center descript">
                  {{ $undangan->lokasi_acara }}
                </div>
              </div>
              <div class="flex items-center justify-center flex-col lg:py-12 lg:px-16 px-12 gap-4" data-aos="fade-up">
                <h3 class="lg:text-4xl text-xl font-arizonia text-primary">Resepsi</h3>
                <div class="w-14 h-14 flex items-center justify-center rounded-full border-2 border-primary text-primary text-3xl">
                  <i class="bx bxs-calendar"></i>
                </div>
                <div>
                  <h3 class="lg:text-2xl text-xl font-roboto-condensed font-bold text-primary">{{ $tanggal_resepsi }}</h3>
                  <p class="descript">Pukul {{ $jam_akad }} s.d selesai</p>
                </div>
                <div class="flex items-center justify-center text-primary text-2xl gap-2">
                  <div class="bg-primary w-[100px] h-[1px]"></div>
                  <i class="bx bxs-home"></i>
                  <div class="bg-primary w-[100px] h-[1px]"></div>
                </div>
                <div class="w-14 h-14 flex items-center justify-center rounded-full border-2 border-primary text-primary text-3xl">
                  <i class="bx bxs-map-alt"></i>
                </div>
                <div class="text-center descript">
                    {{ $undangan->lokasi_acara }}
                </div>
              </div>
            </div>
            <a href="{{ $undangan->maps }}" data-aos="zoom-in" target="_blank" class="bg-primary text-white py-2 px-4 lg:py-3 lg:px-6 rounded-full lg:text-2xl hover:bg-yellow-500">
              <i class="bx bxs-map-alt"></i>
              Buka Peta
            </a>
          </div>
        </div>
        <div class="greeting w-full relative text-center py-16 px-8">
          <p class="descript lg:max-w-[80rem] mx-auto mb-8" data-aos="zoom-in">
            Ucapan terima kasih yang dalam kami sampaikan kepada semua tamu yang berkenan hadir dalam pernikahan kami. Kehadiran Anda telah membuat hari itu lebih berarti dan penuh cinta. Semoga kasih sayang yang kami rasakan pada hari itu
            terus berkembang dan membawa kebahagiaan dalam hidup kita semua
          </p>
          <div class="lg:w-[50%] w-[70%] mx-auto" data-aos="fade-up">
            <img src="{{asset('Undangan-Tema-4')}}/assets/img/background/1.png" alt="" />
          </div>
          <p class="font-playfair-display text-primary italic descript lg:max-w-[80rem] mx-auto my-8" data-aos="zoom-in">
            "Hai manusia, sesungguhnya Kami menciptakan kamu dari seorang laki-laki dan seorang perempuan dan menjadikan kamu berbangsa-bangsa dan bersuku-suku supaya kamu saling kenal-mengenal. Sesungguhnya orang yang paling mulia diantara
            kamu disisi Allah ialah orang yang paling takwa di antara kamu. Sesungguhnya Allah Maha Mengetahui lagi Maha Mengenal"
          </p>
          <p class="descript font-roboto-condensed text-primary italic">(QS. Al-Hujurat : 13)</p>
        </div>
      </section>

      <section id="rsvp">
        <div class="container py-16 px-6">
          <div class="text-primary text-2xl flex items-center justify-center gap-4 mb-4" data-aos="fade-up">
            <i class="bx bx-heart-circle bx-spin"></i>
            <i class="bx bx-heart-circle bx-spin"></i>
            <i class="bx bx-heart-circle bx-spin"></i>
          </div>
          <h1 class="text-center text-xl lg:text-4xl text-primary font-arizonia" data-aos="zoom-in">Konfirmasi Kehadiran</h1>
          <div class="lg:w-[80%] mx-auto rounded-[1rem] pb-8 mt-8 bg-white border-2 border-primary" data-aos="zoom-in">
            <hr class="border-b border-primary" />
            <div class="lg:p-8 p-4">
                {{--
                    Two Col split width
                    | Nama | Jumlah Tamu |
                    One Col full width
                    | Radio Kehadiran
                    --}}
                <form id="rsvp_form" action="/undangan/rsvp/{{ $tamu->kode ?? '' }}" method="POST" class="grid justify-center">
                    @csrf
                    <div class="flex flex-col lg:flex-row p-4 items-center justify-center lg:gap-10 gap-4">
                        <div>
                            <label for="nama" class="block text-primary">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div>
                            <label for="jumlah" class="block text-primary">Jumlah Tamu</label>
                            <select name="jumlah" id="jumlah" class="form-control w-full" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="kehadiran" class="text-primary">Kehadiran</label>
                        <div class="flex flex-col gap-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check input" type="radio" name="kehadiran" id="kehadiran" value="1" required>
                                <label class="form-check-label" for="kehadiran">Tentu saja kami akan hadir.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kehadiran" id="kehadiran" value="0" required>
                                <label class="form-check-label" for="kehadiran">Sayangnya kami tidak bisa hadir.</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-primary text-white py-2 px-4 lg:py-3 lg:px-6 rounded-full lg:text-2xl hover:bg-yellow-500">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="container py-16 px-8 relative">
        <div class="lg:w-[50%] w-[70%] mx-auto">
          <img src="{{asset('Undangan-Tema-4')}}/assets/img/background/1.png" alt="" />
        </div>
        <h1 class="text-center text-xl lg:text-4xl text-primary lg:mt-4 mt-2 font-arizonia">Kami Yang Berbahagia</h1>
        <div class="flex flex-col lg:flex-row items-center justify-center lg:gap-56 gap-8 lg:mt-14 mt-4 w-full">
          <div class="text-center">
            <h3 class="text-xl lg:text-4xl text-white font-arizonia">Keluarga Besar</h3>
            <h3 class="text-xl lg:text-6xl text-primary font-arizonia lg:mt-2">Mempelai Wanita</h3>
            <p class="text-primary descript lg:mt-4">Bapak {{ $undangan->nama_ayah_wanita }} Ibu {{ $undangan->nama_ibu_wanita }}</p>
          </div>
          <div class="text-center">
            <h3 class="text-xl lg:text-4xl text-white font-arizonia">Keluarga Besar</h3>
            <h3 class="text-xl lg:text-6xl text-primary font-arizonia lg:mt-2">Mempelai Pria</h3>
            <p class="text-primary descript lg:mt-4">Bapak {{ $undangan->nama_ayah_pria }} {{ $undangan->nama_ibu_pria }}</p>
          </div>
        </div>
        <div class="text-center mt-8">
          <h3 class="text-xl lg:text-4xl text-white font-arizonia mb-2">Turut Mengundang</h3>
          <p class="text-primary descript">Keluarga Besar dari kedua mempelai</p>
        </div>
      </div>
    </footer>

    <!-- sampul undangan -->
    <div class="sampul fixed top-0 left-0 right-0 bottom-0 bg-background flex items-center justify-center flex-col gap-4">
      <div class="lg:w-48 lg:h-48 w-36 h-36 rounded-full lg:border-4 border-2 shadow shadow-white border-primary flex items-center justify-center">
        <img src="{{ asset('images/' . $undangan->foto_cover) }}" alt="depi & yogi" class="w-full h-full object-cover rounded-full" />
      </div>
      <div class="flex items-center justify-center flex-col text-center">
        <p class="descript text-primary">Kepada Bapak/Ibu/Saudara/i :</p>
        <h1 class="font-bold lg:text-4xl text-xl text-primary font-arizonia">
            @if ($tamu)
              {{$tamu->nama_tamu}}
            @else
              {{$undangan->nama_mempelai_pria}} & {{$undangan->nama_mempelai_wanita}}
            @endif
        </h1>
      </div>
      <div class="flex items-center justify-center font-bold text-3xl lg:text-6xl text-primary font-playfair-display italic lg:gap-4 gap-3 mt-4 lg:mt-0">
        <h1 class="text-end">{{$undangan->nama_mempelai_wanita}}</h1>
        <div>&</div>
        <h1 class="text-start">{{$undangan->nama_mempelai_pria}}</h1>
      </div>
      <button
        type="button"
        class="flex items-center justify-center bg-[#151514] shadow shadow-primary lg:p-4 p-2 gap-2 text-[0.8rem] hover:bg-primary transition-all hover:font-bold lg:text-xl rounded-[3rem] text-primary hover:text-white"
        id="open-wedding"
      >
        <i class="bx bx-book-open text-base lg:text-3xl"></i>
        Buka Undangan
      </button>
    </div>

    <!-- navbar bottom -->
    <div class="navigasi">
      <a href="#sampul">
        <i class="bx bxs-home-heart"></i>
      </a>
      <a href="#couple">
        <i class="bx bxs-heart"></i>
      </a>
      <a href="#event">
        <i class="bx bxs-calendar-heart"></i>
      </a>
      <a href="#gallery">
        <i class="bx bxs-photo-album"></i>
      </a>
      <a href="#wishes">
        <i class="bx bxs-envelope"></i>
      </a>
      <a href="#gift">
        <i class="bx bxs-gift"></i>
      </a>
    </div>

    <!-- backsound -->
    <div class="backsound">
      <audio id="song" autoplay loop>
        <source src="{{asset('Undangan-Tema-4')}}/assets/audio/asmalibrasi.mp3" type="audio/mp3" />
      </audio>
      <div class="flex items-center justify-center flex-col gap-4 fixed top-[50%] right-2 bg-background p-2 opacity-60 rounded-2xl">
        <div class="audio-play">
          <i class="bx bx-disc"></i>
        </div>
      </div>
    </div>

    <style>
        .event-header::before {
            background-image: linear-gradient(rgba(78, 82, 91, 0.5), rgba(91, 94, 100, 0.5)), url('{{ asset('images/' . $undangan->foto_prewed) }}');
        }
    </style>
    <script src="{{asset('Undangan-Tema-4')}}/src/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('Undangan-Tema-4')}}/src/simplyCountdown.min.js"></script>
    <script src="{{asset('Undangan-Tema-4')}}/src/script.js"></script>
    <script>
        // countdown
        simplyCountdown('#simply-countdown', {
            year: {{$tahun_akad_countdown}},
            month: {{$bulan_akad_countdown}},
            day: {{$tanggal_akad_countdown}},
            hours: {{$jam_akad_countdown}},
            minutes: 0,
            seconds: 0,
            words: {
                days: { singular: 'hari', plural: 'hari' },
                hours: { singular: 'jam', plural: 'jam' },
                minutes: { singular: 'menit', plural: 'menit' },
                seconds: { singular: 'detik', plural: 'detik' },
            },
        });

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

            alert('Konfirmasi Kehadiran Berhasil Dikirim');
            form.reset();

            } catch (error) {
            console.error(error);
            }
        });
    </script>
  </body>
</html>
