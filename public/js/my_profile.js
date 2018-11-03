/*!-- show image upload --*/

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewing')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


/*-- END show image upload --*/


/*Date Picker*/

$(".date-picker").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});

$(".date-picker").on("change", function () {
    var id = $(this).attr("id");
    var val = $("label[for='" + id + "']").text();
    $("#msg").text(val + " changed");

});

/*End Date Picker*/


/* Load Countries */

$(function () {

    $.ajax({
        type: 'GET',
        url: '/countries',
        success: function (data) {

            $.each(eval(data.replace(/[\r\n]/, "")), function (i, item) {
                //alert(item.name + item.code);
                $('#select_country').append("<option value='" + item.name + "'>" + item.name + "</option>");
            });
        }
    });
});
/* Load Countries */


/* Load Provinces Cities */

$(function () {

    $.ajax({
        type: 'GET',
        url: '/provinces_cities',
        success: function (data) {

            //console.log(data.HANOI.name);
            $('#data_provinces_city').val(data);
            $.each(data, function (i, item) {
                //console.log(i + item.name);
                $('#province_city').append("<option value='" + item.name + "'>" + item.name + "</option>");
                $('#select_working_location').append("<option value='" + item.name + "'>" + item.name + "</option>");

            });

            /* District in City */
            $('#province_city').on('change', function () {

                $.ajax({
                    type: 'GET',
                    url: '/provinces_cities',
                    success: function (data) {

                        let city = $('#province_city').selectpicker("val");
                        switch (city) {
                            case data.HANOI.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HANOI.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.HOCHIMINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HOCHIMINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.HAIPHONG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HAIPHONG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.DANANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.DANANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.HAGIANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HAGIANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.CAOBANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.CAOBANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.LAICHAU.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.LAICHAU.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.LAOCAI.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.LAOCAI.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.TUYENQUANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.TUYENQUANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.LANGSON.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.LANGSON.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BACKAN.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.BACKAN.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.THAINGUYEN.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.THAINGUYEN.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.YENBAI.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.YENBAI.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.SONLA.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.SONLA.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '" >' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.PHUTHO.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.PHUTHO.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.VINHPHUC.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.VINHPHUC.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.QUANGNINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.QUANGNINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BACGIANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1"  selected="">Please select...</option>');
                                $.each(data.BACGIANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BACNINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.BACNINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.HAIDUONG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HAIDUONG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.HUNGYEN.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HUNGYEN.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.HOABINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HOABINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.HANAM.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HANAM.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.NAMDINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">>Please select...</option>');
                                $.each(data.NAMDINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '"' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.THAIBINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.THAIBINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.NINHBINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.NINHBINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.THANHHOA.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1"  selected="">Please select...</option>');
                                $.each(data.THANHHOA.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.NGHEAN.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.NGHEAN.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.HATINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HATINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.QUANGBINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.QUANGBINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.QUANGTRI.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.QUANGTRI.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.THUATHIENHUE.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1"  selected="">Please select...</option>');
                                $.each(data.THUATHIENHUE.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.QUANGNAM.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1"  selected="">Please select...</option>');
                                $.each(data.QUANGNAM.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.QUANGNGAI.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.QUANGNGAI.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.KONTUM.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1"  selected="">Please select...</option>');
                                $.each(data.KONTUM.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BINHDINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.BINHDINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.GIALAI.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.GIALAI.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.PHUYEN.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.PHUYEN.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.DAKLAK.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.DAKLAK.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.KHANHHOA.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.KHANHHOA.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.LAMDONG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.LAMDONG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BINHPHUOC.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.BINHPHUOC.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BINHDUONG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.BINHDUONG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.NINHTHUAN.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.NINHTHUAN.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.TAYNINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.TAYNINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BINHTHUAN.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.BINHTHUAN.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.DONGNAI.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.DONGNAI.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.LONGAN.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.LONGAN.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.DONGTHAP.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.DONGTHAP.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.ANGIANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.ANGIANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BARIAVUNGTAU.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.BARIAVUNGTAU.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.TIENGIANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.TIENGIANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.KIENGIANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.KIENGIANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.TRAVINH.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.TRAVINH.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BENTRE.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.BENTRE.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.VINHLONG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.VINHLONG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.SOCTRANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1"  selected="">Please select...</option>');
                                $.each(data.SOCTRANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.BACLIEU.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.BACLIEU.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.CAMAU.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.CAMAU.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.DIENBIEN.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1"  selected="">Please select...</option>');
                                $.each(data.DIENBIEN.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.DAKNONG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.DAKNONG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                            case data.HAUGIANG.name :
                                $("#district").empty();
                                $("#district").append('<option value="-1" selected="">Please select...</option>');
                                $.each(data.HAUGIANG.cities, function (index, item) {
                                    $("#district").append('<option value="' + item + '">' + item + '</option>');
                                    $("#district").selectpicker("refresh");
                                    $("#district").selectpicker('toggle');
                                });
                                break;
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });

            }).trigger('click');
            /* District in City END */
        },
        error: function (data) {
            console.log(data);
        }
    });


});

/* Load Provinces Cities */


/* Choose Country is Viet Nam */

function check_country_is_vietnam() {

    $(function () {
        let country = $('#select_country').val();

        if (country == "Viet Nam") {
            $('#province_city').prop("disabled", false);
            $('#district').prop("disabled", false);
            $('#province_city').selectpicker("val", "");
            $('#province_city').find('[value=International]').hide();
            $('#province_city').selectpicker('refresh');
        } else {
            $('#province_city').selectpicker("val", "International");
            $('#province_city').find('[value=International]').show();
            $('#province_city').prop("disabled", "disabled");
            $('#district').prop("disabled", "disabled");
            $('#district').selectpicker("val", "");
        }

    });
}

/* Choose Country is Viet Nam END */


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
});

/* End Select 2*/

/*
* Select Expertise
* */
$(document).ready(function () {

    $("#select_expertise").select2({
        placeholder: "Select a area of expertise",
        tokenSeparators: [',', ' '],
        tags: true,
    });


    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    //
    // $.ajax({ //Load new data
    //
    //     type: 'GET',
    //     url: '/user/profile',
    //     dataType: 'json',
    //     success: function (response) {
    //         // {{--@if(count($key_skills_selected) > 0)--}}
    //         // {{--@foreach($key_skills_selected as $skills_selected)--}}
    //         // {{--<span class="badge p-3 badge-warning"--}}
    //         // {{--style="background-color: #e7e2e2; color: #666666;">{{$skills_selected}}</span>--}}
    //         //     {{--@endforeach--}}
    //         //     {{--@endif--}}
    //         // $.each(response.key_skills_selected, function(i, key_skills_selected){
    //         //     console.log(key_skills_selected.skills);
    //         // });
    //         console.log(response.key_skills_selected);
    //     },
    //     error: function (response) {
    //         console.log(response.key_skills_selected);
    //     }
    // });

});

/*
* Select Expertise
* */

/* User Info */

function hideYearExperience() {

    $(document).ready(function () {

        $('#year-experience-form').addClass('hidden');
    });
}

function showYearExperience() {

    $(document).ready(function () {

        if ($('#year-experience-form').hasClass("hidden")) {
            $('#year-experience-form').removeClass('hidden');
        } else {
            $('#year-experience-form').addClass('hidden');
        }


    })
}

function submitUserInfoForm() {
    let id = $('#id').val();

    let firstName = $('#firstName').val();
    let lastName = $('#lastName').val();
    let professional_title = $('#professional_title').val();
    let select_Current_Job_Level = $('#select_Current_Job_Level').val();

    let checkbox_graduate = $('#checkbox_graduate').is(":checked");
    var year_experience;

    if (firstName.trim() == '') {
        alert('Please enter first name.');
        $('#firstName').focus();
        return false;
    } else if (lastName.trim() == '') {
        alert('Please enter last name.');
        $('#lastName').focus();
        return false;
    } else if (professional_title.trim() == '') {
        alert('Please enter professional title name.');
        $('#professional_title').focus();
        return false;
    } else if (select_Current_Job_Level == 'Please select ...') {
        alert('Please choose current job.');
        $('#select_Current_Job_Level').focus();
        return false;
    } else if (checkbox_graduate == true) { // With option do not have number experience

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'POST',
            url: '/user/info',
            data: {
                firstName: "" + firstName,
                lastName: "" + lastName,
                professional_title: "" + professional_title,
                select_Current_Job_Level: "" + select_Current_Job_Level,
                year_experience: -1,
            },
            success: function () {

                $('#fullName').html(lastName + " " + firstName);
                $('#professional_title_current_job_level').html(professional_title + " / " + select_Current_Job_Level);
                $('#year_experience_view').html("I am a new graduate / have no work experience");

                alert("Updated Success");
            },
            error: function () {
                console.log(data);
            }
        });

    } else if (checkbox_graduate == false) { // With option have number experience
        year_experience = $('#year_experience').val();

        if (year_experience.trim() == '') {
            alert('Please enter year experience.');
            $('#year_experience').focus();
            return false;
        } else {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                type: 'POST',
                url: '/user/info',
                data: {
                    firstName: "" + firstName,
                    lastName: "" + lastName,
                    professional_title: "" + professional_title,
                    select_Current_Job_Level: "" + select_Current_Job_Level,
                    year_experience: "" + year_experience,
                },
                success: function () {


                    $('#fullName').html(lastName + " " + firstName);
                    $('#professional_title_current_job_level').html(professional_title + " / " + select_Current_Job_Level);
                    $('#year_experience_view').html("Years of experience: " + year_experience + " years");

                    alert("Updated Success");
                },
                error: function () {
                    console.log(data);
                }
            });


            // form

        }


    }
}

/* SET CONTACT INFORMATION SELECTED */
$(function () {

    $('#modalFormContactInformation').on('show.bs.modal', function (e) {
        let gender = $(e.relatedTarget).data('contact-gender').toString();
        let country = $(e.relatedTarget).data('contact-country').toString();
        let city = $(e.relatedTarget).data('contact-city').toString();
        let district = $(e.relatedTarget).data('contact-district').toString();
        let address = $(e.relatedTarget).data('contact-address').toString();

        $('#gender-' + gender.toLowerCase()).attr("checked", true);
        $(this).find('#address').val(address.trim());
        $(this).find('#select_country').selectpicker('val', country.trim());
        $(this).find('#province_city').selectpicker('val', city.trim());
        $('#district').append('<option value="' + district + '" >' + district + '</option>');
        $('#district').selectpicker('refresh');

    });
});

/* SET LANGUAGES SELECTED - END */

function submitContactInformationForm() {

    let address = $('#address').val();
    let cell_number = $('#cell-number').val();
    let doB = $('#doB').val();
    let nationality = $('select#select_nationality').val();
    let country = $('select#select_country').val();
    let province = $('select#province_city').val();
    let district = $('select#district').val();
    let gender = $("input[name=gender]").val();
    let marital_status = $("input[type=radio][name=marital]:checked").val();

    let gender_check = $("input[type=radio][name=gender]:checked").val();

    if (address.trim() == '') {
        alert("Please enter your address");
        $('#address').focus();
        return false;
    } else if (cell_number.trim() == '') {
        alert("Please enter your cell number");
        $('#cell-number').focus();
        return false;
    } else if (doB.trim() == '') {
        alert("Please enter your birthday");
        $('#doB').focus();
        return false;
    } else if (nationality == '-1') {
        alert("Please choose your nationality");
        $('select#select_nationality').focus();
        return false;
    } else if (gender_check == undefined) {
        alert("Please choose your gender");
        $('input[type=radio][name=gender]').focus();
        return false;
    } else if (marital_status == undefined) {
        alert("Please choose your marital status");
        $('input[type=radio][name=marital]').focus();
        return false;
    } else if (country == '-1') {
        alert("Please choose your country");
        $('select#select_country').focus();
        return false;
    } else if (province == '-1') {
        alert("Please choose your province");
        $('select#province_city').focus();
        return false;
    } else if (district == '-1') {
        alert("Please choose your district");
        $('select#district').focus();
        return false;
    } else {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'PUT',
            url: '/user/contact',
            data: {
                address: address,
                cell_number: cell_number,
                doB: doB,
                nationality: nationality,
                gender: gender,
                marital_status: marital_status,
                country: country,
                province: province,
                district: district
            },
            success: function () {
                /*
                * UPDATE VIEW
                * */

                $('#cell_number_view').html(cell_number);
                $('#doB_view').html(doB);
                $('#nationality_view').html(nationality);
                $('#gender_view').html(gender);
                $('#marital_status_view').html(marital_status);
                $('#country_view').html(country);
                $('#city_view').html(province);
                $('#address_view').html(address);
                $('#district_view').html(district);

                alert("Updated Success !!!");
            },
            error: function () {
                console.log(data);
            }
        });
    }
}

function submitSummaryForm() {

    let summary_text = CKEDITOR.instances['article-ckeditor-summary'].getData();
    let words_lenght = summary_text.split(' ').length;

    if (words_lenght >= 1000) {
        alert('Maximum 1000 words !!!');
        $('#article-ckeditor-summary').focus();
        return false;
    } else {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'POST',
            url: '/user/summary',
            data: {
                general_info: "" + summary_text,
            },
            success: function () {

                $('#summary_view').html(summary_text);
                alert("Updated Success !!!");
            },
            error: function () {
                console.log(data);
            }
        });

        $.ajax({

            type: 'GET',
            url: '/user/summary',

            success: function (data) {
                $('#summary_view').html(data.info[0].general_info);
            },
            error: function () {
                console.log(data);
            }
        });
    }
}


