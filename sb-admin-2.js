$(document).ready(function(){
  "use strict"; // Start of use strict

  $("#form_submit").click(function(){
      //alert($("#form_data").val());
      if($("#form_data").val()!="")
      {
        $(".jsonerror").hide();
        $("#formdata").submit();
      }
      else
      {
        var errorhtml="<div class='alert alert-danger jsonerror'>Please click on Generate Form Button before submitting the form.</div>";
        $("#getJSON").focus();
        $(errorhtml).insertBefore($("#build-wrap"));
      }
    })
    setTimeout(function(){
      $("#payuForm").submit();
    }, 3000);

  $("#menu_search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#dataTable tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
//Tooltip
$('[data-toggle="tooltip"]').tooltip()
 


  $('form').submit(function(e) {
    var form = $(this);

    // HTML5 validility checker
    if (form[0].checkValidity() === false) {
        // not valid

        if ($('.content').summernote('isEmpty') || $($(".content").summernote("code")).text().trim() == '') {
          $(".note-editor").addClass("border border-danger");
        }
      
        form.addClass('was-validated');
        $('html,body').animate({scrollTop: $('.was-validated .form-control:invalid').first().offset().top - 50},'slow');
        e.preventDefault();
        e.stopPropagation();
        return;
    }
    else
    {

      
      if($("#content_label").length>0)
        {
          
          if($("#field_id").val()== 4 || $("#field_id").val()==6 || $("#field_id").val()==3)
          {
            //alert($(".ctype_value").length);
              if($(".ctype_value").length<=0)
              {
                $("<div class='alert alert-danger'>Please add some value.</div>").insertAfter("#ctype_value");
                e.preventDefault();
                e.stopPropagation();
                return  false;
              }
          }
        }
        
    }
    
});
  // Toggle the side navigation  
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });
  // In Permisson Managment check atleast one menu
  //   $('#my-form').submit(function() {
  //     if($('.chekmenu').find('input[type=checkbox]:checked').length == 0)
  //     {
  //         alert('Please select atleast one checkbox');
  //     }
  //     else{
  //       return true;
  //     }
      
  // });
  
  $("#my-form").submit(function(){
    var checked = $("#my-form input:checked").length > 0;
    if (!checked){
        alert("Please check at least one checkbox");
        return false;
    }
});

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });


  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
    if (form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add('was-validated');
    }, false);
    });


    //Removing blank fields with dash
    $('.string_title').on('keyup keypress blur', function() 
    {  
        var myStr = $(this).val()
        myStr=myStr.toLowerCase();
        myStr=myStr.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");   //this one
        myStr=myStr.replace(/\s+/g, "-");       
        $('.string_base_name').val(myStr); 
    });

    //Display Datatable
    $('#dataTable').DataTable();

    //Pagination Display Datatable 
    $('#dataTablePaging').DataTable({
      "bPaginate": false
    });

    //Display content editor
    $('.content_area').summernote();

    //Display Datetime Picker
    $('.datetime').datetimepicker();

    //Display DualBOX

    $('.dualbox').bootstrapDualListbox({ 
      moveOnSelect: false,                                                              
      moveOnDoubleClick: true, 
      //refreshSelects: true 
    });
  //   $(function () {
  //     //$("#reset").bind("click", function () {
  //       //alert('aaaaa');
  //       $("#reset").click
  //       $('.dualbox').bootstrapDualListbox('refresh', false);
  //       //moveOnSelect:true
  //       //var demo1 = $('.dualbox').bootstrapDualListbox();  
  //       //alert(demo1); 
  //       //demo1.bootstrapDualListbox('refresh');
        
  //    });
  // });
  $("#reset").click(function(){
    ////$('.dualbox').bootstrapDualListbox({  
      location.reload();
    //});
  });

    if($("#content_menu_search").length>0)
    {
      //alert($("#page_id").val());
      getmenuwisecontent($("#content_menu_search").val(),'content',0,0,0,$("#page_id").val());
    }

    if($("#layout_menu_search").length>0)
    {      
      $("#layout_menu_search").trigger('change');
    }

    //Get state based on country
    $(".country").change(function(){
      var country=$(this).val();
      $.ajax({
        url: base_url+"/leads/getstate/"+country
      }).done(function(data) {
        $(".state").html(data);   
        $(".state").change(function(){
          var state=$(this).val();
          $.ajax({
            url: base_url+"/leads/getcity/"+state
          }).done(function(data) {
            $(".city").html(data);  
            $(".city").change(function(){
              var city=$(this).val();
              if(city==0)
              {
                var city_html='<input type="text" name="city_name" class="form-control city_name" placeholder="Enter City Name">';
                $(city_html).insertAfter(this);
              }
              else{
                $(".city_name").remove();
              }
            })    
          });
        })   
      });
    })
	
	//GST calculation for Products Microservices
	$('#is_gst').change(function(){
      if($('#is_gst').val() == 1) {
        var gst_percent=$("#gst_percent").val();
        var totalPrice=$("#totalPrice").val();			
        var totalGST = (totalPrice * (gst_percent/100)).toFixed(2);
        var totPriceWithGst =(Number(totalPrice)+Number(totalGST)).toFixed(2);
        //Set value to Tax calculation area
        $("#total_price").text(totalPrice);
        $("#totalPrice").val(totalPrice);			
        $("#total_gst").text(totalGST);
        $("#totalGst").val(totalGST);
        $("#tot_price_wth_gst").text(totPriceWithGst);
        $("#totPriceWthGst").val(totPriceWithGst);
        $('#gst_area').show(); 
      } else {
        $('#gst_area').hide(); 
      } 
      calculatediscount()
    });

    $('#discount').change(function(){
      if($('#discount').val() == 1) {
        var totalPrice=0; var discount_type=0; var discount_val=0; var totaldiscount=0; var totPriceWithDscnt=0;
        totalPrice=$("#totPriceWthGst").val();		
        discount_type=$('#discount_type').val();
        discount_val=$("#discount_val").val();	

        if(discount_type=="P")
          totaldiscount = (totalPrice * (discount_val/100)).toFixed(2);
        else
          totaldiscount =  discount_val;

        totPriceWithDscnt =(Number(totalPrice) - Number(totaldiscount)).toFixed(2);
        //Set value to Tax calculation area
        $("#total_price").text(totalPrice);
        $("#totalPrice").val(totalPrice);			
        $("#total_discount").text(totaldiscount);
        $("#totalDiscount").val(totaldiscount);
        $("#tot_price_wth_discount").text(totPriceWithDscnt);
        $("#totPriceWthDiscount").val(totPriceWithDscnt);
        $('#discount_area').show(); 
      } else {
        $('#discount_area').hide(); 
      } 
    });

    $("#submit_rev").on("click", function(){		
      var today = new Date();
      var cur_mnth = today.getMonth() +1;  
      var dd = today.getDate();
      var month=$('#month').val();  
      var year=$('#year').val();
      var dt= new Date(year, month, 0).getDate();
      var diff=parseInt(dt) - parseInt(dd);
      var  $status;
      if(diff>0 && cur_mnth == month){
        if(confirm('Are you sure to generate revenue before '+diff+' day(s)?')){     
          $status=true;
        }else{
          $status= false;
        }
      }else{
        if(confirm('Are you sure to generate revenue for this month?')){  
          $status=true;
        }else{
          $status= false;
        }
      }
       var base_url = window.location.origin;
        //alert($status);
        if($status){      
          $.ajax({
            url: base_url+'/subscription/revenue_report/getConversionRate',
            type : 'POST',
            dataType : 'json',
            cache: false,
            success: function(data) {      

              if(data){           
                
                $('#convert_rate').val(data); 
                //alert($('#generate_revenue').html());
                $('#generate_revenue').trigger('submit');                 
              }else{
                $('#rev_day').val($('#day').val()); 
                $('#rev_month').val($('#month').val()); 
                $('#rev_year').val($('#year').val()); 
                $( "#set_popup" ).click();  
  
              }
            },
          });
      }else{
        return $status;
      }
    
    });
  
   

  
}) // End of use strict

