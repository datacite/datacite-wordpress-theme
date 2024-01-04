class MenuDesktop {
  constructor() {

  }

  init() {

    const lvl1Links = document.querySelectorAll('.nav-tabs > li > a');

    lvl1Links.forEach((lvl1Link) => {
      lvl1Link.addEventListener('keypress', function(e) {
        if(e.keyCode === 13){
          makeActive(lvl1Link);
        }
      });
      lvl1Link.addEventListener('mouseover', function(){
        makeActive(lvl1Link)
      });
    });

    function makeActive(item) {

      let target = item.getAttribute('data-bs-target').replace('#','');

      document.querySelector('.navigation__nav-link.nav-link.active').classList.remove('active');
      document.querySelector('.navigation__tab-pane.active').classList.remove('active', 'show');

      item.classList.add('active');
      if ( target ) {
        document.getElementById(target).classList.add('show', 'active');
      }

    }

    const lvl2Links = document.querySelectorAll('.header-dropdown-item > a');

    lvl2Links.forEach((lvl2Link) => {

      const infoOpen        = String(lvl2Link.dataset.open)
      const currentParent   = String(lvl2Link.dataset.current);

      lvl2Link.addEventListener("mouseover", (e) => {
        e.preventDefault();

        const currentLvl2Links = document.querySelectorAll('#' + currentParent + ' .header-dropdown-item > a');

        currentLvl2Links.forEach((lvl2Link) => {
          lvl2Link.parentElement.classList.remove('visible');
        });
        lvl2Link.parentElement.classList.add('visible');

        const menuInfos = document.querySelectorAll('#' + currentParent + ' .header-dropdown__info');

        menuInfos.forEach((menuInfo) => {
          menuInfo.classList.remove('opened');
        });
        if(infoOpen && document.getElementById(infoOpen) !== null){
          document.getElementById(infoOpen).classList.add("opened");
        }

      });
    });

  }
}

export default new MenuDesktop();