// $.ajax({
//     type:'POST',
//     url:'submit_form.php',
//     data:'contactFrmSubmit=1&name='+name+'&email='+email+'&message='+message,
//     beforeSend: function () {
//         $('.submitBtn').attr("disabled","disabled");
//         $('.modal-body').css('opacity', '.5');
//     },
//     success:function(msg){
//         if(msg == 'ok'){
//             $('#inputName').val('');
//             $('#inputEmail').val('');
//             $('#inputMessage').val('');
//             $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
//         }else{
//             $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
//         }
//         $('.submitBtn').removeAttr("disabled");
//         $('.modal-body').css('opacity', '');
//     }
// });

/* User Info */


/*
*     Key Skills
* */

$(function () {
    /*
   * Validate data if empty
   * */
    let info = "Please choose key skills !!!";
    if ($('#skills_hidden_data').val() == '') {
        $("#selected_skills").append("<span class='badge p-3 mr-2 badge-warning' " +
            "style='background-color: #e7e2e2; color: #666666;'>" + info + '</span>');
    } else {

        let selected_skills = $('#skills_hidden_data').val();
        let selected_skills_split = selected_skills.split(',');
        $.each(selected_skills_split, function (index, value) {
            $("#selected_skills").append("<span class='badge p-3 mr-2 badge-warning' " +
                "style='background-color: #e7e2e2; color: #666666;'>" + value + '</span>');
        });
    }
});

