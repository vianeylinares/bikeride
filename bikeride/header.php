<?php
/**
 * The header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bikeride
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Website title</title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="main-wrapper">
            <header class="header sticky_header">
                <div class="mobile-menu-control">
                    <button id="menu-toggle" type="button">
                        <span></span>
                    </button>
                    <a href="" class="brand">
                        <img src="" alt="" class="logo-image" style="display: none;" alt="">
                        <span class="logo-text">The Bike Ride</span>
                    </a>
                </div>
                <nav class="nav-menu">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="">Item 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="">Item 2</a>
                        </li>
                        <li class="nav-item">
                            <a href="">Item 3</a>
                        </li>
                        <li class="nav-item">
                            <a href="">Item 4</a>
                        </li>
                        <li class="nav-item">
                            <a href="">Item 5</a>
                        </li>
                    </ul>
                </nav>
                <div class="shop-items">
                    Store items
                </div>
            </header>
            <main class="main-content">