var base_url = window.location.origin;
/*Get the level of the menu using parent menu id*/
function getlevel(parent_menu_val)
{
  if(parent_menu_val==0)
    $("#level").val('1');
  else
    $.ajax({
      url: base_url+"/cms/menu/getmenudetails/"+parent_menu_val
    }).done(function(data) {
      var dataval = jQuery.parseJSON(data);
    // alert( dataval.level );
    var levelval=parseInt(dataval.level)  +  1;
      $("#level").val(levelval);
    
    });
}

//Check default menu to show warning  for front end
function checkdefault(element)
{   
  var parent_id=$("#parent_id").val();
  //alert(parent_id);
  if(parent_id!=0)
  {
    $.ajax({
      url: base_url+"/cms/menu/getdefaultmenudetails/"+parent_id
    }).done(function(data) {
      var dataval = jQuery.parseJSON(data);
      if(dataval.default_menu==1)
      {
        modalbox('Default menu exists', 'Are you sure you want to mark this menu as default as the menu '+dataval.menu_name+' already set as default?', 'Yes', 'No'); 
        $('.cancelAction, .fa-close').click(function () {
          $("#modal").modal('hide');
          $(element).prop("checked", false);    
        }); 
      }
    });
  }
}


/*get the list of menus*/ 
function getmenu(menu_val,parent_menu,menu_type='',listing=0)
{
  $.ajax({
      url: base_url+"/cms/menu/getmenus/"+menu_val+"/"+menu_type+'/'+listing
    }).done(function(data) {
      $("#"+parent_menu).html(data);
      if(menu_val=='FM')
      {
        $("#default_menu_div").show();  
        $("#menu_type_div").show();      
      }
      else
      {
        $("#default_menu_div").hide();
        $("#menu_type_div").hide();  
      }

    });
}