function submitKeySkillsForm() {

    //alert("Selected value is: " + $("#select_expertise").select2("val"));

    let choose_key_skills = $("#select_expertise").select2("val");

    /*
    * Validate data
    * */
    if ($.trim(choose_key_skills) == '') {
        alert('Please choose at least 1 expertise !!!');
        $('#select_expertise').focus();
        return false;
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'PUT',
            url: '/user/skills',
            data: {
                keyskills: "" + choose_key_skills
            },
            success: function () {

                /*                      *
                * Update Value For View *
                *                       *
                *                       */
                var selected_skills = $("#select_expertise").select2("val") + "";
                let selected_skills_split = selected_skills.split(',');
                $("#selected_skills").empty(); // Delete all item
                $.each(selected_skills_split, function (index, value) {
                    $("#selected_skills").append("<span class='badge p-3 mr-2 badge-warning' " +
                        "style='background-color: #e7e2e2; color: #666666;'>" + value + '</span>');
                });

                alert("Updated Success");
            },
            error: function () {
                console.log(data);
            }
        });
    }
}

/*
*    End Key Skills
* */

/*
* Languages
* */

// GET DATA


// $(document).ready(function () {
//     $.ajax({
//
//         type: 'GET',
//         url: '/user/languages',
//
//         success: function (data) {
//
//             let i;
//             for (i = 0; i < data.languages.length; i++) {
//                 //alert( data.languages[i].name_language +  data.languages[i].proficiency );
//                 //$('#select_languages').append("<option class=\"form-select\" value=\""+data.languages[i].name_language+"\">"+data.languages[i].name_language+"</option>")
//             }
//         },
//         error: function () {
//             console.log(data);
//         }
//     });
// });

