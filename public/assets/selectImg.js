

function teste() {   
   
    $("#especialidade").change(function(event){
    $.get("medico/"+event.target.value+"",function(response,especialidade){
        console.log(1);
        
        
    });
    
});
}
    
     






