import Slider from "./Slider";
import ImageSwitcher from "./ImageSwitcher";
import RevealForm from "./RevealForm"
import Navigation from "./Navigation"
import MobileNavigation from "./MobileNavigation"
import ArchiveTabs from "./ArchiveTabs";
import MembersTabs from "./MembersTabs";
import LoadMore from "./LoadMore";
import ReadMore from "./ReadMore";
import MenuDesktop from "./MenuDesktop";

var prev 	= 0;

const app = {
	onResize: () => {
	},
	
	onScroll: () => {
		var nav 		= document.querySelector("header.header");
		var scrollTop 	= window.pageYOffset || 0;

		if (scrollTop > prev) {
			nav.classList.add("scrolled-up");
		} else {
			nav.classList.remove("scrolled-up");
		}

		prev = scrollTop;
	},
	
	init: () => {
    Slider.init();
    ImageSwitcher.init()
    RevealForm.init()
    Navigation.init()
    MobileNavigation.init()
    ArchiveTabs.init()
    MembersTabs.init()
    LoadMore.init()
    ReadMore.init()
    MenuDesktop.init()

	},

};

document.addEventListener("DOMContentLoaded", () => {
	app.init();

	window.addEventListener("resize", app.onResize);
	window.addEventListener("scroll", app.onScroll);
	window.dispatchEvent(new Event("resize"));
	window.dispatchEvent(new Event("scroll"));
});



