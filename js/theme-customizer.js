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
            $( 'footer' ).css( 'background-color', to );
            $( 'button:hover' ).css( 'background-color', to );
            $( '.name' ).css( 'background-color', to );
            $( '.skills h3' ).css( 'background-color', to );
            $( '.contact .fa' ).css( 'color', to );
            $( 'a .fa' ).css( 'color', to );
            $( 'a:visited .fa' ).css( 'color', to );
            $( '.floating-icons' ).css( 'color', to );
            $( 'button:hover' ).css( 'color', to );
            $( 'input[type="button"]:hover' ).css( 'color', to );
            $( 'input[type="reset"]:hover' ).css( 'color', to );
            $( 'input[type="submit"]:hover' ).css( 'color', to );
            $( 'footer button:hover' ).css( 'color', to );
            $( 'footer html input[type="button"]:hover' ).css( 'color', to );
            $( 'footer input[type="reset"]:hover' ).css( 'color', to );
            $( 'footer input[type="submit"]:hover' ).css( 'color', to );
            $( '.contact img' ).css( 'border-color', to );
            $( '.recommendations img' ).css( 'border-color', to );
            $( '.about h3' ).css( 'border-color', to );
            $( '.experience-title h3' ).css( 'border-color', to );
            $( '.education-title h3' ).css( 'border-color', to );
            $( '.languages-title h3' ).css( 'border-color', to );
            $( '.recommendations-title h3' ).css( 'border-color', to );
            $( '.projects-title h3' ).css( 'border-color', to );
            $( '.download-resume' ).css( 'border-color', to );


        } );
    });


})( jQuery );