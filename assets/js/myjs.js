$(document).ready(function(){
    // var today = new Date().toISOString().split('T')[0];
    // document.getElementsByClassName("currdate")[0].setAttribute('min', today);




	$("#custcontactno1").hide();
	$("#custemail1").hide();
	$("#custaddress1").hide();
	$("#custname1").hide();
$("#editClient").click(function(e){
	e.preventDefault();
    var base_url = window.location.origin;
	var number = $("#custcontactno1").val();
	var email = $("#custemail1").val();
	var address = $("#custaddress1").val();
	var id = $("#clientno1").val();
	var name = $("#custname1").val();
			$("#custcontactno1").toggle();
	$("#custemail1").toggle();
	$("#custaddress1").toggle();
	$("#custcontactno").toggle();
	$("#custemail").toggle();
	$("#custaddress").toggle();


	var $this = $(this);
		$this.toggleClass('EDIT');
		if($this.hasClass('EDIT')){
			$this.text('SAVE');	

		} else {
			$this.text('EDIT');
	
					 $.ajax({
					    type: "POST",
					    url: base_url+"/veterinaryv2/vetclinic/validate",
					     data: {name:name,id:id,cnum:number,email:email,addr:address},
					    success: function(msg){
					    	if(msg==1){
					 	
					 $.ajax({
					    type: "POST",
					    url: base_url+"/veterinaryv2/vetclinic/upClient",
					     data: {name:name,id:id,cnum:number,email:email,addr:address},
					    success: function(msg){
					    	
								$("#conerror").text('');	
								$("#cnume").removeClass("has-error has-feedback");
								$("#addrerror").text('');	
								$("#addre").removeClass("has-error has-feedback");
								$("#emailerror").text('');	
								$("#emaile").removeClass("has-error has-feedback");
								$("#custcontactno").text(number);				
								$("#custemail").text(email);
								$("#custaddress").text(address);
							
								alert('Record updated successfully');
						




							}
							
						});//end	
							}

							else{
					$("#custcontactno1").show();
					$("#custemail1").toggle();
					$("#custaddress1").toggle();
					$("#custcontactno").toggle();
					$("#custemail").toggle();
					$("#custaddress").toggle();
					$this.toggleClass('EDIT');
		if($this.hasClass('EDIT')){
			$this.text('SAVE');	}
			else{
					$this.text('EDIT');
			}
	
							var obj = JSON.parse(msg);
							if(obj.cnum!=null){
								$("#conerror").html(obj.cnum);	
								$("#cnume").addClass("has-error has-feedback");
								// $("#cnume").append("<span id='cnume1' class='glyphicon glyphicon-remove form-control-feedback'></span>");

							}
							else{
								$("#conerror").remove(obj.cnum);	
								$("#cnume").removeClass("has-error has-feedback");
								// $("#cnume1").remove();

							}
							if(obj.addr!=null){
					         	$("#addrerror").html(obj.addr);	
								$("#addre").addClass("has-error has-feedback");
								// $("#addre").append("<span id='addre1' class='glyphicon glyphicon-remove form-control-feedback'></span>");
							  }
							  else{
								$("#addrerror").remove(obj.addr);	
								$("#addre").removeClass("has-error has-feedback");
								// $("#addre1").remove();

							}
							 if(obj.email!=null){
							 	$("#emailerror").html(obj.email);	
								$("#emaile").addClass("has-error has-feedback");
								// $("#emaile").append("<span id='emaile1' class='glyphicon glyphicon-remove form-control-feedback'></span>");
							 }
							 else{
								$("#emailerror").remove(obj.email);	
								$("#emaile").removeClass("has-error has-feedback");
								// $("#emaile1").remove();

							}
							}
						}
						});//end
  		

		}



});
//end






});

                    


