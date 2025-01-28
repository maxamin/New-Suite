var modal = document.getElementsByClassName('modal language');

document.addEventListener('mouseup', function(e){
    let container = modal[0]?.getElementsByTagName('div')[0]?.getElementsByTagName('div')[0];

    if(!container?.contains(e.target)){
        modal[0].classList.remove('open')
    }
})

Array.from(document.querySelectorAll("[data-role='language-switch']")).map(switcher => {
    switcher.addEventListener('click', function(e){
        modal[0].classList.add('open')
    })
})