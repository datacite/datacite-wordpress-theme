import Swiper, {Autoplay, Navigation, Pagination} from "swiper";

class Slider {
  constructor() {
  }

  init() {

    let logoSlider = new Swiper('.logos-section__slider.swiper', {
      modules: [Navigation, Pagination, Autoplay],
      paginationClickable: true,
      loop: true,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {

        1200: {
          slidesPerView: 4,
        },
        800: {
          slidesPerView: 3,
        },
        560: {
          slidesPerView: 2,
          spaceBetween: 12,

        }
      }
    });

    let newsSlider = new Swiper('.front-page-hero__slider.swiper', {
      modules: [Navigation, Pagination, Autoplay],
      paginationClickable: true,
      loop: true,
      speed: 600,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      center: false,
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        1800: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 3,
        },
        800: {
          slidesPerView: 2,
        },
        560: {
          slidesPerView: 2,
          spaceBetween: 12,
        }
      }
    });

    let categoriesSlider = new Swiper('.categories__slider-container.swiper', {
      modules: [Navigation, Pagination],
      paginationClickable: true,
      loop: true,
      slidesPerView: 'auto',
      spaceBetween: 40,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
    });

    let membersNav = new Swiper('.governance-past-members__slider.swiper', {
      modules: [Navigation, Pagination],
      paginationClickable: true,
      loop: false,
      slidesPerView: 'auto',
      spaceBetween: 5,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {

        1200: {
          slidesPerView: 5,
        },
        800: {
          slidesPerView: 5,
        },
        560: {
          slidesPerView: 4,
          spaceBetween: 12,

        }
      }
    });

    let archivesNav = new Swiper('.archives__yearly', {
      modules: [Navigation, Pagination],
      paginationClickable: true,
      loop: false,
      slidesPerView: 'auto',
      spaceBetween: 5,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {

        1200: {
          slidesPerView: 4,
        },
        800: {
          slidesPerView: 5,
        },
        560: {
          slidesPerView: 4,
          spaceBetween: 12,

        }
      }
    });

    let pastMembers = new Swiper('.governance-past-members__slider.swiper', {
      modules: [Navigation, Pagination],
      paginationClickable: true,
      loop: false,
      slidesPerView: 'auto',
      spaceBetween: 5,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {

        1200: {
          slidesPerView: 5,
        },
        800: {
          slidesPerView: 5,
        },
        560: {
          slidesPerView: 4,
          spaceBetween: 12,

        }
      }
    });
  }
}

export default new Slider();
