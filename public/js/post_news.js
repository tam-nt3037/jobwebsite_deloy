/*-- =============== New JS ================== --*/

function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}

/* Select 2*/

$(document).ready(function () {
    $('.js-example-basic-multiple').select2({
        placeholder: {
            id: '-1', // the value of the option
            text: 'Select an option'
        },
        tags: true,
        tokenSeparators: [',', ' '],
        maximumSelectionLength: 3,

    });
    $(".js-example-tokenizer").select2({
        tags: true,
        maximumSelectionLength: 3,
        tokenSeparators: [',', ' ']
    });
});


/* End Select 2*/

/* Get data for JOB CATEGORY*/
$(function () {

    let job_category_new = $('#job_category_new').val();
    job_category_new = $.parseJSON(job_category_new);

    $.each(job_category_new, function (index, value) {
        var flags = false;
        for (var k in value) {

            if (flags === true) {
                $('#select_expected_job_category_new').append("<option value=\"" + value.name_job_category + "'\" selected>" + value.name_job_category + "</option>");
            } else {
                $('#select_expected_job_category_new').append("<option value=\"" + value.name_job_category + "'\">" + value.name_job_category + "</option>");
            }
        }
    });

});

/* Get data for JOB CATEGORY ---END */

/* Get data for JOB LOCATION*/
$(function () {

    let job_location_new = $('#job_location_new').val();
    job_location_new = $.parseJSON(job_location_new);

    $.each(job_location_new, function (index, value) {
        var flags = false;
        for (var k in value) {

            if (flags === true) {
                $('#select_working_location_edit_post_new').append("<option value=\"" + value.name + "'\" selected>" + value.name + "</option>");
            } else {
                $('#select_working_location_edit_post_new').append("<option value=\"" + value.name + "'\">" + value.name + "</option>");
            }
        }


    });

});
/* Get data for JOB LOCATION ---END */


/* Get data for JOB SKILLS*/
$(function () {

    let job_skills_new = $('#job_skills_new').val();
    job_skills_new = $.parseJSON(job_skills_new);

    $.each(job_skills_new, function (index, value) {
        var flags = false;
        for (var k in value) {

            if (flags === true) {
                $('#tags_skills_new').append("<option value=\"" + value.name_key_skills + "'\" selected>" + value.name_key_skills + "</option>");
            } else {
                $('#tags_skills_new').append("<option value=\"" + value.name_key_skills + "'\">" + value.name_key_skills + "</option>");
            }
        }
    });

});

/* Get data for JOB SKILLS ---END */

$(function () {
    let select_expected_job_category_new, select_working_location_edit_post_new, skills_new;
    $('#create_post_news').on('click', function () {

        select_expected_job_category_new = $('#select_expected_job_category_new').select2('val').toString();
        select_expected_job_category_new = replaceAll(select_expected_job_category_new, '\'', '');

        select_working_location_edit_post_new = $('#select_working_location_edit_post_new').select2('val').toString();
        select_working_location_edit_post_new = replaceAll(select_working_location_edit_post_new, '\'', '');

        skills_new = $('#tags_skills_new').select2('val').toString();
        skills_new = replaceAll(skills_new, '\'', '');

        let benefits = CKEDITOR.instances['article-ckeditor-benefit'].getData();

        $.ajax({

            type: 'POST',
            url: '../../store',
            data: {

                job_title: $('#job_title_new').val(),
                number_recruits: $('#number_recruits_new').val(),
                id_level: $('#id_level_new').val(),
                id_type_work: $('#id_type_work_new').val(),
                id_level_salary: $('#id_level_salary_new').val(),
                name_job_category: select_expected_job_category_new,
                location_work: select_working_location_edit_post_new,
                description_work: $('#description_work_new').val(),
                require_work: $('#require_work_new').val(),
                skills: skills_new,
                year_experience: $('#year_experience_new').val(),
                gender: $('#gender_new').val(),
                id_languages_profile: $('#id_languages_profile_new').val(),
                id_qualification: $('#id_qualification_new').val(),
                id_service_pack: $("input[name='id_service_pack']:checked").val(),
                time_for_submission: $('#time_for_submission_new').val(),
                benefit : benefits
            },
            success: function () {
                alert("Created Success !!!");
                window.location.href = "../../admin/dashbroad";
            },
            error: function (data) {
                console.log(data);
                alert("error");
            }
        });


    });
});


// var add_categories
// var add_location_work

// $( window ).load(function() {
$(window).on('load', function () {
    // Run code

    var cate = $('#cate').text();
    var add_categories = cate.split(",");

    //lap tren categories
    if (cate.length > 0) {
        $.each(add_categories, function (key, value) {
            var html = '<span class="btn btn-primary btn-sm" title="' + value + '">' + value + '</span>' + "   ";
            $('#result_span').append(html);
            $(".hida").hide();
            document.getElementById("" + value).setAttribute("checked", "checked");
        });
    }


    var loca = $('#loca').text();
    var add_location_work = loca.split(",");

    //lap tren locations
    if (loca.length > 0) {
        $.each(add_location_work, function (key, value) {
            var html = '<span class="btn btn-primary btn-sm" title="' + value + '">' + value + '</span>' + "   ";
            $('#result_span2').append(html);
            $(".hida").hide();
            document.getElementById("" + value).setAttribute("checked", "checked");
        });
    }

    var skill = $('#skill').text();
    var skill_tags = skill.split(",");
    //lap tren skill tags
    if (skill.length > 0) {
        $.each(skill_tags, function (key, value) {
            var html = '<option selected="selected" >' + value + '</option>';
            $('#tags').append(html);
        });
    }

});


