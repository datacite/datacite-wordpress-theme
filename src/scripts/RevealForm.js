class RevealForm {
  constructor() {

  }

  init() {

    const button = document.querySelector(".governance-form__button");
    const form = document.querySelector(".governance-form__form");


    if(button !== null){
      button.addEventListener("click", function() {

          form.classList.add("active")
          this.classList.add("hide")
        }
      )
    }

  }
}

export default new RevealForm();
