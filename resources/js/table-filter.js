export default (() => {

    const filter = document.querySelector(".filter");

    document.addEventListener("showFilterModal", event => {
        filter.classList.add('active');
    });

    
    filter?.addEventListener('click', async (event) => {
        if (event.target.closest('.cancel-filter')) {
            filter.classList.remove('active');
        }
    });
})();