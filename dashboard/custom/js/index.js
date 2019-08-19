// global the manage memeber table 
var manageMemberTable;

$(document).ready(function() {
    manageMemberTable = $("#manageMemberTable").DataTable({
		"ajax": "php_action/retrieve.php",
		"order": []
	});
 
    
});

function removeMember(id = null) {
    if(id) {
        // click on remove button
        $("#removeBtn").unbind('click').bind('click', function() {
            $.ajax({
                url: 'php_action/remove.php',
                type: 'post',
                data: {id_bien : id},
                dataType: 'json',
                success:function(response) {
                    if(response.success == true) {                      
                        $(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                             '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');
 
                        // refresh the table
                        manageMemberTable.ajax.reload(null, false);
 
                        // close the modal
                        $("#removeMemberModal").modal('hide');
 
                    } else {
                        $(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                             '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                    }
                }
            });
        }); // click remove btn
    } else {
        alert('Error: Refresh the page again');
    }
}

function editMember(id = null) 
{
	if(id)
    {
        // remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");
        
        $('#id_bien').remove();
        
        //fetch data
        $.ajax
        ({
            url:'php_action/getSelectedMember.php',
            type: 'post',
            data:{id_bien :id},
            dataType :'json',
            success: function(response)
            {
                $('#editlibelle').val(response.libelle);
                
                $('#editcountry').val(response.pays);
                $('#editcity').append($('<option selected>').text(response.ville).attr('value', response.ville));
                $('#editlocalisation').val(response.localisation);
                $('#editcategories').val(response.categories);
                $('#editlogement').append($('<option selected>').text(response.subcategories).attr('value', response.subcategories));
                $('#editcapacite').val(response.capacite);
                $('#editypeCh').val(response.typechambre);
                $('#editypeLi').val(response.typelit);
                $('#editcategories').val(response.categories);
                $('#editdescription').val(response.description);
                
                $('#editnbr_chambres').val(response.nbr_chambres);
                
                $('#editnbr_lits').val(response.nbr_lits);
                $('#editnbr_salles').val(response.nbr_salles);
                $('#editprix_nuit').val(response.prix_nuit);
                $('#editequipement').val(response.equipement);

                
                
                $('.editMemberModal').append('<input type="hidden" name="id_bien" id="id_bien" value="'+response.id_bien+'" />')
                
                
                
                //here update
                
                $('#updateMemberForm').unbind('submit').bind('submit',function()
                {
                    $(".text-danger").remove();
                    
                    var form =$(this);
                    

                    // validation
                    var editlibelle = $("#editlibelle").val();
                    var editcategories = $("#editcategories").val();
                    var editlogement = $("#editlogement").val();
                    var editlocalisation = $("#editlocalisation").val(); 
                    var editcountry = $("#editcountry").val(); 
                    var editcity = $("#editcity").val();
                    var editcapacite = $("#editcapacite").val(); 
                    var editdescription = $("#editdescription").val();
                    var editypeCh = $("#editypeCh").val();
                    var editnbr_chambres = $("#editnbr_chambres").val();
                    var editypeLi = $("#editypeLi").val();
                    var editnbr_lits = $("#editnbr_lits").val();
                    var editnbr_salles = $("#editnbr_salles").val();
                    var editprix_nuit = $("#editprix_nuit").val();
                    var editequipement = $("#editequipement").val();
                    
                    
                    if(editlibelle == "") {
                        $("#editlibelle").closest('.form-group').addClass('has-error');
                        $("#editlibelle").after('<p class="text-danger">The Name field is required</p>');
                    } else {
                        $("#editlibelle").closest('.form-group').removeClass('has-error');
                        $("#editlibelle").closest('.form-group').addClass('has-success');				
                    }
                    
                    if(editcategories == "") {
                        $("#editcategories").closest('.form-group').addClass('has-error');
                        $("#editcategories").after('<p class="text-danger">The Name field is required</p>');
                    } else {
                        $("#editcategories").closest('.form-group').removeClass('has-error');
                        $("#editcategories").closest('.form-group').addClass('has-success');				
                    }
                    
                    if(editlogement == "") {
                        $("#editlogement").closest('.form-group').addClass('has-error');
                        $("#editlogement").after('<p class="text-danger">The Name field is required</p>');
                    } else {
                        $("#editlogement").closest('.form-group').removeClass('has-error');
                        $("#editlogement").closest('.form-group').addClass('has-success');				
                    }

                    if(editlocalisation == "") {
                        $("#editlocalisation").closest('.form-group').addClass('has-error');
                        $("#editlocalisation").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#editlocalisation").closest('.form-group').removeClass('has-error');
                        $("#editlocalisation").closest('.form-group').addClass('has-success');				
                    }
                    if(editcountry == "") {
                        $("#editcountry").closest('.form-group').addClass('has-error');
                        $("#editcountry").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#editcountry").closest('.form-group').removeClass('has-error');
                        $("#editcountry").closest('.form-group').addClass('has-success');				
                    }
                    if(editcity == "") {
                        $("#editcity").closest('.form-group').addClass('has-error');
                        $("#editcity").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#editcity").closest('.form-group').removeClass('has-error');
                        $("#editcity").closest('.form-group').addClass('has-success');				
                    }
                    
                    if(editcapacite == "") {
                        $("#editcapacite").closest('.form-group').addClass('has-error');
                        $("#editcapacite").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#editcapacite").closest('.form-group').removeClass('has-error');
                        $("#editcapacite").closest('.form-group').addClass('has-success');				
                    }

                    if(editdescription == "") {
                        $("#editdescription").closest('.form-group').addClass('has-error');
                        $("#editdescription").after('<p class="text-danger">The Name field is required</p>');
                    } else {
                        $("#editdescription").closest('.form-group').removeClass('has-error');
                        $("#editdescription").closest('.form-group').addClass('has-success');				
                    }
                    
                    if(editypeCh == "") {
                        $("#editypeCh").closest('.form-group').addClass('has-error');
                        $("#editypeCh").after('<p class="text-danger">The Name field is required</p>');
                    } else {
                        $("#editypeCh").closest('.form-group').removeClass('has-error');
                        $("#editypeCh").closest('.form-group').addClass('has-success');				
                    }

                    if(editnbr_chambres == "") {
                        $("#editnbr_chambres").closest('.form-group').addClass('has-error');
                        $("#editnbr_chambres").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#editnbr_chambres").closest('.form-group').removeClass('has-error');
                        $("#editnbr_chambres").closest('.form-group').addClass('has-success');				
                    }
                    
                    if(editypeLi == "") {
                        $("#editypeLi").closest('.form-group').addClass('has-error');
                        $("#editypeLi").after('<p class="text-danger">The Name field is required</p>');
                    } else {
                        $("#editypeLi").closest('.form-group').removeClass('has-error');
                        $("#editypeLi").closest('.form-group').addClass('has-success');				
                    }
                    
                    if(editnbr_lits == "") {
                        $("#editnbr_lits").closest('.form-group').addClass('has-error');
                        $("#editnbr_lits").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#editnbr_lits").closest('.form-group').removeClass('has-error');
                        $("#editnbr_lits").closest('.form-group').addClass('has-success');				
                    }
                    if(editnbr_salles == "") {
                        $("#editnbr_salles").closest('.form-group').addClass('has-error');
                        $("#editnbr_salles").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#editnbr_salles").closest('.form-group').removeClass('has-error');
                        $("#editnbr_salles").closest('.form-group').addClass('has-success');				
                    }
                    if(editprix_nuit == "") {
                        $("#editprix_nuit").closest('.form-group').addClass('has-error');
                        $("#editprix_nuit").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#editprix_nuit").closest('.form-group').removeClass('has-error');
                        $("#editprix_nuit").closest('.form-group').addClass('has-success');				
                    }
                    if(editequipement == "") {
                        $("#editequipement").closest('.form-group').addClass('has-error');
                        $("#editequipement").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#editequipement").closest('.form-group').removeClass('has-error');
                        $("#editequipement").closest('.form-group').addClass('has-success');				
                    }
                    
                    
                    if(editlibelle && editcategories && editlogement && editlocalisation && editcountry && editcity && editcapacite && editdescription && editypeCh && editnbr_chambres && editypeLi && editnbr_lits && editnbr_salles && editprix_nuit && editequipement) 
                    {
                        $.ajax
                        ({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: form.serialize(),
                            dataType: 'json',
                            success:function(response)
                            {
                                if(response.success == true)
                                {
                                    $(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                      '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                                    '</div>');

							         
                                    
                                     manageMemberTable.ajax.reload(null,false);
                                    $('.form-group').removeClass('has-success').removeClass('has-error');
                                    $('.text-danger').remove();
                                }
                                else
                                {
                                    $(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                      '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                                    '</div>');
                                }
                            }
                            
                        });
                    }
                    
                    
                    return false;
                });
                
            }
            
        });
        
        
        
        //update data
        
    }
    else 
    {
        alert('Error')
        
    }
}