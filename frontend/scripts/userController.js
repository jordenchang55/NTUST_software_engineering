$('a#logout-alert').click(function(){
    bootbox.confirm("Are you sure?", function(result) {
        if(result)
            alert("Confirm result: "+result);
    });
});

$('a#lock-screen').click(function(){
    alert('Lock Screen');
});

$('a#log-out').click(function(){
    alert('Log Out');
});