AOS.init({
    // offset: 90,
    disable: 'mobile',
    duration: 500,
  });

$(window).scroll(function () {
  var sticky = $('header'),
      scroll = $(window).scrollTop();
  if (scroll >= 50) sticky.addClass('stickyHeader');
  else sticky.removeClass('stickyHeader');
});


var swiper = new Swiper(".mySwiper", {
	  slidesPerView: 5,
    spaceBetween: 30,
    slidesPerGroup: 1,
    centeredSlides: false,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
	navigation: {
	  nextEl: ".swiper-button-next",
	  prevEl: ".swiper-button-prev",
	},
  on: {
    init() {
      this.el.addEventListener('mouseenter', () => {
        this.autoplay.stop();
      });

      this.el.addEventListener('mouseleave', () => {
        this.autoplay.start();
      });
    }
    },
	keyboard: true,
	breakpoints: {
		  992: {
            slidesPerView: 5,
          },
          991: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 3,
          },
          320: {
            slidesPerView: 1,
            slidesPerGroup: 1,
          },
        },
});

var swiper = new Swiper(".mySwiper1", {
    slidesPerView: 2,
    spaceBetween: 30,
    slidesPerGroup: 1,
    centeredSlides: false,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  on: {
    init() {
      this.el.addEventListener('mouseenter', () => {
        this.autoplay.stop();
      });

      this.el.addEventListener('mouseleave', () => {
        this.autoplay.start();
      });
    }
    },
  keyboard: true,
  breakpoints: {
      992: {
            slidesPerView: 2,
          },
          991: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 1,
          },
          320: {
            slidesPerView: 1,
            slidesPerGroup: 1,
          },
        },
});


      let digitValidate = function(ele){
  console.log(ele.value);
  ele.value = ele.value.replace(/[^0-9]/g,'');
}

let tabChange = function(val){
    let ele = document.querySelectorAll('input');
    if(ele[val-1].value != ''){
      ele[val].focus()
    }else if(ele[val-1].value == ''){
      ele[val-2].focus()
    }   
 }


