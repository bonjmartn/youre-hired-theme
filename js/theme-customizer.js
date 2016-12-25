(function( $ ) {

    wp.customize( 'youre_hired_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'body' ).css( 'font-family', to ); 
            $( 'button' ).css( 'font-family', to ); 
            $( 'input' ).css( 'font-family', to ); 
            $( 'select' ).css( 'font-family', to ); 
            $( 'textarea' ).css( 'font-family', to );  
        } );
    }); 

    wp.customize( 'youre_hired_accent_color', function( value ) {
        value.bind( function( to ) {
            $( '.contact' ).css( 'background-color', to );
            $( '.name-headline .fa' ).css( 'color', to );
            $( '.name-headline a .fa' ).css( 'color', to );
            $( '.name-headline a:visited .fa' ).css( 'color', to );
            $( '.exp-title' ).css( 'border-color', to );
            $( '.exp-dates' ).css( 'border-color', to );
        } );
    });


})( jQuery );