/*Get forms based on menu type */
function getforms(menu_type,selected_val)
{
  $.ajax({
    url: base_url+"/cms/forms/getallformshtml/"+selected_val
  }).done(function(data) {
    $("#form_id").append(data);
  });
}

//Delete functionality for all CMS elements (Menu/Content/Content Type/Fields/)
function remove_element(element_id,element_type,contact_id=0)
{
  
  if(element_type=='roles')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this role?', 'Yes', 'No'); 
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/intranet/user/role/remove_role/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/intranet/user/role';
        });
    });    
  }
  if(element_type=='users')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this user?', 'Yes', 'No'); 
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/intranet/user/user/remove_user/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/intranet/user/user';
        });
    });    
  }
  if(element_type=='pages')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this user?', 'Yes', 'No'); 
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/intranet/user/page/remove_page/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/intranet/user/page';
        });
    });    
  }
  if(element_type=='designation')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this user?', 'Yes', 'No'); 
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/intranet/user/designation/remove_designation/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/intranet/user/designation';
        });
    });    
  }
  if(element_type=='permission')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this user?', 'Yes', 'No'); 
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/intranet/user/permission/remove_permission/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/intranet/user/permission';
        });
    });    
  }
  if(element_type=='leave')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this user?', 'Yes', 'No'); 
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/intranet/user/leave/remove_leave/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/intranet/user/leave';
        });
    });    
  }
  if(element_type=='work_from_home')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this user?', 'Yes', 'No'); 
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/intranet/user/work_from_home/remove_wfh/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/intranet/user/work_from_home';
        });
    });    
  }
  
  else if(element_type=='ctype')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this content type?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/cms/content_type/remove_ctype/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/cms/content_type';
        });
    });    
  }
  else if(element_type=='ctype_fields')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this field?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/cms/content_type/remove_ctype_fields/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/cms/content_type';
        });
    });    
  }
  else if(element_type=='content')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this content?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/cms/content/remove_content/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/cms/content';
        });
    });    
  }
  else if(element_type=='form')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this form?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/cms/forms/remove_form/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/cms/forms';
        });
    });    
  }
  else if(element_type=='layout')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this layout?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/cms/remove_layout/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/cms/layout';
        });
    });    
  }
  // else if(element_type=='roles')
  // {
  //   modalbox('Want to Delete', 'Are you sure you want to delete this role?', 'Yes', 'No');
  //   $('.doAction').click(function () {   
  //     $("#modal").modal('hide');
  //       $.ajax({
  //         url: base_url+"/user/roles_management/remove_roles/"+element_id
  //       }).done(function(data) {
  //         window.location.href=base_url+'/user/roles_management';
  //       });
  //   });    
  // }

  // else if(element_type=='permission')
  // {
  //   modalbox('Want to Delete', 'Are you sure you want to delete this permission?', 'Yes', 'No');
  //   $('.doAction').click(function () {   
  //     $("#modal").modal('hide');
  //       $.ajax({
  //         url: base_url+"/user/permissions_management/remove_permissions/"+element_id
  //       }).done(function(data) {
  //         window.location.href=base_url+'/user/permissions_management';
  //       });
  //   });    
  // }

  else if(element_type=='rolespermission')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this role permission?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/user/roles_management/remove_rolespermissions/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/user/roles_management/roles_permission';
        });
    });    
  }
  else if(element_type=='temp_contacts')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this record?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/leads/deletetempleads/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/leads/templeads';
        });
    });    
  }
  else if(element_type=='leads')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this contact?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/leads/deleteleads/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/leads/index';
        });
    });    
  }
  else if(element_type=='tags')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this tag?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/leads/tags/deletetags/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/leads/tags';
        });
    });    
  }
  else if(element_type=='responsibility_tags')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this responsibility tags?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/leads/deleteresponsibilitytags/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/leads/responsibility_tags';
        });
    });    
  }
  else if(element_type=='order')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this order?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/subscription/deleteorder/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/subscription/details/'+data;
        });
    });    
  }
  else if(element_type=='company_address')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this address?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/leads/company/deleteaddress/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/leads/company/';
        });
    });    
  }


  $('.cancelAction, .fa-close').click(function () {
      $("#modal").modal('hide');
      return 0;
    }); 
  
 
}


