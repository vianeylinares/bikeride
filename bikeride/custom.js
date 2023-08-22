/* Custom JS */

var menuButton = document.getElementById( 'menu-toggle' );
let menuActive = false;

menuButton.addEventListener( 'click', function handleClick(){

    navMenu = document.getElementsByClassName( 'nav-menu' );
    console.log(navMenu);

    switch( menuActive ){
        case true:
            navMenu[0].style.display = 'none';
            menuActive = false;
            break;
        case false:
            navMenu[0].style.display = 'flex';
            menuActive = true;
            break;

    }

} );