/* SET LANGUAGES SELECTED */
$(function () {

    $('#modalFormLanguages').on('show.bs.modal', function (e) {
        let languagesId = $(e.relatedTarget).data('languages-id').toString();
        let languagesName = $(e.relatedTarget).data('languages-name').toString();
        let languagesProfi = $(e.relatedTarget).data('languages-proficiency').toString();

        $(this).find('input[name="languagesId"]').val(languagesId.trim());
        $(this).find('#select_languages').selectpicker('val', languagesName.trim());
        $(this).find('#select_proficiency').selectpicker('val', languagesProfi.trim());

    });
});
/* SET LANGUAGES SELECTED - END */

var token =  $('input[name="_token"]').attr('value');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({

    type: 'GET',
    url: '/user/languages',
    headers: {
        'X-CSRF-TOKEN' : token
    },

    success: function (data) {

        /*                      *
        * Update Value For View *
        *                       *
        *                       */
        console.log(data);

        $('#wrap_languages').empty();
        $('#wrap_languages').append('' +
            '<div class="m-3" id="wrap_languages">\n' +
            '                            <div class="row">\n' +
            '                                <div class="col-sm-4">\n' +
            '                                    <label for="">Languages</label>\n' +
            '                                </div>\n' +
            '                                <div class="col-sm-8">\n' +
            '                                    <label>Proficiency</label>\n' +
            '                                </div>\n' +
            '                            </div>' +
            '');
        $.each(data.languages, function (k, item) {
            $('#wrap_languages').append('' +
                ' <div class="row">\n' +
                '                                        <div class="col-sm-4 mb-2 mt-2">\n' +
                '\n' +
                '                                            <div id="name_language_view">' + item.name_language + '</div>\n' +
                '                                        </div>\n' +
                '                                        <div class="col-sm-6 mb-2 mt-2">\n' +
                '                                            <div id="proficiency_view">' + item.proficiency + '</div>\n' +
                '                                        </div>\n' +
                '                                        <div class="col-sm-2 mb-2 mt-2 ">\n' +
                '                                            <div class="row">\n' +
                '                                                <button type="button" class="btn btn-default btn-cancel mr-1"\n' +
                '                                                        id="btnEditLanguages">\n' +
                '                                                    <a href="#modalFormLanguages" data-toggle="modal"\n' +
                '                                                       data-languages-id="' + item.id + '"\n' +
                '                                                       data-languages-name="' + item.name_language + '"\n' +
                '                                                       data-languages-proficiency="' + item.proficiency + '">\n' +
                '                                                        Edit</a>\n' +
                '                                                </button>\n' +
                '\n' +
                '                                                <form method="POST">\n' +
                '                                                    <input type="hidden" name="_token" value="'+token+'">\n' +
                '                                                    <button type="button" class="btn btn-default btn-danger"\n' +
                '                                                            id="btnDeleteLanguages">\n' +
                '                                                        Delete\n' +
                '                                                    </button>\n' +
                '                                                </form>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                    <hr>');
        });
        $('#wrap_languages').append('</div>');


    },
    error: function () {
        console.log(data);
    }
});