//Function to remove leads elements
function remove_leads(contact_id,element_id,element_type)
{
  if(element_type=='leads_email')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this email address?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/leads/delete_leads/leads_email/"+contact_id+"/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/leads/adminview/'+contact_id;
        });
    });    
  }

  else if(element_type=='leads_phone')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this phone details?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/leads/delete_leads/leads_phone/"+contact_id+"/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/leads/adminview/'+contact_id;
        });
    });    
  }
  else if(element_type=='leads_address')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this address?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/leads/delete_leads/leads_address/"+contact_id+"/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/leads/adminview/'+contact_id;
        });
    });    
  }
  else if(element_type=='leads_company')
  {
    modalbox('Want to Delete', 'Are you sure you want to delete this company?', 'Yes', 'No');
    $('.doAction').click(function () {   
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/leads/delete_leads/leads_company/"+contact_id+"/"+element_id
        }).done(function(data) {
          window.location.href=base_url+'/leads/adminview/'+contact_id;
        });
    });    
  }

  $('.cancelAction, .fa-close').click(function () {
      $("#modal").modal('hide');
      return 0;
    }); 
}

//function archive elements
function archive_element(element_id,element_type)
{

  if(element_type=='content')
  {
    modalbox1('Want to change status', 'Are you sure you want to change status this content?'); 
    $('.doAction').click(function () { 
      var status = $('#status').val();
      $("#modal").modal('hide');
        $.ajax({
          url: base_url+"/cms/content/archive_content/"+element_id+"/"+status
        }).done(function(data) {
          window.location.href=base_url+'/cms/content';
        });
    });    
  }

  $('.cancelAction, .fa-close').click(function () {
    $("#modal").modal('hide');
    return 0;
  }); 

}

//Modal Popup to display change content status
function modalbox1(title, msg) { 
  
  var $content='<div class="modal fade" id="modal" role="dialog">'+
              '<div class="modal-dialog">'+
              '<div class="modal-content">'+
                  '<div class="modal-header">'+
                    '<h4 class="modal-title">'+title+'</h4>'+
                    '<button type="button" class="close" data-dismiss="modal">&times;</button>'+                    
                  '</div>'+
                  '<div class="modal-body">'+
                    '<p>'+msg+'</p>'+
                    '<form>'+
                    '<div class="form-group">'+
                    '<select id="status" name="status">'+
                      '<option value="0">Inactive</option>'+
                      '<option value="1">Active</option>'+
                      '<option value="2">Archive</option>'+
                    '</select>'+ 
                    //'<input type="text" value="'+element_id+'" name="cid">'+
                    '</div>'+
                    '<div style="">'+
                      '<button type="submit" class="btn btn-primary doAction">Submit</button>'+
                    '</div>'+
                  '</form>'+
                  '</div>'+
                  '<div class="modal-footer">'+
                    
                  '</div>'+
                '</div></div></div>';

$("body").prepend($content);
$("#modal").modal();
$('.doAction').click(function () { 
  $("#modal").modal('hide');
  return 1;
});
$('.cancelAction, .fa-close').click(function () {
  $("#modal").modal('hide');
  return 0;
});

}
 //Modal Popup to display as confirmation box
