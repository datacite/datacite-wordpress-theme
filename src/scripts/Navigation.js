class Navigation {
  constructor() {

  }

  init() {

    const hamburger = document.querySelector('.hamburger__desktop');
    const navigation = document.querySelector('.navigation')
    const body = document.querySelector('body');

    const hamburgerMobile = document.querySelector('.hamburger__mobile');
    const navigationMobile = document.querySelector('.navigation-mobile')

    hamburger.addEventListener('click',()=>{
      hamburger.classList.toggle('open')
      navigation.classList.toggle('open')
    })

    hamburger.addEventListener('keypress',(e)=>{
      if(e.keyCode === 13){
        hamburger.classList.toggle('open')
        navigation.classList.toggle('open')
      }
    })

    document.addEventListener('click', (e) => {
      if ( !e.target.closest('.navigation') && !e.target.closest('.hamburger__desktop') ) {
        hamburger.classList.remove('open')
        navigation.classList.remove('open')
      }
    })

    // navigation.addEventListener('mouseout', (event) => {
    //   if (event.target != navigation) {
    //     return;
    //   }
    //   hamburger.classList.remove('open')
    //   navigation.classList.remove('open')
    // });

    hamburgerMobile.addEventListener('click',()=>{
      hamburgerMobile.classList.toggle('open')
      navigationMobile.classList.toggle('open')
      body.classList.toggle('fixed_body')
    })

  }
}

export default new Navigation();
