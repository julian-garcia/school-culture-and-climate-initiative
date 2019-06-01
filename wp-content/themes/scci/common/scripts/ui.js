var mobileNavElement = document.querySelector('.mobile_nav_bar'),
    navMenuLinksElement = document.querySelector('.nav_menu__links'),
    navHomeItem = document.querySelector('.nav_menu__home'),
    navHomeLink = document.querySelector('.nav_menu__home > a'),
    allNavLinks = document.querySelectorAll('.nav_menu__item > a'),
    allNavSubLinks = document.querySelectorAll('.sub-menu__item > a'),
    sliderElement = document.querySelector('.slider'),
    allSlides = document.querySelectorAll('.slider__slide'),
    sliderBullets = document.querySelectorAll('.slider__bullet'),
    sliderBulletsContainer = document.querySelector('.slider__bullets');

if (mobileNavElement) {
  mobileNavElement.addEventListener('click', function(e) {
    if(e.target.classList.contains('mobile_nav_bar__img')) {
      navMenuLinksElement.classList.remove('hide');
      navMenuLinksElement.classList.add('show');
    }
  });
}

navMenuLinksElement.addEventListener('click', function(e) {
  if(e.target.classList.contains('nav_menu__links')) {
    navMenuLinksElement.classList.remove('show');
    navMenuLinksElement.classList.add('hide');
  }

  // Replace the search menu item with a search box within the nav menu

  if(e.target.classList.contains('show_search')) {
    e.preventDefault();
    e.target.classList.add('nav_menu__search');
    e.target.nextElementSibling.classList.remove('nav_menu__search');
    var searchInput = e.target.nextElementSibling.querySelector('.search_form__input');
    searchInput.focus();
    searchInput.select();
  }

  if(e.target.parentElement.classList.contains('show_search')) {
    e.preventDefault();
    e.target.parentElement.classList.add('nav_menu__search');
    e.target.parentElement.nextElementSibling.classList.remove('nav_menu__search');
    var searchInput = e.target.parentElement.nextElementSibling.querySelector('.search_form__input');
    searchInput.focus();
    searchInput.select();
  }
});

if (sliderElement) {
  sliderElement.addEventListener('click', function(e) {
    var currentSlideIndex, nextIndex;
    var targetClassList = e.target.classList;

    if(targetClassList.contains('slider__next') || targetClassList.contains('slider__previous')) {
      allSlides.forEach(function(slide, i, slides) {
        if (slide.classList.contains('active')) currentSlideIndex = i;
        slide.classList.remove('active');
        slide.classList.add('inactive');
      });

      sliderBullets.forEach(function(bullet) {
        bullet.classList.remove('active');
        bullet.classList.add('inactive');
      });
      
      if(targetClassList.contains('slider__next')) {
        if (currentSlideIndex < allSlides.length - 1) {
          nextIndex = currentSlideIndex + 1;
        } else {
          nextIndex = 0;
        }
      }
      if(targetClassList.contains('slider__previous')) {
        if (currentSlideIndex > 0) {
          nextIndex = currentSlideIndex - 1;
        } else {
          nextIndex = allSlides.length - 1;
        }
      }

      allSlides[nextIndex].classList.remove('inactive');
      allSlides[nextIndex].classList.add('active');
      sliderBullets[nextIndex].classList.remove('inactive');
      sliderBullets[nextIndex].classList.add('active');
    }
  });
}

if (sliderBulletsContainer) {
  sliderBulletsContainer.addEventListener('click', function(e) {
    var targetClassList = e.target.classList;

    if (targetClassList.contains('slider__bullet')) {
      sliderBullets.forEach(function(bullet) {
        bullet.classList.remove('active');
        bullet.classList.add('inactive');
      });

      allSlides.forEach(function(slide) {
        slide.classList.remove('active');
        slide.classList.add('inactive');
      });

      targetClassList.remove('inactive');
      targetClassList.add('active');

      nextIndex = 0;
      sliderBullets.forEach(function(bullet, i) {
        if (bullet == e.target) nextIndex = i;
      });

      allSlides[nextIndex].classList.remove('inactive');
      allSlides[nextIndex].classList.add('active');
    }
  });
}

// Highlight the currently active page on page load
document.addEventListener('DOMContentLoaded', function() {
  showSearchForm.classList.remove('nav_menu__search');

  navHomeItem.classList.remove('active');
  if (navHomeLink.href == window.location.href) {
    navHomeItem.classList.add('active');
  }

  allNavLinks.forEach(function(link) {
    link.classList.remove('active');
    if (link.href == window.location.href) {
      link.classList.add('active');
    }
  });

  allNavSubLinks.forEach(function(link) {
    link.classList.remove('active');
    if (link.href == window.location.href) {
      link.classList.add('active');
      link.parentElement.parentElement.previousElementSibling.classList.add('active');
    }
  });
});
