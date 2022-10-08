jQuery(document).ready(function ($) {
	// use endpoint route to post to api on button click
	$("#custom-button").click(function () {
		$.ajax({
			url: "localhost/mysite/wp-json/custom/v1/signup",
			type: "POST",
			data: {
				name: $("#name").val(),
				email: $("#email").val(),
				password: $("#password").val(),
				password2: $("#password2").val(),
			},
			success: function (data) {
				console.log(data);
			},
		});
	});
	// use login endpoint to get data and compare to form data
	$("#custom-login").click(function () {
		$.ajax({
			url: "localhost/mysite/wp-json/custom/v1/login",
			type: "GET",
			data: {
				email: $("#email").val(),
				password: $("#password").val(),
			},
			success: function (data) {
				// if form data === api data, log success
				if (
					data.email === $("#email").val() &&
					data.password === $("#password").val()
				) {
					console.log("success");
				}
			},
		});
	});
});
