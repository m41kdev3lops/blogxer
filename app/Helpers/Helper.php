<?php

use Illuminate\Support\Facades\Auth;

/**
 * Flashes a message to the session to be displayed by sweetalert
 * 
 * @param string $message
 * @param string $class
 * @param string $title
 * 
 * @return True
 */
function swal( $message, $class = null, $title = null )
{
    session()->flash('message', $message);

    if ( $class ) session()->flash('message-class', $class);
    
    if ( $title ) session()->flash('title', $title);

    return True;
}


/**
 * Check if there's a logged in user
 * 
 * @param null
 * 
 * @return boolean
 */
function loggedIn()
{
    return Auth::check();
}


/**
 * Returns the logedin admin object
 * 
 * @param null
 * 
 * @return App/Admin
 */
function admin()
{
    return Auth::user();
}
