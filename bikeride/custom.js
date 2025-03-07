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

window.addEventListener( 'scroll', function fixedHeaderBackground(){

    the_header = document.getElementById('header');

    if( the_header.classList.contains('header-over-content') && window.scrollY >= 150 ){
        the_header.style.backgroundColor = '#be95c4';
    }

    if( the_header.classList.contains('header-over-content') && window.scrollY <= 149 ){
        the_header.style.backgroundColor = 'transparent';
    }

} );


var miniCart = document.getElementById( 'mini-cart' );
let miniCartActive = false;

if( miniCart !== null ){

    miniCart.addEventListener( 'click', function handleClick(){

        miniCartPanel = document.getElementsByClassName( 'dropdown-menu-mini-cart' );
        console.log(miniCartPanel);

        switch( miniCartActive ){
            case true:
                miniCartPanel[0].style.display = 'none';
                miniCartActive = false;
                break;
            case false:
                miniCartPanel[0].style.display = 'flex';
                miniCartActive = true;
                break;

        }

    } );

}