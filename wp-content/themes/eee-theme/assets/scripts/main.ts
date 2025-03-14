document.addEventListener('DOMContentLoaded', () => {
  changeSiteHeaderStyle(false);

  window.onscroll = () => {
    changeSiteHeaderStyle(window.scrollY > 100);
  };
});

const changeSiteHeaderStyle = (isScrolled) => {
  const siteHeader = document.getElementById('site-header');
  const siteHeaderLinks = siteHeader.querySelectorAll('.desktop-nav a');
  const logoWhite = siteHeader.querySelector('.logo-white');
  const logoBlack = siteHeader.querySelector('.logo-black');
  const isHeroBlockPresent = document.querySelector('#hero-block');
  const sideMenu = <HTMLElement>siteHeader.querySelector('.side-menu');
  const burgerMenu = document.getElementById('burger-menu');

  const setStyles = (position, bgColor, linkColor, showLogoWhite, borderColor, sideMenuColor) => {
    siteHeader.style.position = position;
    siteHeader.style.backgroundColor = bgColor;
    siteHeader.style.borderColor = borderColor;
    burgerMenu.style.stroke = linkColor;
    siteHeaderLinks.forEach((item: HTMLElement) => {
      item.style.color = linkColor;
    });
    logoWhite.classList.toggle('hidden', !showLogoWhite);
    logoBlack.classList.toggle('hidden', showLogoWhite);
    sideMenu.style.color = sideMenuColor;
    sideMenu.style.stroke = sideMenuColor;
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

document.addEventListener('DOMContentLoaded', () => {
  const search = document.getElementById("search-form");
  const html = document.getElementById('html-scroll');
  
  document.getElementById('search-open').addEventListener("click", () => {
    search.style.display = 'flex';
    html.style.overflow = 'hidden';
  })

  document.getElementById('search-close').addEventListener("click", () => {
    
    search.style.display = 'none';
    html.style.overflow = 'initial';
  })
});

document.getElementById('burger-menu').addEventListener('click', () => {
  document.getElementById('mobile-nav').style.display = 'block';
})

document.getElementById('close-menu').addEventListener('click', () => {
  document.getElementById('mobile-nav').style.display = 'none';
})