function modalbox(title, msg, $true, $false) { 
  
  var $content='<div class="modal fade" id="modal" role="dialog">'+
              '<div class="modal-dialog">'+
              '<div class="modal-content">'+
                  '<div class="modal-header">'+
                    '<h4 class="modal-title">'+title+'</h4>'+
                    '<button type="button" class="close" data-dismiss="modal">&times;</button>'+                    
                  '</div>'+
                  '<div class="modal-body">'+
                    '<p>'+msg+'</p>'+
                  '</div>'+
                  '<div class="modal-footer">'+
                    '<button type="button" class="btn btn-primary btn-user doAction" data-dismiss="modal">'+$true+'</button>'+
                    '<button type="button" class="btn btn-default cancelAction" data-dismiss="modal">'+$false+'</button>'+
                  '</div>'+
                '</div></div></div>';

$("body").prepend($content);
$("#modal").modal();
$('.doAction').click(function () {   
  $("#modal").modal('hide');
  return 1;
});
$('.cancelAction, .fa-close').click(function () {
  $("#modal").modal('hide');
  return 0;
});

}

//Add more functionality to add the fields values
function addrowctypefields()
{
  var cnt=$('.value_row').length;
  cnt=cnt+1;
  var ctypehtml='<div class="row value_row">'+
                '<div class="col-sm-6"><label>Value '+cnt+'</label><input type="text" class="form-control ctype_value" name="ctype_value[]"></div>'+
                '<div class="col-sm-6"><a href="javascript:void(0)" onclick="$(this).parent().parent().remove()"><i class="far fa-trash-alt"></i></a></div>'+
                '</div>';
  $(ctypehtml).insertAfter("#ctype_value");
}


//Add more functionality to add the content types checking along with content reference field type
function addCtypeFields(fieldval,ctypeid,editval=0,destination="ctype_value")
{
  
  if(fieldval==8)
  {
    $("#ctype_value").hide();
    $(".value_row").remove();
    $.ajax({
      url: base_url+"/cms/content_type/get_ctype/"+fieldval+"/"+ctypeid+"/"+editval
    }).done(function(data) {
      $(data).insertAfter("#"+destination);
      //Display Datetime Picker
      $('.datetime').datetimepicker();
      //Display content editor
       $('.content_area').summernote();
      
      
    });
  }
  else
  {
    $("#"+destination).show();
    $(".value_row").show();
    if($("#ctypes").length>0)
    {
      $("#ctypes").remove();
    }
  }  
}



//Get the content type fields
function getcontentfields(content_type_id='',edit_id='')
{
  
  var menu_id=$("#menu_id").val();
  var content_type_id=$("#content_type_id").val(); 

 
  
  if(menu_id!='' && content_type_id!='')
  {
    $("#menu_id").removeClass("is-invalid");
    $("#content_type_id").removeClass("is-invalid");
    
    $.ajax({
      url: base_url+"/cms/content/getcontentfields/"+content_type_id+"/"+menu_id+"/"+edit_id,
    }).done(function(data) {
     
      $("#content_fields").html(data);
      //Display content editor
      $('.content_area').summernote();
      //Display Datetime Picker
      $('.datetime').datetimepicker({format: 'YYYY-MM-DD'});
      //Display duallistbox
      $('.dualbox').bootstrapDualListbox({ 
        moveOnSelect: false,                                                              
        moveOnDoubleClick: true     
      });
    });
  }    
  else
  {
    $("#menu_id").addClass("is-invalid");
    $("#content_type_id").addClass("is-invalid");
    
  }
  
  


  
}

//function to add more content types
function addmorecontent(content_type_id,is_sub_child,mode,edit_id='')
{
  
  $.ajax({
    url: base_url+"/cms/content/getcontentfields/"+content_type_id+"/1/"+is_sub_child+'/'+mode+'/'+edit_id
  }).done(function(data) {  
    //alert($(data).find('button').length);  
    if($(".reference_div_"+content_type_id).length>0)
      $(data).insertBefore(".reference_div_"+content_type_id+":first");
    else
      $(data).insertBefore(".new_fields_"+content_type_id);
    //$(".reference_div_"+content_type_id+":last").append(data);
    //Display content editor
    $('.content_area').summernote();
    //Display Datetime Picker
    $('.datetime').datetimepicker({format: 'YYYY-MM-DD'});
    //Display duallistbox
    $('.dualbox').bootstrapDualListbox({ 
      moveOnSelect: false,                                                              
      moveOnDoubleClick: true     
    });
    
  });
}