// DELETE LANGUAGES
// $(function () {
//    $('#btnDeleteLanguages').on('click', function () {
//       alert("Hello");
//    });
// });

// SUBMIT FORM
function submitLanguagesForm() {


    let languagesId = $(".languagesId").val().toString();
    let languagesName = $('#select_languages').find(":selected").text();
    let languagesProfi = $('#select_proficiency').find(":selected").text();

    if (languagesName.trim() == "") {
        alert("Please choose languages name");
        $('#select_languages').focus();
        return false;
    } else if (languagesProfi.trim() == "") {
        alert("Please choose proficiency");
        $('#select_languages').focus();
        return false;
    } else if (languagesId == -1) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'POST',
            url: '/user/languages',
            data: {
                languagesId: languagesId,
                languagesName: languagesName,
                languagesProfi: languagesProfi,
            },
            success: function (data) {

                var token =  $('input[name="_token"]').attr('value');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    type: 'GET',
                    url: '/user/languages',
                    headers: {
                        'X-CSRF-TOKEN' : token
                    },

                    success: function (data) {

                        /*                      *
                        * Update Value For View *
                        *                       *
                        *                       */
                        console.log(data);

                        $('#wrap_languages').empty();
                        $('#wrap_languages').append('' +
                            '<div class="m-3" id="wrap_languages">\n' +
                            '                            <div class="row">\n' +
                            '                                <div class="col-sm-4">\n' +
                            '                                    <label for="">Languages</label>\n' +
                            '                                </div>\n' +
                            '                                <div class="col-sm-8">\n' +
                            '                                    <label>Proficiency</label>\n' +
                            '                                </div>\n' +
                            '                            </div>' +
                            '');
                        $.each(data.languages, function (k, item) {
                            $('#wrap_languages').append('' +
                                ' <div class="row">\n' +
                                '                                        <div class="col-sm-4 mb-2 mt-2">\n' +
                                '\n' +
                                '                                            <div id="name_language_view">' + item.name_language + '</div>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-sm-6 mb-2 mt-2">\n' +
                                '                                            <div id="proficiency_view">' + item.proficiency + '</div>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-sm-2 mb-2 mt-2 ">\n' +
                                '                                            <div class="row">\n' +
                                '                                                <button type="button" class="btn btn-default btn-cancel mr-1"\n' +
                                '                                                        id="btnEditLanguages">\n' +
                                '                                                    <a href="#modalFormLanguages" data-toggle="modal"\n' +
                                '                                                       data-languages-id="' + item.id + '"\n' +
                                '                                                       data-languages-name="' + item.name_language + '"\n' +
                                '                                                       data-languages-proficiency="' + item.proficiency + '">\n' +
                                '                                                        Edit</a>\n' +
                                '                                                </button>\n' +
                                '\n' +
                                '                                                <form action="http://jobwebsite.me/user/languages/'+item.id+'" method="POST">\n' +
                                '                                                    <input type="hidden" name="_token" value="'+token+'">\n' +
                                '                                                    <button type="submit" class="btn btn-default btn-danger"\n' +
                                '                                                            id="btnDeleteLanguages">\n' +
                                '                                                        Delete\n' +
                                '                                                    </button>\n' +
                                '                                                </form>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                    </div>\n' +
                                '                                    <hr>');
                        });
                        $('#wrap_languages').append('</div>');


                    },
                    error: function () {
                        console.log(data);
                    }
                });

                alert("Created languages successful");
            },
            error: function () {
                console.log(data);
            }
        });

        // Update View
        $.ajax({

            type: 'GET',
            url: '/user/languages',
            success: function (data) {

                /*                      *
                * Update Value For View *
                *                       *
                *                       */

                // $('#wrap_languages').empty();
                // $('#wrap_languages').append('' +
                //     '<div class="m-3" id="wrap_languages">\n' +
                //     '                            <div class="row">\n' +
                //     '                                <div class="col-sm-4">\n' +
                //     '                                    <label for="">Languages</label>\n' +
                //     '                                </div>\n' +
                //     '                                <div class="col-sm-8">\n' +
                //     '                                    <label>Proficiency</label>\n' +
                //     '                                </div>\n' +
                //     '                            </div>' +
                //     '');
                // $.each(data.languages, function (k, item) {
                //     $('#wrap_languages').append('' +
                //         ' <div class="row">\n' +
                //         '                                        <div class="col-sm-4 mb-2 mt-2">\n' +
                //         '\n' +
                //         '                                            <div id="name_language_view">' + item.name_language + '</div>\n' +
                //         '                                        </div>\n' +
                //         '                                        <div class="col-sm-6 mb-2 mt-2">\n' +
                //         '                                            <div id="proficiency_view">' + item.proficiency + '</div>\n' +
                //         '                                        </div>\n' +
                //         '                                        <div class="col-sm-2 mb-2 mt-2 ">\n' +
                //         '                                            <div class="row">\n' +
                //         '                                                <button type="button" class="btn btn-default btn-cancel mr-1"\n' +
                //         '                                                        id="btnEditLanguages">\n' +
                //         '                                                    <a href="#modalFormLanguages" data-toggle="modal"\n' +
                //         '                                                       data-languages-id="' + item.id + '"\n' +
                //         '                                                       data-languages-name="' + item.name_language + '"\n' +
                //         '                                                       data-languages-proficiency="' + item.proficiency + '">\n' +
                //         '                                                        Edit</a>\n' +
                //         '                                                </button>\n' +
                //         '\n' +
                //         '                                                <form action="'+window.location.host+'/user/languages/'+item.id+'" method="POST">\n' +
                //         '                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">\n' +
                //         '                                                    <button type="submit" class="btn btn-default btn-danger"\n' +
                //         '                                                            id="btnDeleteLanguages">\n' +
                //         '                                                        Delete\n' +
                //         '                                                    </button>\n' +
                //         '                                                </form>\n' +
                //         '                                            </div>\n' +
                //         '                                        </div>\n' +
                //         '                                    </div>\n' +
                //         '                                    <hr>');
                // });
                // $('#wrap_languages').append('</div>');


            },
            error: function () {
                console.log(data);
            }
        });

    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'PUT',
            url: '/user/languages',
            data: {
                languagesId: "" + languagesId,
                languagesName: "" + languagesName,
                languagesProfi: "" + languagesProfi,
            },
            success: function () {

                /*                      *
                * Update Value For View *
                *                       *
                *                       */

                var token =  $('input[name="_token"]').attr('value');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    type: 'GET',
                    url: '/user/languages',
                    headers: {
                        'X-CSRF-TOKEN' : token
                    },

                    success: function (data) {

                        /*                      *
                        * Update Value For View *
                        *                       *
                        *                       */
                        console.log(data);

                        $('#wrap_languages').empty();
                        $('#wrap_languages').append('' +
                            '<div class="m-3" id="wrap_languages">\n' +
                            '                            <div class="row">\n' +
                            '                                <div class="col-sm-4">\n' +
                            '                                    <label for="">Languages</label>\n' +
                            '                                </div>\n' +
                            '                                <div class="col-sm-8">\n' +
                            '                                    <label>Proficiency</label>\n' +
                            '                                </div>\n' +
                            '                            </div>' +
                            '');
                        $.each(data.languages, function (k, item) {
                            $('#wrap_languages').append('' +
                                ' <div class="row">\n' +
                                '                                        <div class="col-sm-4 mb-2 mt-2">\n' +
                                '\n' +
                                '                                            <div id="name_language_view">' + item.name_language + '</div>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-sm-6 mb-2 mt-2">\n' +
                                '                                            <div id="proficiency_view">' + item.proficiency + '</div>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-sm-2 mb-2 mt-2 ">\n' +
                                '                                            <div class="row">\n' +
                                '                                                <button type="button" class="btn btn-default btn-cancel mr-1"\n' +
                                '                                                        id="btnEditLanguages">\n' +
                                '                                                    <a href="#modalFormLanguages" data-toggle="modal"\n' +
                                '                                                       data-languages-id="' + item.id + '"\n' +
                                '                                                       data-languages-name="' + item.name_language + '"\n' +
                                '                                                       data-languages-proficiency="' + item.proficiency + '">\n' +
                                '                                                        Edit</a>\n' +
                                '                                                </button>\n' +
                                '\n' +
                                '                                                <form action="http://jobwebsite.me/user/languages/'+item.id+'" method="POST">\n' +
                                '                                                    <input type="hidden" name="_token" value="'+token+'">\n' +
                                '                                                    <button type="submit" class="btn btn-default btn-danger"\n' +
                                '                                                            id="btnDeleteLanguages">\n' +
                                '                                                        Delete\n' +
                                '                                                    </button>\n' +
                                '                                                </form>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                    </div>\n' +
                                '                                    <hr>');
                        });
                        $('#wrap_languages').append('</div>');


                    },
                    error: function () {
                        console.log(data);
                    }
                });

                alert("Updated languages successful");
            },
            error: function () {
                console.log(data);
            }
        });


    }

}

