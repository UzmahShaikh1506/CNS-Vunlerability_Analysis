<?php

if( isset( $_POST[ 'submit' ] ) ) {

    // Get input
    $target = $_REQUEST[ 'ip' ];

    // Create a blacklist of dangerous characters we want to remove.
    $substitutions = array(
        '&&' => '',
        ';'  => '',
    );

    // Remove any of the blacklisted characters from the user's input.
    $target = str_replace( array_keys( $substitutions ), $substitutions, $target );

    // Determine OS and execute the ping command using the sanitized input.
    if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
        // Windows
        $cmd = shell_exec( 'ping  ' . $target );
    }
    else {
        // *nix
        $cmd = shell_exec( 'ping  -c 4 ' . $target );
    }

    // Feedback for the end user
    $html = "<pre>{$cmd}</pre>";
}

?>