//function to remove content while edit
function removecontent(elem,id)
{
  var remove_ids=$("#remove_ids").val();
  remove_ids+=","+id;
  $("#remove_ids").val(remove_ids);
  $(elem).parent().parent().remove();
}


//Add column wise div

function addcolumn(val,edit_id=0)
{
  if(val!='')
  {
    $.ajax({
      url: base_url+"/cms/getlayoutcolumnwise/"+val+"/"+edit_id
    }).done(function(data) {       
      $("#column_box").html(data);
      
    });
  }

  

}

//Get contents for layout management
// function getcontents(function getcontents(display_mode,destination,edit_id=0)
// {  
  
//   var content_type=$("#content_type_"+destination).val(); 
//   alert(content_type);
//   var menu_id=$("#menu_id").val(); 
  
//   if(display_mode=="static" || display_mode=="static_menu")
//   {
//     $("#listing_"+destination).val(1);
//     $("#element_no_"+destination).val(0);
//     $("#listing_"+destination).prop("readonly", true);  
//     $("#content_"+destination).prop("multiple", true);  
//     $("#content_"+destination).addClass("dualbox");       
    
//   }
//   else
//   {
//     $("#listing_"+destination).removeAttr("readonly");
//     $("#element_no_"+destination).prop("readonly", false); 
//     $("#content_"+destination).prop("multiple", false); 
//     $("#content_"+destination).removeClass("dualbox");
//     $("#content_"+destination).bootstrapDualListbox('destroy',true) ;  
   
//   }
//   $.ajax({
//     type: "POST",
//     url: base_url+"/cms/getcontents/",
//     data:"edit_id="+edit_id+"&display_mode="+display_mode+"&destination="+destination+"&content_type="+content_type+"&menu_id="+menu_id
//   }).done(function(data) {       
//     $("#content_"+destination).html(data);  
//     if(display_mode=="static" || display_mode=="static_menu")
//     {        
//       //Display duallistbox
//       $("#content_"+destination).bootstrapDualListbox({ 
//         moveOnSelect: false,                                                              
//         moveOnDoubleClick: true     
//       });
//     }
   
//   });
// }

//Add Column row in layout
function addcolrow(column_id,edit_id=0)
{

  var cnt=$('.row_col_'+column_id).length;
  $.ajax({
    url: base_url+"/cms/getcolcontents/"+column_id+"/"+edit_id+"/"+cnt
  }).done(function(data) {  
    $("#col_"+column_id).append(data);    
    
  });
  
}

//Get Contents based on menu 
function getmenuwisecontent(menu_id,type,read_access=0,write_access=0,delete_access=0,pageno)
{
  if(menu_id=="")
	  menu_id=0;
  var urlval;
  if(type=="content")
    urlval =base_url+"/cms/content/getmenuwisecontent/"+menu_id+"/"+pageno;
  if(type=="layout")
    urlval =base_url+"/cms/getmenuwiselayout/"+menu_id+"/"+read_access+"/"+write_access+"/"+delete_access+"/"+pageno;

  $.ajax({
    url: urlval
  }).done(function(data) {  
    $(".table_content").html(data);   
    //Display Datatable
    $('#dataTableNew').DataTable({
      "bPaginate": false,
    }); 
  });
  
}

//Show Layout Type
function showlayouttype(layoutval)
{
  if(layoutval=='main_content')
    $("#content_type_id").prop('disabled',true);
  else
    $("#content_type_id").removeAttr("disabled");
}


function verify_leads(contact_id,type,element_id=0)
{
  var urlval='';
  if(type=='leads')
    urlval=base_url+"/leads/verify_leads/"+type+"/"+contact_id;
  if(type=='leads_email' || type=='leads_phone' || type=='leads_address' || type=='leads_company')
    urlval=base_url+"/leads/verify_leads/"+type+"/"+contact_id+'/'+element_id;


  modalbox('Verify', 'Are you sure you want to verify this record?', 'Yes', 'No'); 
  $('.doAction').click(function () {   
    $("#modal").modal('hide');
      $.ajax({
        url: urlval
      }).done(function(data) {  
        window.location.href=base_url+'/leads/adminview/'+contact_id;
      });
  });
  
}

