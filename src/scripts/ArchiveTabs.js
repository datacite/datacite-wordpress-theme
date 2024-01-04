class ArchiveTabs {
  constructor() {

  }

  init() {

    const tabs = document.querySelectorAll(".archives__tab");
    const contents = document.querySelectorAll(".archives__tab-content");


    tabs.forEach(tab => tab.addEventListener("click", function() {
      tabs.forEach(tab => tab.classList.remove("open"));
      contents.forEach(c => c.classList.remove("show-content"));

      const contentId = this.dataset.content;
      this.classList.add("open");

      document.querySelector(`.archives__tab-content[data-content="${contentId}"]`).classList.add("show-content");

    }));

  }
}

export default new ArchiveTabs();


