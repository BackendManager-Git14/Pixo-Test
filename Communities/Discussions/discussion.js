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



/*function to toggle interaction menu*/

function toggleOptionsMenu(event){
    const menu = document.querySelector('.interaction-buttons');
    menu.classList.toggle('active');
    if(document.getElementById('toggle-button-icon').className == "fa-solid fa-ellipsis"){
        document.getElementById('toggle-button-icon').className = "fa-solid fa-xmark";
    }
    else{
        document.getElementById('toggle-button-icon').className = "fa-solid fa-ellipsis";
    }

    event.stopPropagation();
}

/*function to extend or wrap up details of the topic*/

'For javascript <i class="fa-thin fa-down-left-and-up-right-to-center"></i>'

const heading = document.querySelector('.heading');
const details = document.querySelector('.details');

const icon = document.getElementById('toggle-text');

function toggleContent(event){
    if(details.style.display == 'none'){
        details.style.display = 'block';
        heading.style.marginBottom = "0.5rem";
        icon.innerHTML = "<i class='fa-solid fa-down-left-and-up-right-to-center' id='expand-icon'></i><span class='button-text' id='expand-icon-text'>Wrap</span>";
        icon.style.color = '#e3694a';
        
    }
    else{
        details.style.display = 'none';
        heading.style.marginBottom = "0rem";
        icon.innerHTML = "<i class='fa-solid fa-up-right-and-down-left-from-center' id='expand-icon'></i><span class='button-text' id='expand-icon-text'>Expand</span>";
        icon.style.color = 'white';
    }
    event.stopPropagation();
}

/*function to show discussion textarea*/

function toggleDiscussion(event){
    const menu = document.querySelector('.interactive-menu');
    const buttons_section = document.querySelector('.interaction-buttons');

    menu.classList.add('extend');
    buttons_section.classList.remove('active');
    buttons_section.classList.add('hide');

    if(document.getElementById('toggle-button-icon').className == "fa-solid fa-xmark"){
        document.getElementById('toggle-button-icon').className = "fa-regular fa-paper-plane";
        document.getElementById('toggle-button-icon').setAttribute("onclick","toggleButton(event)");
    }
    

    event.stopPropagation();
}

/*function to close discussion-input field*/

function toggleClose(event){
    if(document.getElementById('toggle-button-icon').className == "fa-regular fa-paper-plane"){
        document.getElementById('toggle-button-icon').className = "fa-solid fa-xmark";
        document.getElementById('toggle-button-icon').setAttribute("onclick","toggleMenu(event)");
    }

    const menu = document.querySelector('.interactive-menu');
    const buttons_section = document.querySelector('.interaction-buttons');

    menu.classList.remove('extend');
    buttons_section.classList.remove('hide');
    buttons_section.classList.add('active');
}

/*function to send comment test*/

function toggleButton(event){
    
}