function set_default(elem_id,contact_id,elem_val,type)
{
  var urlval='';
  if(type=='leads_email' || type=='leads_phone' || type=='leads_address' || type=='leads_company')
    urlval=base_url+"/leads/set_default/"+contact_id+"/"+type+"/"+elem_id+"/"+elem_val;

  modalbox('Set as Default', 'Are you sure you want to set as default to this record?', 'Yes', 'No'); 
  $('.doAction').click(function () {   
    $("#modal").modal('hide');
      $.ajax({
        url: urlval
      }).done(function(data) {  
       window.location.href=base_url+'/leads/adminview/'+contact_id;
      });
  });
  
}
function getcontents(display_mode,destination,edit_id=0)
{ 
  var res = destination.substr(7);
  var content_type=$("#content_type_"+destination).val(); 
  var menu_id=$("#menu_id").val(); 
  
  if(display_mode=="static" || display_mode=="static_menu")
  {
    $("#listing_"+destination).val(1);
    $("#element_no_"+destination).val(0);
    $("#listing_"+destination).prop("readonly", true);  
    $("#content_"+destination).prop("multiple", true);  
    $("#content_"+destination).bootstrapDualListbox('destroy',true) ;    
    $("#content_"+destination).addClass("dualbox");        
  }
  else
  {
    $("#listing_"+destination).removeAttr("readonly");
    $("#element_no_"+destination).prop("readonly", false); 
    $("#content_"+destination).prop("multiple", false); 
    $("#content_"+destination).removeClass("dualbox");
    $("#content_"+destination).bootstrapDualListbox('destroy',true) ;  
   
  }
  $.ajax({
    type: "POST",
    url: base_url+"/cms/getcontents/",
    data:"edit_id="+edit_id+"&display_mode="+display_mode+"&destination="+destination+"&content_type="+content_type+"&menu_id="+menu_id
  }).done(function(data) {       
    $("#content_"+destination).html(data);  
    if(display_mode=="static" || display_mode=="static_menu")
    {        
      //Display duallistbox
      $("#content_"+destination).bootstrapDualListbox({ 
        moveOnSelect: false,                                                              
        moveOnDoubleClick: true     
      });
    }
    if(display_mode=="static_form")
    {
      var layout_id= $("#layout_id").val();
      $.ajax({
        type: "POST",
        url: base_url+"/cms/gettags/",
        data:"edit_id="+layout_id
      }).done(function(data) {
         var taghtml="<div class='row'><div class='col-sm-6'><label>Select Tag</label>"+data+"</div></div>";        
      // }
      $(taghtml).insertBefore($("#content_label"+'_'+res));
      $('.dualbox').bootstrapDualListbox({ 
        moveOnSelect: false,                                                              
        moveOnDoubleClick: true     
      });
    });  
  }
  });
}

function add_products(numOfProducts)
{
  
  var products = [];
  var product_html='';
  
  $.ajax({
    type: "POST",
    url: base_url+"/products/getallproducts/"
  }).done(function(data) {
     products=jQuery.parseJSON(data);
     var productdd='';
     $.each( products, function( key, val ) {
        productdd+='<option value="'+val.id+'">'+val.name+'</option>'; 
     });
  
  for(var i = 1; i <= numOfProducts; i++){
    product_html+='<div class="col-sm-12">'+
                      '<fieldset>'+
                        '<legend>Product '+i+'</legend>'+
                        '<div class="row">'+
                            '<div class="col-sm-6">'+
                                '<label>Products</label>'+
                                '<select name="products[]" class="form-control" required>'+
                                    '<option value="">Select Product</option>'+productdd+
                             '</select>'+
                            '</div>'+
                            '<div class="col-sm-6">'+
                                '<label>Number of units</label>'+                    
                                '<input type="number" id="units'+i+'" name="units[]" class="small form-control" value="1" readonly="">'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-sm-6">'+  
                                '<label>Unit Price</label>'+                    
                                '<input type="text" id="unitprice'+i+'" name="unitprice[]" class="small form-control unitprice" required>'+
                            '</div>'+
                        '</div>'+                            
                        '</fieldset>'+
                      '</div>';
                    
  }
  $("#products_row").html(product_html);
  $(".unitprice").on("keyup", function(){
      var gst_percent=$("#gst_percent").val();
      var numOfProducts = $("#bundle").val(); // or $(this).val()	
			var totalPrice=0;
			var unitPrice=0;
			var units=0;
			for(var i = 1; i <= numOfProducts; i++){
				units = $("#units"+i).val();
				unitPrice = $("#unitprice"+i).val();
        totalPrice = totalPrice + (unitPrice * units);				
       // alert(units);
      }
      
      totalPrice= totalPrice.toFixed(2);     
			var totalGST = (totalPrice * (gst_percent/100)).toFixed(2);
			var totPriceWithGst =(Number(totalPrice)+Number(totalGST)).toFixed(2);
			//Set value to Tax calculation area
			$("#total_price").text(totalPrice);
			$("#totalPrice").val(totalPrice);			
			$("#total_gst").text(totalGST);
			$("#totalGst").val(totalGST);
			$("#tot_price_wth_gst").text(totPriceWithGst);
      $("#totPriceWthGst").val(totPriceWithGst);
      calculatediscount();
  });
  });
}