/*
* Languages End
* */


/* Employment History */

$('#modalFormEmploymentHistory').on('show.bs.modal', function (e) {

    let id = $(e.relatedTarget).data('employment-id');
    let company = $(e.relatedTarget).data('employment-company');
    let position = $(e.relatedTarget).data('employment-position');
    let start_time = $(e.relatedTarget).data('employment-start-time');
    let end_time = $(e.relatedTarget).data('employment-end-time');
    let description = $(e.relatedTarget).data('employment-description');

    $('#employment_history_id').val(id);
    $('#candidate_history_position').val(position);
    $('#candidate_history_company').val(company);
    $('#date-picker-from').val(start_time);
    $('#date-picker-to').val(end_time);
    CKEDITOR.instances['article-ckeditor-description'].setData(description);

});

function submitEmploymentHistoryForm() {

    let id = $('#employment_history_id').val();
    let position = $('#candidate_history_position').val();
    let company = $('#candidate_history_company').val();
    let start_time = $('#date-picker-from').val();
    let end_time = $('#date-picker-to').val();
    let description = CKEDITOR.instances['article-ckeditor-description'].getData();


    if (position.trim() == '') {
        $('#candidate_history_position').focus();
        alert('Please input your position !!!');
        return false;
    } else if (company.trim() == '') {
        $('#candidate_history_company').focus();
        alert('Please input your company !!!');
        return false;
    } else if (id == "-1") {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'POST',
            url: '/user/employment_history',
            data: {
                id: id,
                position: position,
                company: company,
                start_time: start_time,
                end_time: end_time,
                description: description
            },
            success: function (data) {
                console.log(data);
                alert('Created Employment History Successful !!!');
                location.reload();
            },
            error: function (data) {
                console.log(data);
                alert('Created Employment History Fail !!!');
            }
        });

    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'PUT',
            url: '/user/employment_history',
            data: {
                id: id,
                position: position,
                company: company,
                start_time: start_time,
                end_time: end_time,
                description: description
            },
            success: function (data) {
                console.log(data);
                alert('Updated Employment History Successful !!!');
                location.reload();
            },
            error: function (data) {
                console.log(data);
                alert('Updated Employment History Fail !!!');
            }
        });


    }
}

