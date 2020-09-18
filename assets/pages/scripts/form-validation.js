var site_url = jQuery('#site_url').val() + '/';
var FormValidation = function() {



    function apply_validation(id, rules, func = "") {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form3 = $('#' + id);
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        //IMPORTANT: update CKEDITOR textarea with actual content before submit
        form3.on('submit', function(e) {
            e.preventDefault();
            for (var instanceName in CKEDITOR.instances) {
                CKEDITOR.instances[instanceName].updateElement();
            }
        })

        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: rules,

            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
                service: {
                    required: "Please select  at least 2 types of Service",
                    minlength: jQuery.validator.format("Please select  at least {0} types of Service")
                }
            },

            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.parents('.mt-radio-list') || element.parents('.mt-checkbox-list')) {
                    if (element.parents('.mt-radio-list')[0]) {
                        error.appendTo(element.parents('.mt-radio-list')[0]);
                    }
                    if (element.parents('.mt-checkbox-list')[0]) {
                        error.appendTo(element.parents('.mt-checkbox-list')[0]);
                    }
                } else if (element.parents('.mt-radio-inline') || element.parents('.mt-checkbox-inline')) {
                    if (element.parents('.mt-radio-inline')[0]) {
                        error.appendTo(element.parents('.mt-radio-inline')[0]);
                    }
                    if (element.parents('.mt-checkbox-inline')[0]) {
                        error.appendTo(element.parents('.mt-checkbox-inline')[0]);
                    }
                } else if (element.parent(".input-group").size() > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
                var ids = $('#id').val();
                /* alert(ids);*/
                var url = ids == null ? 'save' : '../update';
                /*    alert(url);*/
                url = func == '' ? url : func;
                if ($('#applicant_id').val() != '' && $('#applicant_id').val() != undefined) {
                    url = site_url + "/agent/lead/update_customer";
                }
                /* alert(url);
                 alert(func);*/
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form3.serialize(), // serializes the form's elements.
                    success: function(data) {
                        /*alert(data);*/
                        var data = JSON.parse(data);
                        if (data.status.trim() == 'false') {
                            /*  alert('false');*/
                            if (id == 'add_co_applicant') {
                                success3.hide();
                                error3.show();
                                $('input,select,textarea,email').removeClass('verror');
                                $('.ediv').remove();
                                for (var i = 0; i < data.msg.length; i++) {
                                    $('#add_co_applicant input[name="' + data.msg[i].key + '"],#add_co_applicant select[name="' + data.msg[i].key + '"],#add_co_applicant textarea[name="' + data.msg[i].key + '"],#add_co_applicant email[name="' + data.msg[i].key + '"]').addClass('verror');
                                    $('#add_co_applicant input[name="' + data.msg[i].key + '"],#add_co_applicant select[name="' + data.msg[i].key + '"],#add_co_applicant textarea[name="' + data.msg[i].key + '"],#add_co_applicant email[name="' + data.msg[i].key + '"]').after('<div class="ediv">' + data.msg[i].value + '</div>');
                                }
                                $('#input[name="csrf_moksha_name"]').val(data.csrf.hash);
                                //App.scrollTo(error3, -200);
                                if (id != 'add_co_applicant')
                                    window.scrollTo({ top: 0, behavior: 'smooth' });
                            } else {
                                success3.hide();
                                error3.show();
                                $('input,select,textarea,email').removeClass('verror');
                                $('.ediv').remove();
                                for (var i = 0; i < data.msg.length; i++) {
                                    $('input[name="' + data.msg[i].key + '"],select[name="' + data.msg[i].key + '"],textarea[name="' + data.msg[i].key + '"],email[name="' + data.msg[i].key + '"]').addClass('verror');
                                    $('input[name="' + data.msg[i].key + '"],select[name="' + data.msg[i].key + '"],textarea[name="' + data.msg[i].key + '"],email[name="' + data.msg[i].key + '"]').after('<div class="ediv">' + data.msg[i].value + '</div>');
                                }
                                $('input[name="csrf_moksha_name"]').val(data.csrf.hash);
                                //App.scrollTo(error3, -200);
                                if (id != 'add_co_applicant')
                                    window.scrollTo({ top: 0, behavior: 'smooth' });
                            }


                        } else if (data.status.trim() == "true") {

                            /*  alert('true');*/
                            success3.show();
                            error3.hide();
                            if (id == 'add_co_applicant') {
                                if ($('#applicant_id').val() == '') {
                                    $('input[name="csrf_moksha_name"]').val(data.csrf.hash);
                                    $('#add_co_applicant').find("input[type=text],input[type=email], textarea,select").val("");
                                    $('.coapplicantslist').append('<div class="col-sm-4"><p><input type="hidden" name="lead[co_applicants][]" value="' + data.customer_info.id + '"><strong>Relation:</strong>' + data.customer_info.relation + '</p><p><strong>Name:</strong> ' + data.customer_info.customer_name + '</p><i>' + '<a class="delete-coapplicant" href="#">X</a>' + '</i><a class="coapplicant_button_id" aid="' + data.customer_info.id + '">Edit</a></div>');
                                }
                                $('#exampleModal').modal('hide');


                            } else if (data.url == 'Successfuly Updated') {
                                window.location.reload();
                            } else {
                                window.location.href = data.url;
                            }
                        }
                    }
                });

            }

        });

        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form3).change(function() {
            form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        //initialize datepicker
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
        $('.date-picker .form-control').change(function() {
            form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
        })
    }



    return {
        //main function to initiate the module
        init: function() {

            // handleWysihtml5();
            // handleValidation1();
            // handleValidation2();
            // handleValidation3();
            apply_validation('agent', {
                'agent[agent_name]': {
                    required: true
                }
            }, "")
            apply_validation('channelpartner', {}, "")
            apply_validation('user', {
                'user[email_id]': {
                    required: true
                }
            }, "")
            apply_validation('bank', {
                'bank[bank_name]': {
                    required: true
                }
            }, "")
            apply_validation('loantype', {
                'loan_type[loan_type_name]': {
                    required: true
                }
            }, "")
            apply_validation('customer', {}, "")

            // apply_validation('loan', {
            //            'loan[loan_amount]': {
            //                required: true
            //        }
            //
            //    },"")
            apply_validation('access', {}, "")
            apply_validation('payout_percentage_save', {}, "payout_percentage_save");
            apply_validation('city', {}, "")
            apply_validation('dropdown', {}, "")
            apply_validation('state', {}, "")
            apply_validation('file', {}, "../save")
            apply_validation('file_edit', {}, "../update")
            apply_validation('file_aprrove', {}, "../file_aprrove")
            apply_validation('changepassword', {}, "../changepassword")
            apply_validation('loan_update_1', {}, "../../update_step_1")
            apply_validation('loan_update_2', {}, "../../update_step_2")
            apply_validation('loan_update_3', {}, "../../update_step_3") 
                /* apply_validation('loan_update_4', {},"../../update_step_4")*/
            apply_validation('admin_user', {}, "../save");
            // apply_validation('add_co_applicant', {},site_url+"/agent/lead/save_customer");

            apply_validation('lead_status_change', {}, site_url + "/agent/lead/lead_status_change");
            apply_validation('lead_status_change_admin', {}, site_url + "/admin/lead/lead_status_change");
            apply_validation('addconnector-referral', {}, "../save");
            apply_validation('addconnector-referral-edit', {}, "../update");
            apply_validation('assign_lead', {}, "../assign_lead_save");
            apply_validation('internal_assign_lead_save', {}, "../internal_assign_lead_save");
            apply_validation('comment', {}, "../save_comment");
            
        }

    };

}();

