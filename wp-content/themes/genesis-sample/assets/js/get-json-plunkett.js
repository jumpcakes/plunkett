$( document ).ready(function() {
    console.log( "ready!" );
    $.getJSON( "http://nextgen.plunketts.net/chemicals.json", function( json ) {
	  console.log(json);
	});
});