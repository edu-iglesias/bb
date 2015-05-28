$( document ).ready( function( $ ) { 
    setChangeActionToState();
    loadStateCity();
});

function setChangeActionToState(){
    // on change of the select state
    $( '#select_state' ).change( function() {
            loadStateCity();            
        }); // end change function
}

function setChangeActionToCity(){
    // on change of the city, to autosuggest zip codes
    $('#select_city').change( function() {
            loadCityZip();
        }); // end change function
}

function loadStateCity(){
    //get selected data
    var user_state = $('#select_state :selected').val();

    // send ajax request     
    $.get( "/ajax/state",{state:user_state}, function( data ) {
        // set the result in the div for the dropdown
        $("#div_city").html(data);
        // since new select replaces the text box the js should be applied after as well
        setChangeActionToCity();
        //Load Zip
        loadCityZip();

    });
}
function loadCityZip(){
    var user_city = $('#select_city :selected').val(); 
    // send ajax request     
    $.get( "/ajax/city",
            {city:user_city}, // data
            function( data ) {
                // replace data
                $("#div_zip").html(data);
            }
        );
}