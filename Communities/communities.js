/*function to toggle dropdowns in sidebar*/

function toggleMenu(button){
    button.nextElementSibling.classList.toggle('show');
    button.classList.toggle('rotate');
}

/*function to toggle dropdowns in sidebar profile*/

function showOptions(button){
    
    const dropMenu = document.querySelector('.profile-actions');
    dropMenu.classList.toggle('show');
    button.classList.toggle('rotate');
}


/*function to toggle add community menu*/

const createButton = document.querySelector('.btn-add-comms');

createButton.addEventListener('click',function(){
    const menu = document.querySelector('.create-community-modal');

    menu.classList.add('show');
})