/*--   Start Category   --*/

$("#title_a").on('click', function () {
    $("#menu_ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function () {
    $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
    return $("#" + id).find("#result_span").html();
}

$(document).bind('click', function (e) {
    var $clicked = $(e.target);
    if (!$clicked.parents().hasClass("dropdown")) $("#menu_ul").hide();
});


var categories = [];

var cate = $('#cate').text();
var add_categories = cate.split(",");
if (cate.length > 0) {
    $.each(add_categories, function (key, value) {
        categories.push(value);
    });
}

$('#div_multi input[type="checkbox"]').on('click', function () {

    var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
        title = $(this).val();

    if ($(this).is(':checked')) {
        var html = '<span class="btn btn-primary btn-sm" title="' + title + '">' + title + '</span>' + "   ";
        $('#result_span').append(html);
        categories.push(title);
        $(".hida").hide();
    } else {
        $('span[title="' + title + '"]').remove();
        categories = categories.filter(item => item !== title)
        var ret = $(".hida");
        $('#title_a').append(ret);

    }
});


/*--   Place  --*/

$("#title_a2").on('click', function () {
    $("#menu_ul2").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function () {
    $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
    return $("#" + id).find("#result_span2").html();
}

$(document).bind('click', function (e) {
    var $clicked = $(e.target);
    if (!$clicked.parents().hasClass("dropdown")) $("#menu_ul2").hide();
});

var locations = [];

var loca = $('#loca').text();
var add_location_work = loca.split(",");
if (loca.length > 0) {
    $.each(add_location_work, function (key, value) {
        locations.push(value);
    });
}

$('#div_multi2 input[type="checkbox"]').on('click', function () {

    var title2 = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
        title2 = $(this).val();

    if ($(this).is(':checked')) {
        var html = '<span class="btn btn-primary btn-sm" title="' + title2 + '">' + title2 + '</span>' + "   ";
        $('#result_span2').append(html);
        locations.push(title2);
        $(".hida").hide();
    } else {
        $('span[title="' + title2 + '"]').remove();
        locations = locations.filter(item => item !== title2)
        var ret = $(".hida");
        $('#title_a2').append(ret);
    }
});


/*--  End Category + Place  --*/


/*-- tags skill --*/

$(function () {




    // $('#tags').on('change', function(){
    //     let s =  $('#tags').select2('val');
    //     document.getElementById("skills").value = s;
    // });


});

function test() {

    document.getElementById("name_job_category").value = categories;
    document.getElementById("location_work").value = locations;
}


/*-- END tags skill --*/


/*-- Add benefits --*/

$(document).ready(function () {

    var MaxInputs = 14; //N�mero Maximo de Campos
    var contenedor = $("#contenedor"); //ID del contenedor
    var AddButton = $("#agregarCampo"); //ID del Bot�n Agregar

    //var x = n�mero de campos existentes en el contenedor
    var x = $("#contenedor div").length + 1;
    var FieldCount = x - 1; //para el seguimiento de los campos

    $(AddButton).click(function (e) {
        if (x <= MaxInputs) //max input box allowed
        {
            FieldCount++;
            //agregar campo
            $(contenedor).append('<div class="row" style="padding-bottom: 5px">        <div class="col-md-3" style="padding-right: 0px">   <select type="text" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Texto ' + FieldCount + ' " style="width: 100%; height: auto;font-size: 16px; padding-right: 0px" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">  <option value="Bouns">Bouns</option><option value="Healthcare Plan">Healthcare Plan</option><option value="Paid Leave">Paid Leave</option><option value="Training">Training</option><option value="Awards">Awards</option><option value="Library">Library</option><option value="Laptop">Laptop</option> <option value="Mobile">Mobile</option><option value="Travel Opportunities">Travel Opportunities</option><option value="Team Activities">Team Activities</option><option value="Transporttation">Transporttation</option><option value="Canteen">Canteen</option><option value="Vouchers">Vouchers</option> <option value="Kindergarten">Kindergarten</option> <option value="Other">Other</option></select></div><div class="col-md-8" style="padding-left: 0px"><input style="font-size: 16px" type="text" aria-label="Last name" class="form-control" placeholder="Enter benefit detail"> </div>  <a href="#" class="eliminar">&times;</a> </div>');
            x++; //text box increment
        }
        return false;
    });

    $("body").on("click", ".eliminar", function (e) { //click en eliminar campo
        if (x > 1) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });
});

/*-- End add benefits --*/


/*!-- show image upload --*/

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

/*-- END show image upload --*/