jQuery(document).ready(function() {
    FormValidation.init();
});

// // basic validation
// var handleValidation1 = function() {
//     // for more info visit the official plugin documentation: 
//         // http://docs.jquery.com/Plugins/Validation

//         var form1 = $('#form_sample_1');
//         var error1 = $('.alert-danger', form1);
//         var success1 = $('.alert-success', form1);

//         form1.validate({
//             errorElement: 'span', //default input error message container
//             errorClass: 'help-block help-block-error', // default input error message class
//             focusInvalid: false, // do not focus the last invalid input
//             ignore: "",  // validate all fields including form hidden input
//             messages: {
//                 select_multi: {
//                     maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
//                     minlength: jQuery.validator.format("At least {0} items must be selected")
//                 }
//             },
//             rules: {
//                 name: {
//                     minlength: 2,
//                     required: true
//                 },
//                 input_group: {
//                     email: true,
//                     required: true
//                 },
//                 email: {
//                     required: true,
//                     email: true
//                 },
//                 url: {
//                     required: true,
//                     url: true
//                 },
//                 number: {
//                     required: true,
//                     number: true
//                 },
//                 digits: {
//                     required: true,
//                     digits: true
//                 },
//                 creditcard: {
//                     required: true,
//                     creditcard: true
//                 },
//                 occupation: {
//                     minlength: 5,
//                 },
//                 select: {
//                     required: true
//                 },
//                 select_multi: {
//                     required: true,
//                     minlength: 1,
//                     maxlength: 3
//                 }
//             },