/* Employment History End */

$(function () {
    $('#modalFormEducationHistory').on('show.bs.modal', function (e) {
        let id = $(e.relatedTarget).data('education-id');
        let major = $(e.relatedTarget).data('education-major');
        let school = $(e.relatedTarget).data('education-school');
        let degree = $(e.relatedTarget).data('education-degree');
        let start_time = $(e.relatedTarget).data('education-start-time');
        let end_time = $(e.relatedTarget).data('education-end-time');
        let achievements = $(e.relatedTarget).data('education-achievements');

        $('#education_id').val(id);
        $('#education_major').val(major);
        $('#education_school').val(school);
        $('#date_education_start').val(start_time);
        $('#date_education_end').val(end_time);
        $('#select_degree').selectpicker('val', degree);
        CKEDITOR.instances['article-ckeditor-achievements'].setData(achievements);

    });
});

/* Education History */

function submitEducationHistoryForm() {
    let id = $('#education_id').val();
    let major = $('#education_major').val();
    let school = $('#education_school').val();
    let start_time = $('#date_education_start').val();
    let end_time = $('#date_education_end').val();
    let degree = $('#select_degree').selectpicker('val');
    let achievements = CKEDITOR.instances['article-ckeditor-achievements'].getData().toString();
    let words_length = achievements.split(' ').length;


    if (major.trim() == '') {
        $('#education_major').focus();
        alert('Please input your subject');
        return false;
    } else if (school == '') {
        $('#education_school').focus();
        alert('Please input your school');
        return false;
    } else if (degree == '-1') {
        $('#select_degree').focus();
        alert('Please select your qualification');
        return false;
    } else if (words_length >= 200) {
        alert('Maximum word length is 200 words');
        CKEDITOR.instances['article-ckeditor-achievements'].focus();
        return false;
    } else if (id == '-1') {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'POST',
            url: '/user/education_history',
            data: {
                id: id,
                major: major,
                school: school,
                start_time: start_time,
                end_time: end_time,
                degree: degree,
                achievements: achievements
            },
            success: function (data) {
                console.log(data);
                alert('Created Education History Successful !!!');
                location.reload();
            },
            error: function (data) {
                console.log(data);
                alert('Created Education History Fail !!!');
            }
        });

    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'PUT',
            url: '/user/education_history',
            data: {
                id: id,
                major: major,
                school: school,
                start_time: start_time,
                end_time: end_time,
                degree: degree,
                achievements: achievements
            },
            success: function (data) {
                console.log(data);
                alert('Updated Education History Successful !!!');
                location.reload();
            },
            error: function (data) {
                console.log(data);
                alert('Updated Education History Fail !!!');
            }
        });
    }

}

/* Education History End */

/* Load Benefits View */
$(function () {

    let expected_benefits_results = $('#expected_benefits_results').val().split(",");

    $.each(expected_benefits_results, function (i) {
        $('#' + expected_benefits_results[i] + "_View").attr("checked", true);
    });
});
/* Load Benefits View End */


/* Working Preferences */

// LOAD DATA

$(function () {
    // let expected_benefits_results = $('#expected_benefits_results').val().split(",");
    // let expected_location_work = $
    // alert($("#select_working_location").select2("val"));
    $('#modalFormWorkingPreferences').on('show.bs.modal', function (e) {
        let location_work = new Array($(e.relatedTarget).data('working-location').split(","));
        let expected_job_category = new Array($(e.relatedTarget).data('expected-job-category').split(","));
        let expected_job_level = $(e.relatedTarget).data('expected-job-level');
        let expected_salary = $(e.relatedTarget).data('expected-salary');
        let expected_benefits = $(e.relatedTarget).data('expected-benefits').split(",");


        $("#select_working_location").select2("val", location_work);
        $("#select_expected_job_category").select2("val", expected_job_category);

        $.each(expected_benefits, function (i) {
            $('#' + expected_benefits[i]).attr("checked", true);
        });
    });
});

