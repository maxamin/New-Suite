var buttons = document.querySelectorAll("[role='copy']");

buttons.forEach(button => {
    button.addEventListener('click',(e)=>{
        button = e.target;
        inner = button.innerHTML
        navigator.clipboard.writeText(button.previousElementSibling?.innerHTML);
        //button.classList.add('bg-primary','text-white')
        button.innerHTML = "Copied!"

        setTimeout(() => {
            //button.classList.remove('bg-white', 'border-secondary', 'text-secondary')
            //button.classList.add('bg-secondary', 'border-0', 'text-white')
            button.innerHTML = inner
        },2000)
    }, false)
});