$(function (){
    "use strict";
    $(document).ready(function (){
        $(document).on('change','#profession',function (){
            $('#add_education_type').empty();
            var value = $(this).val();
            if (value === 'Student'){
                $('#add_education_type').append('<div class="form-group">\n' +
                    '                                    <select class="form-control" id="education_subject" name="education_subject" required>\n' +
                    '                                        <option value="">Select Education Type</option>\n' +
                    '                                        <option value="Engineer">Engineer</option>\n' +
                    '                                        <option value="General">General</option>\n' +
                    '                                    </select>\n' +
                    '                                    <i class="fa fa-graduation-cap"></i>\n' +
                    '                                </div>');
            }else{
                $('#add_education_type').empty();
                if ($('#add_type')){
                    $('#add_type').empty();
                }
            }
        });
        $(document).on('change','#education_subject',function (){
            var eduValue = $(this).val();
            $('#add_type').empty();
            if (eduValue === 'Engineer'){
                $('#add_type').empty();
                $('#add_type').append('<div class="form-group">\n' +
                    '                                    <select class="form-control" name="education_type" required>\n' +
                    '                                        <option value="">Select Education</option>\n' +
                    '                                        <option value="Graduation">Graduation</option>\n' +
                    '                                        <option value="Under Graduation">Under Graduation</option>\n' +
                    '                                        <option value="Diploma">Diploma in Engineering</option>\n' +
                    '                                    </select>\n' +
                    '                                    <i class="fa fa-sticky-note"></i>\n' +
                    '                                </div>')
            }else if (eduValue === 'General'){
                $('#add_type').empty();
                $('#add_type').append('<div class="form-group">\n' +
                    '                                    <select class="form-control" name="education_type" required>\n' +
                    '                                        <option value="">Select Education</option>\n' +
                    '                                        <option value="Graduation">Graduation</option>\n' +
                    '                                        <option value="Under Graduation">Under Graduation</option>\n' +
                    '                                    </select>\n' +
                    '                                    <i class="fa fa-sticky-note"></i>\n' +
                    '                                </div>');
            }else{
                console.log("else");
            }
        });

        $(document).on('change','#chb1',function (){
            $('#blood_section').empty();
            if ($(this).prop('checked') == true){
                $('#blood_section').empty();
                $('#blood_section').append('<div class="col-lg-12 col-sm-12">\n' +
                    '                                    <div class="form-group">\n' +
                    '                                        <label for="street">Street Address</label>\n' +
                    '                                        <input type="text" class="form-control" id="street" name="street_address" placeholder="Street Address" required>\n' +
                    '                                         <i class="fa fa-location-arrow"></i>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                <div class="col-lg-6" style="float: left">\n' +
                    '                                    <div class="form-group">\n' +
                    '                                        <label for="upozila">Upozila/Thana</label>\n' +
                    '                                        <input type="text" class="form-control" name="upozila" required id="upozila" placeholder="Upozila/Thana">\n' +
                    '                                        <i class="fa fa-map-marker"></i>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                <div class="col-lg-6 col-lg-6" style="float: left">\n' +
                    '                                    <div class="form-group">\n' +
                    '                                        <label for="country">Select Blood Group</label>\n' +
                    '                                        <select name="blood_group" id="blood" class="form-control" required>\n' +
                    '                                            <option value="">Select Blood Group</option>\n' +
                    '                                            <option value="A+">A+</option>\n' +
                    '                                            <option value="A-">A-</option>\n' +
                    '                                            <option value="B+">B+</option>\n' +
                    '                                            <option value="B-">B-</option>\n' +
                    '                                            <option value="O+">O+</option>\n' +
                    '                                            <option value="O-">O-</option>\n' +
                    '                                            <option value="AB+">AB+</option>\n' +
                    '                                            <option value="AB-">AB-</option>\n' +
                    '                                        </select>\n' +
                    '                                        <i class="fa fa-tint"></i>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                 <div class="col-lg-6 col-sm-6" style="float: right">\n' +
                    '                                    <div class="form-group">\n' +
                    '                                            <label for="state" >Select District</label>\n' +
                    '                                            <select required class="form-control"  id="state" name="country"></select>\n' +
                    '                                        <i class="fa fa-globe"></i>\n' +
                    '                                        </div>\n' +
                    '                                </div>\n' +
                    '                                <div class="col-lg-6 col-lg-6" style="float: right">\n' +
                    '                                    <div class="form-group">\n' +
                    '                                            <label for="country">Select Country</label>\n' +
                    '                                            <select required class="form-control"  id="country" name="district"></select>\n' +
                    '                                        <i class="fa fa-flag"></i>\n' +
                    '                                        </div>\n' +
                    '                                </div>');
                populateCountries("country", "state");
            }else{
                $('#blood_section').empty();
            }
        });
    });

});
