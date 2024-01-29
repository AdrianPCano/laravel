export default (() => {

  const formSection = document.querySelector(".form");

  formSection.addEventListener("click", event => {

    if(event.target.closest('.tab')){
      const tab = event.target.closest('.tab')

      tab.parentElement.querySelector('.active').classList.remove('active')
      tab.classList.add('active')

      formSection.querySelector('.tab-content.active').classList.remove('active')
      formSection.querySelector(`.tab-content[data-tab="${tab.dataset.tab}"]`).classList.add('active')
    }
  })
})();