//             invalidHandler: function (event, validator) { //display error alert on form submit              
//                 success1.hide();
//                 error1.show();
//                 App.scrollTo(error1, -200);
//             },

//             errorPlacement: function (error, element) { // render error placement for each input type
//                 var cont = $(element).parent('.input-group');
//                 if (cont) {
//                     cont.after(error);
//                 } else {
//                     element.after(error);
//                 }
//             },

//             highlight: function (element) { // hightlight error inputs

//                 $(element)
//                     .closest('.form-group').addClass('has-error'); // set error class to the control group
//             },

//             unhighlight: function (element) { // revert the change done by hightlight
//                 $(element)
//                     .closest('.form-group').removeClass('has-error'); // set error class to the control group
//             },

//             success: function (label) {
//                 label
//                     .closest('.form-group').removeClass('has-error'); // set success class to the control group
//             },

//             submitHandler: function (form) {
//                 success1.show();
//                 error1.hide();
//             }
//         });


// }

// // validation using icons
// var handleValidation2 = function() {
//     // for more info visit the official plugin documentation: 
//         // http://docs.jquery.com/Plugins/Validation

//         var form2 = $('#form_sample_2');
//         var error2 = $('.alert-danger', form2);
//         var success2 = $('.alert-success', form2);

//         form2.validate({
//             errorElement: 'span', //default input error message container
//             errorClass: 'help-block help-block-error', // default input error message class
//             focusInvalid: false, // do not focus the last invalid input
//             ignore: "",  // validate all fields including form hidden input
//             rules: {
//                 name: {
//                     minlength: 2,
//                     required: true
//                 },
//                 email: {
//                     required: true,
//                     email: true
//                 },
//                 email: {
//                     required: true,
//                     email: true
//                 },
//                 url: {
//                     required: true,
//                     url: true
//                 },
//                 number: {
//                     required: true,
//                     number: true
//                 },
//                 digits: {
//                     required: true,
//                     digits: true
//                 },
//                 creditcard: {
//                     required: true,
//                     creditcard: true
//                 },
//             },

//             invalidHandler: function (event, validator) { //display error alert on form submit              
//                 success2.hide();
//                 error2.show();
//                 App.scrollTo(error2, -200);
//             },

//             errorPlacement: function (error, element) { // render error placement for each input type
//                 var icon = $(element).parent('.input-icon').children('i');
//                 icon.removeClass('fa-check').addClass("fa-warning");  
//                 icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
//             },

//             highlight: function (element) { // hightlight error inputs
//                 $(element)
//                     .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
//             },

//             unhighlight: function (element) { // revert the change done by hightlight

//             },

//             success: function (label, element) {
//                 var icon = $(element).parent('.input-icon').children('i');
//                 $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
//                 icon.removeClass("fa-warning").addClass("fa-check");
//             },

//             submitHandler: function (form) {
//                 success2.show();
//                 error2.hide();
//                 form[0].submit(); // submit the form
//             }
//         });


// }

// // advance validation
// var handleValidation3 = function() {
//     // for more info visit the official plugin documentation: 
//     // http://docs.jquery.com/Plugins/Validation

//         var form3 = $('#agent_add');
//         var error3 = $('.alert-danger', form3);
//         var success3 = $('.alert-success', form3);

