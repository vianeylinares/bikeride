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

window.addEventListener( 'resize', function monitorWidth(){

    navMenu = document.getElementsByClassName( 'nav-menu' );
    navMenu_display = navMenu[0].style.display;

    window_size = window.innerWidth;
    console.log(window_size);

    if( navMenu_display == 'none' && window_size >= 1200 ){
        navMenu[0].style.display = 'flex';
    }

    if( navMenu_display == 'flex' && window_size < 1200 ){
        navMenu[0].style.display = 'none';
        menuActive = false;
    }

} );