function showdisplay(val,idval)
{
  $("#display_mode_"+idval).children('option').hide();
  $("#display_mode_"+idval).children("option[value='']").show();
  $("#content_column_"+idval).val('');
  if(val=="site_content")
  {
    $("#display_mode_"+idval).children("option[value=static_config]").show();
  }
  else if(val=="menu")
  {
    $("#display_mode_"+idval).children("option[value=static_menu]").show();
  }
  else if(val=="form")
  {
    $("#display_mode_"+idval).children("option[value=static_form]").show();
  }
  else if(val=="db2")
  {
    $("#display_mode_"+idval).children("option[value=db2_content]").show();
  }
  else
  {
    $("#display_mode_"+idval).children("option[value=static]").show();
    $("#display_mode_"+idval).children("option[value=dynamic]").show();
  }
}


function getsubcategories(category_id,edit_id=0)
{
  $.ajax({
    url: base_url+"/products/getsubcategories/"+category_id+"/"+edit_id
  }).done(function(data) {
    $("#product_sub_categories_id").html(data);
  })
}

function getsubcategoriesdetails(sub_category_id)
{
  $.ajax({
    url: base_url+"/products/getsubcategoriesdetails/"+sub_category_id
  }).done(function(data) {
    var res=$.parseJSON(data);
    $("#revenue_code").val(res.revenue_code);
  })
}

function calculatediscount()
{
  if($('#discount').val() == 1) { 
    var totalPrice=0; var discount_type=0; var discount_val=0; var totaldiscount=0; var totPriceWithDscnt=0;
    totalPrice=$("#totPriceWthGst").val();		
    discount_type=$('#discount_type').val();
    discount_val=$("#discount_val").val();	
    
    if(discount_type=="P")
      totaldiscount = (totalPrice * (discount_val/100)).toFixed(2);
    else
      totaldiscount =  discount_val;

    totPriceWithDscnt =(Number(totalPrice) - Number(totaldiscount)).toFixed(2);

   // alert("Total price with dscnt:"+totPriceWithDscnt);
    //Set value to Tax calculation area
    $("#total_price").text(totalPrice);
    $("#totalPrice").val(totalPrice);			
    $("#total_discount").text(totaldiscount);
    $("#totalDiscount").val(totaldiscount);
    $("#tot_price_wth_discount").text(totPriceWithDscnt);
    $("#totPriceWthDiscount").val(totPriceWithDscnt);
    $('#discount_area').show(); 
  } else {
    $('#discount_area').hide(); 
  } 
}

function getplans(product_id)
{
    //alert(product_id);
    $.ajax({
      url: base_url+"/subscription/getplans/"+product_id
    }).done(function(data) {
      $("#plan_id").html(data);
    })
}

function check_valid(){  
	$con_val=$('#convert_rate_pop').val();
	$("#errmsg").removeClass("errmsg");
	$('#errmsg').text('');
	if($con_val==''){
	  $('#errmsg').show();
	  $("#errmsg").addClass("errmsg");
	  $('#errmsg').text("Please Enter Conversion Rate");
	  setTimeout(function(){
		$('.errmsg').slideUp('slow');
	  }, 5000);
	  return false;
	}else{
	  return true;
	}
  }