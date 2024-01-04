class ImageSwitcher {
  constructor() {

  }

  init() {

    const tabs = document.querySelectorAll(".our-values__tab");
    const contents = document.querySelectorAll(".our-values__tab-content");
    const con = document.querySelectorAll(".our-values__tab-con");


      tabs.forEach(tab => tab.addEventListener("click", function() {
      tabs.forEach(tab => tab.classList.remove("active"));
      contents.forEach(c => c.classList.remove("show-content"));
      con.forEach(con => con.classList.remove("show-content"));

      const contentId = this.dataset.content;
      const conId = this.dataset.content;

      this.classList.add("active");

      document.querySelector(`.our-values__tab-content[data-content="${contentId}"]`).classList.add("show-content");
      document.querySelector(`.our-values__tab-con[data-content="${conId}"]`).classList.add("show-content");
    }));

    }
}

export default new ImageSwitcher();
