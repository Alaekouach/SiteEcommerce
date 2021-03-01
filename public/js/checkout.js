
$(document).ready(function(){    
   
    
    const forms  = document.querySelectorAll('#form_submit');  

    forms.forEach( (form) => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); 

                    const pushedbutton = document.getElementById("pushedbutton").value;
                    const produit_id = this.querySelector(".produit_id").value; 
                    var quantite = this.querySelector(".quantite").value; 
                    var prix = this.querySelector(".prix").value;

                    const data =
                    { 
                        produit_id : produit_id,
                        quantite : quantite,
                        prix : prix,
                        pushedbutton : pushedbutton
                    }


                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                    $.ajax({
                        url:"update-cart",
                        method:"POST",
                        data:data, 
                        success: function(tab)
                        {  
                            const selectorqte = "#" + produit_id ;
                            const selectst = "#st" + produit_id ;
                            const selectstt =  "#stt";
                            const selecttotal = "#total";

                            $(selectorqte).val(tab.qte);
                            $(selectst).text(tab.st);  
                            $(selectstt).text(tab.stt);
                            $(selecttotal).text(tab.total);   
                            
                        },   
                        error :function(qte){
                            
                            console.log("il y a eu une erreur ");
                        },            
                    });     
        }); 
    });
});