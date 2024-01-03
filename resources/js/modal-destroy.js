export default (() => {

  const modalDestroy = document.querySelector('.modal-destroy');

  document.addEventListener("openModalDestroy", event => {
    document.querySelector('.confirmation-button').dataset.endpoint = event.detail.endpoint;
    modalDestroy.classList.add('active');
  });

  modalDestroy.addEventListener('click', async event => {

    if(event.target.closest('.confirmation-button')){

      const confirmationButton = event.target.closest('.confirmation-button')
      const endpoint = confirmationButton.dataset.endpoint;

      try{

        const response = await fetch(endpoint, {
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
          },
          method: 'DELETE'
        })
  
        if (response.status === 500) {
          throw response
        }
  
        if (response.status === 200) {  

          modalDestroy.classList.remove('active');
  
          const json = await response.json();

          console.log(json)

          document.dispatchEvent(new CustomEvent('refreshForm', {
            detail: {
              form: json.form,
            }
          }));

          document.dispatchEvent(new CustomEvent('refreshTable', {
            detail: {
              table: json.table,
            }
          }));

          document.dispatchEvent(new CustomEvent('notification', {
            detail: {
              message: json.message,
              type: 'success'
            }
          }))
        }

      }catch(error){

        if (error.status === 500) {

          const json = await error.json();

          document.dispatchEvent(new CustomEvent('notification', {
            detail: {
              message: json.message,
              type: 'error'
            }
          }))
        }
      }

    }

    if(event.target.closest('.cancel-button')){
      modalDestroy.classList.remove('active');
    }
  });

})();