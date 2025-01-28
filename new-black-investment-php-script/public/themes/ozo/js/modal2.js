var buttons = document.querySelectorAll("[role='close-modal2']");

console.log(buttons)

Array.from(buttons).map(button => {
    button.addEventListener('click', closeModal, false);
})

function closeModal(e){
    let modalId = e.target.getAttribute('target-id');
    let modal = document.getElementById(modalId);
    modal.classList.add('scale-up')

    setTimeout(()=>{
        modal.classList.add('hide') 
    },150)
}

function showModal(){
    let modal = document.getElementById('notificationModal');
    //console.log(modal.classList)
    
    setTimeout(()=>{
        modal.classList.remove('hide', 'scale-up');
    },2000)

    // setTimeout(()=>{
    //     modal.classList.add('scale-down') 
    // },150)
}

window.onload = showModal();