class MembersTabs {
  constructor() {

  }

  init() {

    const tabs = document.querySelectorAll(".governance-past-members__tab");
    const contents = document.querySelectorAll(".governance-past-members__tab-content");


    tabs.forEach(tab => tab.addEventListener("click", function() {
      tabs.forEach(tab => tab.classList.remove("open"));
      contents.forEach(c => c.classList.remove("show-content"));

      const contentId = this.dataset.content;
      this.classList.add("open");

      document.querySelector(`.governance-past-members__tab-content[data-content="${contentId}"]`).classList.add("show-content");

    }));

  }
}

export default new MembersTabs();