// computatiom
$(document).ready(function(){
			
				$(document).on('change','.addtm',function(){
					var base_url = window.location.origin;
					var id = "";
					var x=$(this).closest('tr').find(':selected').val();
					var z=$(this).closest('tr').find('.addtm').val();
					var prc=$(this).val();
				  	// $(".prd").val('hi');	
  					var y= $(this);		
			       var i;
			       var item;
			       var qty;
					var total=0;
					var total1=0;
					
					$.ajax({
			   				type: "POST",
						    url: base_url+"/veterinaryv2/vetclinic/ItemPrice",
						     data: {id:x,qty:z},
						    success: function(msg){
							var price =JSON.parse(msg);
									console.log(msg);
							
				for(i = 0; i < price.length; i++){
					if(z != 0){
						if(z >= price[i]['item_qty']){
							qtyLeft = price[i]['item_qty'];
							total += (price[i]['item_qty'] * price[i]['item_cost']);
						
						    z -= price[i]['item_qty'];
							//	add=price[0].item_cost*prc;	
						    	  $(y).closest('tr').find('.Tamount').val((total).toFixed(2));
						    	  	//$(y).closest('tr').find('.ITprice').val(parseInt(price[0].item_cost).toFixed(2));
									$(y).closest('tr').find('.prd').val(total);
						}
						else{
							total += (parseInt(z) * price[i]['item_cost']);
							console.log(total);
							
								 $(y).closest('tr').find('.Tamount').val((total).toFixed(2));
								 $(y).closest('tr').find('.prd').val(total);
								 
						    z = 0;	
						    
						}	
					}
					else{
						break;
					}
					
						   var sum=0;	
							var add=0;
							
						
									 $(".prd").each(function(){
								        sum += +$(this).val();
								   });
								   $("#hiddenSum").val(sum);
									


								 
									 	if(($("#sfew").val()).length!=0){
											
													var qwx=0;
													qwx=$("#sfew").val();
													total1=sum+parseFloat(qwx);
													// $("#costfee").val((qwx).toFixed(2));
													$("#costfee").val(total1.toLocaleString("en"));
													$("#costfee1").val(total1);
											}
									
											
									}
								  }
					});

				});	
				//disable negative
				$(document).ready(function(){
						$(document).on('keyup','.addtm',function(){
								 var num = this.value.match(/^\d+$/);
									  if (num === null) {	
	      							 this.value = "";
	   								 }
						});
						$(document).on('keyup','.minqty',function(){
								 var num = this.value.match(/^\d+$/);
									  if (num === null) {	
	      							 this.value = "";
	   								 }
						});

								$(document).on('keyup','.globalDisable',function(){
									 var num = this.value.match(/^[0-9]*\.?[0-9]+$/);
										  if (num === null) {	
		      							 this.value = "";
		   								 }
							});

				});


					//query for changing item
					$(document).on('change','.Vitems',function(){
							var base_url = window.location.origin;
					var id = "";
					var x=$(this).closest('tr').find(':selected').val();
					var z=$(this).closest('tr').find('.addtm').val();
					var prc=$(this).closest('tr').find('.addtm').val();
				  	// $(".prd").val('hi');	
  					var y= $(this);		
			       var i;
			       var item;
			       var qty;
					var total=0;
					var total1=0;
			
					if(z!=0){
					
					$.ajax({
			   				type: "POST",
						    url: base_url+"/veterinaryv2/vetclinic/ItemPrice",
						     data: {id:x},
							 success: function(msg){
								var price =JSON.parse(msg);
					var price =JSON.parse(msg);
									console.log(msg);
							
				for(i = 0; i < price.length; i++){
					if(z != 0){
						if(z >= price[i]['item_qty']){
							qtyLeft = price[i]['item_qty'];
							total += (price[i]['item_qty'] * price[i]['item_cost']);
						
						    z -= price[i]['item_qty'];
					
						    	  $(y).closest('tr').find('.Tamount').val((total).toFixed(2));
						    	    $(y).closest('tr').find('.Tamount').val((total).toFixed(2));
						    	  	//$(y).closest('tr').find('.ITprice').val(parseInt(price[0].item_cost).toFixed(2));
									$(y).closest('tr').find('.prd').val(total);
						}
						else{
							total += (parseInt(z) * price[i]['item_cost']);
							console.log(total);
							
								 $(y).closest('tr').find('.Tamount').val((total).toFixed(2));
								 	 $(y).closest('tr').find('.prd').val(total);
						    z = 0;	
						    
						}	
					}
					else{
						break;
					}
					
						   var sum=0;	
							var add=0;
							add=price[0].item_cost*prc;		
						
									 $(".prd").each(function(){
								        sum += +$(this).val();
								   });
								   $("#hiddenSum").val(sum);
									
	console.log(($("#sfew").val()).length);
								 
									 
											if(($("#sfew").val()).length!=0){
											
													var qwx=0;
													qwx=$("#sfew").val();
													total1=sum+parseFloat(qwx);
													// $("#costfee").val((qwx).toFixed(2));
													$("#costfee").val(total1.toLocaleString("en"));
													$("#costfee1").val(total1);
											}
											
									}
								  } 	



					});
				}

				});	
						//clear modal on close 
							$('#clientModal').on('hidden.bs.modal', function () {
								 location.reload();
							 	});
							});
				//revent submit if form not complete


				$(document).ready(function(e){
							$("#sbmtbtn").click(function(e){
								e.preventDefault();
								if($("#btn_get").val()=='')
								{

								
										alert('Please add service type');
									$(".srvcss").css("color","red");
								}
								else if($("#petfindings").val()=='')
								{
										$("#findingserror").html('You should add some Findings');
										alert('Please add some findings');
										  
								}
									else if($("#sfew").val()=='')
								{
										$("#sfew").html('Your have no service fee yet');
										alert('Add service fee');
										  
								}
								else {
								
								var base_url = window.location.origin;
								var x=0;
								var y=0;
								var a= $("#VpetsOwned").val();
								$('.addtm').each(function(){
										 x=$(this).closest('tr').find(':selected').val();
										 y= $(this).val();
									$.ajax({
												type: "POST",
						  						  url: base_url+"/veterinaryv2/vetclinic/historynew",
						   						  data: {itemid:x,qty_used:y,pet:a},
						   						 success: function(msg){
						   						 		console.log(msg);
														
														 	
								 				 }
												});
							



										 	
								});
							
									$("#hstryform").submit();

										 	
								}

							});



							// radio button


							$(".srvcs").click(function(){
								newp($(this).val());
								$("#btn_get").val($(this).val());
							});
							//validation
						 $("#custcontactno1").keyup(function(){



						 });
						

							
				});



				$(document).ready(function(){

						$('#sbmtPet').click(function(e){
		var base_url = window.location.origin;
							e.preventDefault();
							var pname=$('#Mypetname').val();
							var ptype=$('#addpetype').val();
							var pbreed=$('#addpetbreed').val();
							var pbday=$('#addpetbday').val();
							var pmark=$('#addpetmarkings').val();
							
							$.ajax({
													type: "POST",
						  						  url: base_url+"/veterinaryv2/vetclinic/validatePet",
						   						  data: {name:pname,type:ptype,breed:pbreed,bday:pbday,mark:pmark},
						   						 success: function(msg){
						   						 	console.log(msg);
						   						 	if(msg=='true'){
						   					// 	 		$("#Peterror").text('');	
														// $("#Perror").removeClass("has-error has-feedback");
														// $("#addrerror").text('');	
														// $("#addre").removeClass("has-error has-feedback");
														// $("#emailerror").text('');	
														// $("#emaile").removeClass("has-error has-feedback");
														// $("#custcontactno").text(number);				
														// $("#custemail").text(email);
														// $("#custaddress").text(address);
						   						 $('#addPetForm').submit();



						   						 	}
						   						 	else{

						   						var obj = JSON.parse(msg);

												if(obj.name!=null){
													$("#Peterror").html(obj.name);	
													$("#Perror").addClass("has-error has-feedback");
													// $("#cnume").append("<span id='cnume1' class='glyphicon glyphicon-remove form-control-feedback'></span>");

												}
												else{
													$("#Peterror").remove(obj.name);	
													$("#Perror").removeClass("has-error has-feedback");
													// $("#cnume1").remove();

												}
												if(obj.type!=null){
										         	$("#Typeerror").html(obj.type);	
													$("#Terror").addClass("has-error has-feedback");
													// $("#addre").append("<span id='addre1' class='glyphicon glyphicon-remove form-control-feedback'></span>");
												  }
												  else{
													$("#Typeerror").remove(obj.type);	
													$("#Terror").removeClass("has-error has-feedback");
													// $("#addre1").remove();

												}
												 if(obj.breed!=null){
												 	$("#Breerror").html(obj.breed);	
													$("#Berror").addClass("has-error has-feedback");
													// $("#emaile").append("<span id='emaile1' class='glyphicon glyphicon-remove form-control-feedback'></span>");
												 }
												 else{
													$("#Breerror").remove(obj.breed);	
													$("#Berror").removeClass("has-error has-feedback");
													// $("#emaile1").remove();

													}
												 if(obj.bday!=null){
												 	$("#Bdayerror").html(obj.bday);	
													$("#Derror").addClass("has-error has-feedback");
													// $("#emaile").append("<span id='emaile1' class='glyphicon glyphicon-remove form-control-feedback'></span>");
												 }
												 else{
													$("#Bdayerror").remove(obj.bday);	
													$("#Derror").removeClass("has-error has-feedback");
													// $("#emaile1").remove();

													}
											     if(obj.mark!=null){
												 	$("#Markerror").html(obj.mark);	
													$("#Merror").addClass("has-error has-feedback");
													// $("#emaile").append("<span id='emaile1' class='glyphicon glyphicon-remove form-control-feedback'></span>");
												 }
												 else{
													$("#Markerror").remove(obj.mark);	
													$("#Merror").removeClass("has-error has-feedback");
													// $("#emaile1").remove();

													}



						   						 	}

						   						


						   						 }



							});


						});

				});
			
				



				//***************validation for Add client**************





				$(document).ready(function(){


					$('#sbmtClient').click(function(e){

						e.preventDefault();
						var name = $('#name').val();
						var address = $('#address').val();
						var contact = $('#clientnum').val();
						var email = $('#email').val();
						var petname = $('#petname').val();
						var petbreed = $('#petbreed').val();
						var petmarkings = $('#petmarkings').val();
						var petspecies = $('#petspecies').val();
						var petbirthday = $('#petbirthday').val();
						var base_url = window.location.origin;
						$.ajax({
							type: 'POST',
							url: base_url+"/veterinaryv2/vetclinic/validateClient",
						    data: {name:name,address:address,contact:contact,email:email,petname:petname,petbreed:petbreed,petmarkings:petmarkings,petspecies:petspecies,petbirthday:petbirthday},
						   success: function(msg){
						   	if(msg==1){
						   		$('#addclientform').submit();


						   	}
						   	else{ 	console.log(msg);
							var obj = JSON.parse(msg);


							if(obj.name!=null)
							{
							$("#CNtext").html(obj.name);	
							$("#CNerror").addClass("has-error has-feedback");
							}
							else{
								$("#CNtext").remove(obj.name);	
							    $("#CNerror").removeClass("has-error has-feedback");
							}
							if(obj.address!=null)
							{
							$("#CAtext").html(obj.address);	
							$("#CAerror").addClass("has-error has-feedback");
							}
							else{
								$("#CAtext").remove(obj.address);	
							    $("#CAerror").removeClass("has-error has-feedback");
							}
							if(obj.contact!=null)
							{
							$("#CCtext").html(obj.contact);	
							$("#CCerror").addClass("has-error has-feedback");
							}
							else{
								$("#CCtext").remove(obj.contact);	
							    $("#CCerror").removeClass("has-error has-feedback");
							}
							if(obj.email!=null)
							{
							$("#CEtext").html(obj.email);	
							$("#CEerror").addClass("has-error has-feedback");
							}
							else{
								$("#CEtext").remove(obj.email);	
							    $("#CEerror").removeClass("has-error has-feedback");
							}
							if(obj.petname!=null)
							{
							$("#CPtext").html(obj.petname);	
							$("#CPerror").addClass("has-error has-feedback");
							}
							else{
								$("#CPtext").remove(obj.petname);	
							    $("#CPerror").removeClass("has-error has-feedback");
							}
							if(obj.petbreed!=null)
							{
							$("#CBtext").html(obj.petbreed);	
							$("#CBerror").addClass("has-error has-feedback");
							}
							else{
								$("#CBtext").remove(obj.petbreed);	
							    $("#CBerror").removeClass("has-error has-feedback");
							}
							if(obj.petspecies!=null)
							{
							$("#CStext").html(obj.petspecies);	
							$("#CSerror").addClass("has-error has-feedback");
							}
							else{
								$("#CStext").remove(obj.petspecies);	
							    $("#CSerror").removeClass("has-error has-feedback");
							}
							if(obj.petbirthday!=null)
							{
							$("#CDtext").html(obj.petbirthday);	
							$("#CDerror").addClass("has-error has-feedback");
							}
							else{
								$("#CDtext").remove(obj.petbirthday);	
							    $("#CDerror").removeClass("has-error has-feedback");
							}







						   	}

						  
						   }
						});

					});






				});
					function populate(id){
						var base_url = window.location.origin;
								$.ajax({

							type: 'POST',
							url: base_url+"/veterinaryv2/vetclinic/updateItem",
						    data: {id:id},
						   success: function(msg){
						  
						   			var obj = JSON.parse(msg);
						   				// console.log(obj[0].itemid)

						   					console.log(obj)
						   			$("#update_desc").val(obj[0].item_desc);
						   			$("#update_cost").val(obj[0].item_cost);
						   			$("#updateid").val(obj[0].itemid);
								}		


							});

					}





