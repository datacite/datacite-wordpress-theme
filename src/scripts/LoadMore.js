class LoadMore {
  constructor() {

  }

  init() {

    const loadMore = document.getElementById('loadmore');
    const allItems = [...document.querySelectorAll('.item')];
    const hid = [...document.querySelectorAll('.item.hidden')];

    if(hid && loadMore){

      hid.splice(0, 6).forEach(
        elem => elem.classList.remove('hidden')
      );

      if (allItems.length <= 6) {
        loadMore.classList.add('hidden');
      }


      loadmore.addEventListener('click', function(e) {
        e.preventDefault();

        hid.splice(0, 6).forEach(
          elem => elem.classList.remove('hidden')
        )

        if (hid.length == 0) {
          loadMore.classList.add('hidden');
        }
      });

    }

  }
}

export default new LoadMore();