// SUBMIT FORM
function submitWorkingPreferencesForm() {

    //alert($("#select_expected_job_category").select2("val"));

    let Awards = $('input[id=Awards]').is(':checked') ? "Awards" : false;
    let Bonus = $('input[id=Bonus]').is(':checked') ? "Bonus" : false;
    let Canteen = $('input[id=Canteen]').is(':checked') ? "Canteen" : false;
    let Health_Care = $('input[id=Health_Care]').is(':checked') ? "Health_Care" : false;
    let Kindergarten = $('input[id=Kindergarten]').is(':checked') ? "Kindergarten" : false;
    let Laptop = $('input[id=Laptop]').is(':checked') ? "Laptop" : false;
    let Library = $('input[id=Library]').is(':checked') ? "Library" : false;
    let Mobile = $('input[id=Mobile]').is(':checked') ? "Mobile" : false;
    let Paid_Leave = $('input[id=Paid_Leave]').is(':checked') ? "Paid_Leave" : false;
    let Team_Activity = $('input[id=Team_Activity]').is(':checked') ? "Team_Activity" : false;
    let Training = $('input[id=Training]').is(':checked') ? "Training" : false;
    let Transportation = $('input[id=Transportation]').is(':checked') ? "Transportation" : false;
    let Travel_Opportunities = $('input[id=Travel_Opportunities]').is(':checked') ? "Travel_Opportunities" : false;
    let Vouchers = $('input[id=Vouchers]').is(':checked') ? "Vouchers" : false;

    let benefit_selected = Awards + "," + Bonus + "," + Canteen + "," + Health_Care + "," + Kindergarten + "," + Laptop + "," + Library + "," + Mobile + "," + Paid_Leave + "," + Team_Activity + "," + Training + "," + Transportation + "," + Travel_Opportunities + "," + Vouchers;

    let val_to_replace = ',false';
    let replace_with = '';

    benefit_selected = benefit_selected.split(val_to_replace).join(replace_with);
    benefit_selected = benefit_selected.split('false,').join(replace_with); // return results

    let working_location = $('#select_working_location').select2("val").toString();
    let expected_job_category = $('#select_expected_job_category').select2('val').toString();
    let expected_job_level = $('#select_expected_job_level').val();
    let expected_salary = $('#expected_salary').val();

    if (working_location.trim() == '') {
        alert('Please choose working location');
        $('#select_working_location').focus();
        return false;
    } else if (expected_job_category.trim() == '') {
        alert('Please choose job category');
        $('#select_expected_job_category').focus();
        return false;
    } else if (expected_job_level == '-1') {
        alert('Please choose job level');
        $('#select_expected_job_level').focus();
        return false;
    } else if (expected_salary.trim() == '') {
        alert('Please enter expected salary');
        $('#expected_salary').focus();
        return false;
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'PUT',
            url: '/user/working_preferences',
            data: {
                working_location: working_location,
                expected_job_category: expected_job_category,
                expected_job_level: expected_job_level,
                expected_salary: expected_salary,
                benefit_selected: benefit_selected,
            },
            success: function () {

                /*                      *
                * Update Value For View *
                *                       *
                *                       */

                $('#working_location_view').html(working_location);
                $('#expect_job_category_view').html(expected_job_category);
                $('#expect_job_level_view').html(expected_job_level);
                $('#expect_job_salary_view').html(expected_salary);

                let benefits = "Awards,Bonus,Canteen,Health_Care,Kindergarten,Laptop,Library,Mobile,Paid_Leave,Team_Activity,Training,Transportation,Travel_Opportunities,Vouchers".split(',');
                $.each(benefits, function (i) {
                    $('#' + benefits[i] + "_View").attr("checked", false); // Uncheck benefit on view
                });

                benefit_selected = benefit_selected.split(',');
                $.each(benefit_selected, function (i) {
                    $('#' + benefit_selected[i] + "_View").attr("checked", true);
                });

                alert("Updated working preferences successful");
                location.reload();
            },
            error: function () {
                console.log(data);
            }
        });
    }


}

/* Working Preferences End */


// $(document).ready(function () {
//     $.ajax({
//
//         type: 'GET',
//         url: '/get-database',
//
//         success: function (data) {
//             //json
//
//             //alert("GET AJAX: " + data.info[0].last_name);
//         },
//         error: function () {
//             console.log(data);
//         }
//     });
// });

// $.ajax({
//
//     type: 'GET',
//     url: '/user/languages',
//     success: function (data) {
//
//         /*                      *
//         * Update Value For View *
//         *                       *
//         *                       */
//
//         $.each(data.languages, function (index, item) {
//             console.log("TAM: " + item.id_candidate);
//         });
//     },
//     error: function () {
//         console.log(data);
//     }
// });
