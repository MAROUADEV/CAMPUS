
<script src="jquery.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                           $('#city').html('<option value="">Select country first</option>');
                           }
    });
	
	});
	 
				   </script>



<form method="post">



<div class="row">
					 
		
		  <div class="col-md-1 col-sm-12" id="lable1"></div>
                    
					 <div class="col-md-1 col-sm-12" id="lable1"><id="lable1">Country</div>
                    <div class="col-md-2">
                     
					<select name="country" id="country"   
 data-live-search="true" class="chosen selectpicker form-control" required>
					<option value="">Select Country</option>
					
                    </select>

                    </div>


                 <div class="col-md-1 col-sm-12" id="lable1"><id="lable1">City</div>
                    <div class="col-md-2">
                    <select class="selectpicker form-control" name="city" id="city" standard title="Select an Option" autofocus="autofocus" >
                    <option value="" name="optcity" id="optcity">Select an Option</option>
                    </select></div>
					
                  </div>
                         <input type="submit" name="submit"/>
                         
      </form>                   