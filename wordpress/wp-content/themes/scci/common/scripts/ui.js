var mobileToggleElement = document.querySelector('.mobile_nav_bar'),
    navMenuLinksElement = document.querySelector('.nav_menu__links');

mobileToggleElement.addEventListener('click', function(e) {
  navMenuLinksElement.classList.remove('hide');
  navMenuLinksElement.classList.add('show');
});

navMenuLinksElement.addEventListener('click', function(e) {
  navMenuLinksElement.classList.remove('show');
  navMenuLinksElement.classList.add('hide');
});