//add item validation

				$(document).ready(function(){

					$('#submitmyitem').click(function(e){
						e.preventDefault();
						var base_url = window.location.origin;
						var desc =$('#item_desc').val();
						var cost =$('#item_cost').val();
						var qty =$('#qty_left').val();
						var date =$('#exp_date').val();


						$.ajax({
												type: "POST",
						  						  url: base_url+"/veterinaryv2/vetclinic/validateItem",
						   						  data: {desc:desc,cost:cost,qty:qty,date:date},
						   						 success: function(msge){
											
						   				// console.log(msge);



						   						if(msge==1){
						   						$("#additemI").submit();
						   					   		}
						   					else{
						   										   					var obj = JSON.parse(msge);
												if(obj.desc!=null){
													$("#descerror1").html(obj.desc);	
													$("#descerror").addClass("has-error has-feedback");
													// $("#cnume").append("<span id='cnume1' class='glyphicon glyphicon-remove form-control-feedback'></span>");

												}
												else{
													$("#descerror1").remove(obj.desc);	
													$("#descerror").removeClass("has-error has-feedback");
													// $("#cnume1").remove();

												}
												if(obj.cost!=null){
										         	$("#costerror1").html(obj.cost);	
													$("#costerror").addClass("has-error has-feedback");
													// $("#addre").append("<span id='addre1' class='glyphicon glyphicon-remove form-control-feedback'></span>");
												  }
												  else{
													$("#costerror1").remove(obj.cost);	
													$("#costerror").removeClass("has-error has-feedback");
													// $("#addre1").remove();

												}
												 if(obj.qty!=null){
												 	$("#qtyerror1").html(obj.qty);	
													$("#qtyerror").addClass("has-error has-feedback");
													// $("#emaile").append("<span id='emaile1' class='glyphicon glyphicon-remove form-control-feedback'></span>");
												 }
												 else{
													$("#qtyerror1").remove(obj.qty);	
													$("#qtyerror").removeClass("has-error has-feedback");
													// $("#emaile1").remove();
													}
										

						   						 }
						   						}






						});


					});
				});








				$(document).ready(function(e){

					$("#itemtype1").hide();
					$("#itemdesc1").hide();
			$("#EditItemb").click(function(e){
	var base_url = window.location.origin;
				e.preventDefault();
				var $this = $(this);
						$this.toggleClass('EDIT');
						if($this.hasClass('EDIT')){
						$this.text('SAVE');	
								$("#itemtype1").toggle();
								$("#itemdesc1").toggle();
								$("#itemtype2").toggle();
								$("#itemdesc2").toggle();

								
						}
						 else {
			
						
							    $("#itemtype1").toggle();
								$("#itemdesc1").toggle();
								$("#itemtype2").toggle();
								$("#itemdesc2").toggle();
								var desc = $("#itemdesc1").val();
								$.ajax({
												type: "POST",
						  						  url: base_url+"/veterinaryv2/vetclinic/validatedit1",
						   						  data: {desc:desc},
						   						 success: function(msge){
						   						 	console.log(msge);

						   						if(msge==1){
						   						$("#upItem").submit();

						   					   		}
						   					else{
						   			$this.toggleClass('EDIT');
		if($this.hasClass('EDIT')){
			$this.text('SAVE');	}
			else{
					$this.text('EDIT');
			}
						   					$("#itemtype1").toggle();
											$("#itemdesc1").toggle();
											$("#itemtype2").toggle();
											$("#itemdesc2").toggle();
						   							
						   						var obj = JSON.parse(msge);
												if(obj.desc!=null){
													$("#item1e").html(obj.desc);	
													$("#descerror").addClass("has-error has-feedback");
											// $("#cnume").append("<span id='cnume1' class='glyphicon glyphicon-remove form-control-feedback'></span>");
												}
												else{
													$("#item1e").remove(obj.desc);	
													$("#item1e").removeClass("has-error has-feedback");
													// $("#cnume1").remove();
												}

						   						 }
						   						}
						   						});


							
						}

					});

				});



				$(document).ready(function(){


					$("#addst").click(function(e){
						e.preventDefault();
						var base_url = window.location.origin;

							var a =$("#item_cost").val();
							var b =$("#qty_left1").val();
							var c =$("#exp_date1").val();
								$.ajax({
												type: "POST",
						  						  url: base_url+"/veterinaryv2/vetclinic/validatedit",
						   						  data: {cost:a,qty:b,dte:c},
						   						 success: function(msge){
						   						 		console.log(msge);

						   						 			var obj=JSON.parse(msge);

						   						 			if(msge==1){

						   						 				$("#frms").submit();
						   						 			}
						   				else{

						   						if(obj.cost!=null){
													$("#item_cost1").html(obj.cost);	
													//$("#descerror").addClass("has-error has-feedback");
													// $("#cnume").append("<span id='cnume1' class='glyphicon glyphicon-remove form-control-feedback'></span>");

												}
												else{
													$("#item_cost1").remove(obj.desc);	
												

												}
												if(obj.qty!=null){
										         	$("#qty_left2").html(obj.qty);	
												  }
												  else{
													$("#qty_left2").remove(obj.qty);	
												}
												if(obj.dte!=null){
										         	$("#exp_date2").html(obj.dte);	
												  }
												  else{
													$("#exp_date2").remove(obj.dte);	
												}
											}
						   						 	
						   						 }
					});
				});
					});


					$(document).ready(function(){


					$("#iou").click(function(e){
						e.preventDefault();
						var base_url = window.location.origin;

							var b =$("#qty_used4").val();
						var itemid =$("#itemid").val();
								$.ajax({
												type: "POST",
						  						  url: base_url+"/veterinaryv2/vetclinic/historynew",
						   						  data: {qty_used:b,itemid:itemid},
						   						 success: function(msge){
						   						 console.log(msge);
						   						 if(msge==1){


						   						 	$("#hst").submit();
						   						 	 location.href = 'http://localhost/veterinaryv2/vetclinic/historynew';
						   						 }
						   						 else{


						   						 	alert('Please input Quantity');

						   						 }

						   						 	
						   						 }
					});
				});
		});




	// 	