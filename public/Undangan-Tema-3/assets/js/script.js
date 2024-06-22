/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
  origin: "top",
  distance: "60px",
  duration: 2500,
  delay: 400,
  // reset:true
});

sr.reveal(
  `.hero, .hero__title, .hero__subtitle, .hero__description, .home, .row, .couple, .info`
);
sr.reveal(`.heart`, { delay: 500 });
sr.reveal(`.simply-countdown`, { delay: 600 });
sr.reveal(`.info, .story`, { delay: 700 });
sr.reveal(`.hero__button, .info__button`, { delay: 800, origin: "bottom" });
sr.reveal(`.logos__img`, { interval: 100 });
sr.reveal(`.home__title, .home__description, .hero__title, .hero__subtitle, .hero__description, .simply-countdown, .couple__title, .couple__subtitle, .couple__img, .info__title, .info__subtitle, .description, info__img, .story__title, .story__subtitle, .timeline-image, .timeline-panel`, { delay: 800, origin: "left" });
sr.reveal(`.couple-img, .couple-title, .couple-subtitle, .timeline-inverted, .timeline-right`, {
  delay: 800,
  origin: "right",
});
