document.addEventListener('DOMContentLoaded', () => {
  changeSiteHeaderStyle(false);

  window.onscroll = () => {
    changeSiteHeaderStyle(window.scrollY > 100);
  };
});

const changeSiteHeaderStyle = (isScrolled) => {
  const siteHeader = document.getElementById('site-header');
  const siteHeaderLinks = siteHeader.querySelectorAll('nav a');
  const logoWhite = siteHeader.querySelector('.logo-white');
  const logoBlack = siteHeader.querySelector('.logo-black');
  const isHeroBlockPresent = document.querySelector('#hero-block');
  const sideMenu = siteHeader.querySelector('.side-menu');

  const setStyles = (position, bgColor, linkColor, showLogoWhite, borderColor, sideMenuColor) => {
    siteHeader.style.position = position;
    siteHeader.style.backgroundColor = bgColor;
    siteHeader.style.borderColor = borderColor;
    siteHeaderLinks.forEach((item: HTMLElement) => {
      item.style.color = linkColor;
    });
    logoWhite.classList.toggle('hidden', !showLogoWhite);
    logoBlack.classList.toggle('hidden', showLogoWhite);
    sideMenu.style.color = sideMenuColor;
    sideMenu.style.strokeColor = sideMenuColor;
  };

  if (isHeroBlockPresent) {
    if (isScrolled) {
      setStyles('fixed', '#FFF', '#000', false, '#CACACA', '#000');
    } else {
      setStyles('fixed', 'transparent', '#FFF', true, '#FFF', '#FFF');
    }
  } else {
    setStyles('relative', '#FFF', '#000', false, '#CACACA', '#000');
  }
};
