$(function () {
  var dialog, form,

    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });

    form = dialog.find( "form" ).on( "submit", function( event ) {

    });

    $( "#add-image" ).on( "click", function() {
      dialog.dialog( "open" );

    });

    $( "#add-image-portfolio" ).on( "click", function() {
      window.location.href= 'add-portfolio.php';

    });


})