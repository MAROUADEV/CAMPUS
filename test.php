<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      

        <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'pays/ajaxPays.php',
                success:function(html){
                    $('#country').html(html);
                
                                      }
                   }); 
				   
				    });  
					
					
				   $( document ).ready(function() {
					   
					   $('#country').on('change',function(){//change function on country to display all state 
        var libelle_pays = $(this).val();
        if(libelle_pays){
            $.ajax({
                type:'POST',
                url:'pays/ajaxVilles.php',
                data:'libelle_pays='+libelle_pays,
                success:function(html){
                    $('#city').html(html);
                                      }
                   }); 
                      }else{
                           $('#city').html('<option value="">Choisissez le pays </option>');
                           }
    });
	
	});
	 
				   </script>
    
        <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'biens/ajaxCategorie.php',
                success:function(html){
                    $('#categories').html(html);
                
                                      }
                   }); 
				   
				    });  
					
					
				   $( document ).ready(function() {
					   
					   $('#categories').on('change',function(){//change function on country to display all state 
        var libelle = $(this).val();
        if(libelle){
            $.ajax({
                type:'POST',
                url:'biens/ajaxSub.php',
                data:'libelle='+libelle,
                success:function(html){
                    $('#logement').html(html);
                                      }
                   }); 
                      }else{
                           $('#logement').html('<option value="">Type de logement </option>');
                           }
    });
	
	});
	 
				   </script>

<form action="teest.php" method="post" class="search_form d-flex flex-row align-items-start justfy-content-start">
								<div class="search_form_content d-flex flex-row align-items-start justfy-content-start flex-wrap">
									
									<div >
										
                                        <select class="search_form_select" name="country" id="country"   
                                             data-live-search="true"  >
                                                <option value="" style="text-transform:capitalize;">Choisissez un pays</option>
                                        </select>
									</div>
                                    <div >
										
                                        <select class="search_form_select" name="city" id="city" standard title="Choisissez une ville" autofocus="autofocus" >
                                        <option value="" name="optcity" id="optcity" style="text-transform:capitalize;">Choisissez une ville</option>
                                    </select>
									</div>
                                    <div >
                                        <select name="categories" id="categories"   
                                     data-live-search="true" class="search_form_select"  >
                                        <option value="">Propriété</option>
                                    </select>
                                   </div>
                                    <div >
                                       <select name="logement" id="logement"   
                                     data-live-search="true" class="search_form_select" >
                                        <option value="">Type de logement</option>
                                    </select>
                                    </div>
                                    
									
								</div>
								<button type="submit" class="search_form_button ml-auto">Rechercher</button>
							</form>