//         //IMPORTANT: update CKEDITOR textarea with actual content before submit
//         form3.on('submit', function(e) {
//             e.preventDefault();
//             for(var instanceName in CKEDITOR.instances) {
//                 CKEDITOR.instances[instanceName].updateElement();
//             }
//         })

//         form3.validate({
//             errorElement: 'span', //default input error message container
//             errorClass: 'help-block help-block-error', // default input error message class
//             focusInvalid: false, // do not focus the last invalid input
//             ignore: "", // validate all fields including form hidden input
//             rules: {
//                 'agent[agent_name]': {
//                     required: true
//                 },
//                  'user[email_id]': {
//                     required: true,
//                     email: true
//                 },
//                  'user[password]': {
//                     required: true,
//                 },

//             },

//             messages: { // custom messages for radio buttons and checkboxes
//                 membership: {
//                     required: "Please select a Membership type"
//                 },
//                 service: {
//                     required: "Please select  at least 2 types of Service",
//                     minlength: jQuery.validator.format("Please select  at least {0} types of Service")
//                 }
//             },

//             errorPlacement: function (error, element) { // render error placement for each input type
//                 if (element.parents('.mt-radio-list') || element.parents('.mt-checkbox-list')) {
//                     if (element.parents('.mt-radio-list')[0]) {
//                         error.appendTo(element.parents('.mt-radio-list')[0]);
//                     }
//                     if (element.parents('.mt-checkbox-list')[0]) {
//                         error.appendTo(element.parents('.mt-checkbox-list')[0]);
//                     }
//                 } else if (element.parents('.mt-radio-inline') || element.parents('.mt-checkbox-inline')) {
//                     if (element.parents('.mt-radio-inline')[0]) {
//                         error.appendTo(element.parents('.mt-radio-inline')[0]);
//                     }
//                     if (element.parents('.mt-checkbox-inline')[0]) {
//                         error.appendTo(element.parents('.mt-checkbox-inline')[0]);
//                     }
//                 } else if (element.parent(".input-group").size() > 0) {
//                     error.insertAfter(element.parent(".input-group"));
//                 } else if (element.attr("data-error-container")) { 
//                     error.appendTo(element.attr("data-error-container"));
//                 } else {
//                     error.insertAfter(element); // for other inputs, just perform default behavior
//                 }
//             },

//             invalidHandler: function (event, validator) { //display error alert on form submit   
//                 success3.hide();
//                 error3.show();
//                 App.scrollTo(error3, -200);
//             },

//             highlight: function (element) { // hightlight error inputs
//                $(element)
//                     .closest('.form-group').addClass('has-error'); // set error class to the control group
//             },

//             unhighlight: function (element) { // revert the change done by hightlight
//                 $(element)
//                     .closest('.form-group').removeClass('has-error'); // set error class to the control group
//             },

//             success: function (label) {
//                 label
//                     .closest('.form-group').removeClass('has-error'); // set success class to the control group
//             },

//             submitHandler: function (form) {

//                 $.ajax({
//                    type: "POST",
//                    url: 'save',
//                    data: form3.serialize(), // serializes the form's elements.
//                    success: function(data)
//                    {
//                        if(data.trim()=="true"){
//                             success3.show();
//                             error3.hide();
//                             App.scrollTo(error3, -200);
//                             setTimeout(function(){
//                                 window.location.href=".";
//                             },1000)
//                        } else{
//                             success3.hide();
//                             error3.show();
//                             App.scrollTo(error3, -200);
//                        }
//                    }
//                  });

//             }

//         });

//          //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
//         $('.select2me', form3).change(function () {
//             form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
//         });

//         //initialize datepicker
//         $('.date-picker').datepicker({
//             rtl: App.isRTL(),
//             autoclose: true
//         });
//         $('.date-picker .form-control').change(function() {
//             form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
//         })
// }




// var handleWysihtml5 = function() {
//     if (!jQuery().wysihtml5) {

//         return;
//     }

//     if ($('.wysihtml5').size() > 0) {
//         $('.wysihtml5').wysihtml5({
//             "stylesheets": ["../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
//         });
//     }
// }