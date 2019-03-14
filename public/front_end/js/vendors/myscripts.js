//Setup del token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});




//Si occupa del filtro.
$("#filter").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            $('#filtercontainer').empty().append( data );
        }
    });


});


//Aggiunge prodotti al carrello
$('#cart').click(function(){
    $.post("/addtocart",
        {
            number: document.getElementById("number").value,
            itemid: $('#hiddenID').text(),
        },
        function(data) {

            $('#cartpartcontainer').empty().append( data );
            document.getElementById("cart").innerHTML = "Aggiunto!";
            document.getElementById("cart").disabled = true;
        }

    )
});

//Apre e chiude il form delle recensioni
$("#formButton").click(function(){
    $("#form1").toggle();
});
