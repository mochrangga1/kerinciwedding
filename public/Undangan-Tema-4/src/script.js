const imageFull = document.querySelector('.imageFull');
const swiperSlide = document.querySelectorAll('.swiper-slide');
swiperSlide.forEach((item) => {
  item.addEventListener('click', () => {
    const image = data.find((items) => items.id == parseInt(item.getAttribute('id')));
    imageFull.innerHTML = /* html */ `<img src="${image.image}" alt="yogi dan depi" class="w-full h-full object-cover rounded-[inherit]" />`;
  });
});

document.querySelectorAll('#btnCopy').forEach((btn) => {
  btn.addEventListener('click', () => {
    const contentCopy = btn.querySelector('p').innerText;
    navigator.clipboard.writeText(parseInt(contentCopy));
    btn.innerHTML = /* html */ `<i class="bx bx-check"></i> <p>copied</p>`;

    setInterval(() => {
      btn.innerHTML = /* html */ `<i class="bx bx-copy"></i> <p>${String(contentCopy)}</p>`;
    }, 2000);

    document.addEventListener('DOMContentLoaded', () => {
      btn.innerHTML = /* html */ `<i class="bx bx-copy"></i> <p>${String(contentCopy)}</p>`;
    });
  });
});

// audio play
let isPlaying = true;
const audioPlay = document.querySelector('.audio-play');
const song = document.querySelector('#song');

audioPlay.addEventListener('click', () => {
  if (isPlaying) {
    song.volume = 1;
    song.play();
    audioPlay.innerHTML = /* html */ `<i class="bx bx-pause-circle"></i>`;
  } else {
    song.volume = 0;
    song.pause();
    audioPlay.innerHTML = /* html */ `<i class="bx bx-play-circle"></i>`;
  }
  isPlaying = !isPlaying;
});

// scroll window
document.addEventListener('scroll', () => {
  const windowScroll = window.scrollY;
  if (windowScroll > 60) {
    document.querySelector('.navigasi').classList.toggle('active', windowScroll > 120);
    audioPlay.classList.toggle('active', windowScroll > 120);
  }
});

(function disableScroll() {
  scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
  window.onscroll = function () {
    window.scrollTo(scrollTop, scrollLeft);
  };
  document.querySelector(':root').style.scrollBehavior = 'auto';
})();

document.querySelector('#open-wedding').addEventListener('click', () => {
  document.querySelector('.sampul').classList.add('scroll');
  document.querySelector('header').classList.toggle('active');
  window.scrollTo(0, 0);
  document.querySelector(':root').style.scrollBehavior = 'smooth';
  window.onscroll = function () {};
  song.volume = 1;
  song.play();
  isPlaying = false;
  audioPlay.innerHTML = /* html */ `<i class="bx bx-pause-circle"></i>`;
});

// swiper
const swiper = new Swiper('.mySwiper', {
  slidesPerView: 4,
  spaceBetween: 10,
  freeMode: true,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});

// animate on scroll
AOS.init();
