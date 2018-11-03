/*REGISTER FORM*/

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

$(function () {

    $('#btnSignIn').on('click', function () {

        let register_email = $('#register_email').val();
        let register_password = $('#register_password').val();

        if (register_email == '') {
            $('#register_email').focus();
            alert("Please enter your email");
            return false;
        } else if (validateEmail(register_email) == false) {
            $('#register_email').focus();
            alert("Email is not valid");
            return false;

        } else if (register_password == '') {
            $('#register_password').focus();
            alert("Please enter your password");
            return false;
        } else {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/admin/login',
                data: {
                    email: register_email,
                    password: register_password
                },
                success: function (data) {

                    if(data === 'Login'){

                        alert("Login Successful !!!");
                        window.location.href = "../../admin/dashbroad/";
                    } else {
                        alert('Invalid Credentials !!!');
                    }

                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

    });
});
/*REGISTER FORM END*/