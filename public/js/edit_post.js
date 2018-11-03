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

    let select_job_category = $('#category_selected_data').val();
    let job_category = $('#job_category').val();
    select_job_category = select_job_category.split(",");
    job_category = $.parseJSON(job_category);

    $.each(job_category, function (index, value) {
        var flags = false;
        for (var k in value) {
            $.each(select_job_category, function (index, value2) {

                if (value2 === value.name_job_category) {
                    flags = true;
                }
            });
            if (flags === true) {
                $('#select_expected_job_category').append("<option value=\"" + value.name_job_category + "'\" selected>" + value.name_job_category + "</option>");
            } else {
                $('#select_expected_job_category').append("<option value=\"" + value.name_job_category + "'\">" + value.name_job_category + "</option>");
            }
        }


    });

});

/* Get data for JOB CATEGORY ---END */

/* Get data for JOB SKILLS*/
$(function () {

    let skills_selected_data = $('#skills_selected_data').val();
    let job_skills = $('#job_skills').val();
    skills_selected_data = skills_selected_data.split(",");
    job_skills = $.parseJSON(job_skills);

    $.each(job_skills, function (index, value) {
        var flags = false;
        for (var k in value) {
            $.each(skills_selected_data, function (index, value2) {

                if (value2 === value.name_key_skills) {
                    flags = true;
                }
            });
            if (flags === true) {
                $('#tags_skills').append("<option value=\"" + value.name_key_skills + "'\" selected>" + value.name_key_skills + "</option>");
            } else {
                $('#tags_skills').append("<option value=\"" + value.name_key_skills + "'\">" + value.name_key_skills + "</option>");
            }
        }


    });

});

/* Get data for JOB SKILLS ---END */

/* Set data for JOB BENEFITS */

$(function () {

    $('#article-ckeditor-edit-benefit').val($('#benefits_data').val());
});

/* Set data for JOB BENEFITS ---END */

/* Set data for JOB TIME SUBMISSION  */
$(function () {
    $('#time_for_submission_new').val($('#time_submission_data').val());
});
/* Set data for JOB TIME SUBMISSION ---END */

function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}

/* Update Edit Post */
$(function () {


    let select_expected_job_category, select_working_location_edit_post, skills;

    $('#done').on('click', function () {
        let benefits = CKEDITOR.instances['article-ckeditor-edit-benefit'].getData();
        let id_posts = $('#id_posts').val();

        select_expected_job_category = $('#select_expected_job_category').select2('val').toString();
        select_expected_job_category = replaceAll(select_expected_job_category, '\'', '');

        select_working_location_edit_post = $('#select_working_location_edit_post').select2('val').toString();
        select_working_location_edit_post = replaceAll(select_working_location_edit_post, '\'', '');

        skills = $('#tags_skills').select2('val').toString();
        skills = replaceAll(skills, '\'', '');

        // alert(select_expected_job_category);

        $.ajax({

            type: 'PUT',
            url: '../../update/' + id_posts,
            data: {

                job_title: $('#job_title').val(),
                number_recruits: $('#number_recruits').val(),
                id_level: $('#id_level').val(),
                id_type_work: $('#id_type_work').val(),
                id_level_salary: $('#id_level_salary').val(),
                name_job_category: select_expected_job_category,
                location_work: select_working_location_edit_post,
                description_work: $('#description_work').val(),
                require_work: $('#require_work').val(),
                skills: skills,
                year_experience: $('#year_experience').val(),
                gender: $('#gender').val(),
                id_languages_profile: $('#id_languages_profile').val(),
                id_qualification: $('#id_qualification').val(),
                benefit: benefits,
                time_for_submission: $('#time_for_submission_new').val()
            },
            success: function () {
                alert("Updated Success !!!");

                window.location.href = "../../admin/dashbroad";
            },
            error: function (data) {
                console.log(data);
                // alert("error");
            }
        });

    });
});


/* Update Edit Post -- END */

/* Get data for JOB LOCATION*/
$(function () {

    let location_selected_data = $('#location_selected_data').val();
    let job_location = $('#job_location').val();
    location_selected_data = location_selected_data.split(",");
    job_location = $.parseJSON(job_location);

    $.each(job_location, function (index, value) {
        var flags = false;
        for (var k in value) {
            $.each(location_selected_data, function (index, value2) {

                if (value2 === value.name) {
                    flags = true;
                }
            });
            if (flags === true) {
                $('#select_working_location_edit_post').append("<option value=\"" + value.name + "'\" selected>" + value.name + "</option>");
            } else {
                $('#select_working_location_edit_post').append("<option value=\"" + value.name + "'\">" + value.name + "</option>");
            }
        }


    });

});
/* Get data for JOB LOCATION ---END */


// // $( window ).load(function() {
//     $( window ).on('load',function() {
//         // Run code

//         var cate = $('#cate').text();    
//         var categories = cate.split(",");

//         //lap tren categories
//         if(cate.length > 0){
//             $.each( categories, function( key, value ) {
//                 var html = '<span class="btn btn-primary btn-sm" title="' + value + '">' + value + '</span>' + "   ";
//                 $('#result_span').append(html);
//                 $(".hida").hide();
//                 document.getElementById(""+value).setAttribute("checked", "checked"); 
//             });
//         }


//         var loca = $('#loca').text();    
//         var location_word = loca.split(",");

//         //lap tren locations
//         if(loca.length > 0){
//             $.each( location_word, function( key, value ) {
//                 var html = '<span class="btn btn-primary btn-sm" title="' + value + '">' + value + '</span>' + "   ";
//                 $('#result_span2').append(html);
//                 $(".hida").hide();
//                 document.getElementById(""+value).setAttribute("checked", "checked"); 
//             });
//         }

//         // var skill = $('#skill').text();
//         // var skill_tags = skill.split(",");

//         // //lap tren skill tags
//         // if(skill.length > 0){
//         //     $.each( skill_tags, function( key, value ) {
//         //         var _listItem = "<li class='animated'>" + tagName + "<span class='removeTag'>&times;</span></li>";
//         //             $listParent.append(_listItem);
//         //             $('.dots').removeClass('wobble');
//         //     });
//         // }

//     });

