<?php

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
    return session()->has('loggedInAdmin');
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
    return session()->get('loggedInAdmin');
}


/**
 * Check if the user credentials are valid
 * 
 * @param string $email
 * @param string $password
 * 
 * @return boolean
 */
function authCheck(string $email, string $password)
{
    $admin = \App\Admin::where('email', $email)->first();

    if ( ! password_verify($password, $admin->password) ) return FALSE;

    return $admin;
}
