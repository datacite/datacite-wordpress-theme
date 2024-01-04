class MobileNavigation {
  constructor() {

  }

  init() {



    const navbarMenu = document.getElementById("navbar");
    const submenus = document.querySelectorAll('.menu-dropdown .menu');


    submenus.forEach((el)=>{
      el.classList.add('submenu')
    })

// Collapsible Mobile Submenu Function
    const collapseSubMenu = () => {
      navbarMenu.querySelector(".menu-dropdown.active .submenu").removeAttribute('style');
      navbarMenu.querySelector(".menu-dropdown.active").classList.remove("active");
    };

// Toggle Mobile Submenu Function
    const toggleSubMenu = (e) => {
      if (e.target.hasAttribute("data-toggle") && window.innerWidth <= 992) {
        e.preventDefault();
        const menuDropdown = e.target.parentElement;

        // If Dropdown is Expanded, then Collapse It
        if (menuDropdown.classList.contains("active")) {
          collapseSubMenu();
        } else {
          // Collapse Existing Expanded Dropdown
          if (navbarMenu.querySelector(".menu-dropdown.active")) {
            collapseSubMenu();
          }

          // Expanded the New Dropdown
          menuDropdown.classList.add("active");
          const subMenu = menuDropdown.querySelector(".submenu");
          subMenu.style.maxHeight = subMenu.scrollHeight + "px";
        }
      }
    };

// Fixed Resize Window Function
    const resizeWindow = () => {
      if (window.innerWidth > 992) {
        if (navbarMenu.classList.contains("active")) {
          toggleMenu();
        }
        if (navbarMenu.querySelector(".menu-dropdown.active")) {
          collapseSubMenu();
        }
      }
    };

// Initialize Event Listeners

    navbarMenu.addEventListener("click", toggleSubMenu);
    window.addEventListener("resize", resizeWindow);

  }




}

export default new MobileNavigation();






