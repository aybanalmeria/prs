$(document).ready(function() {

    //Add New Patient
    $('#savePatientBtn').on('click', function(e) {
        e.preventDefault();
        let formData = $('#addPatientForm').serialize();
        let csrfName = $('meta[name="csrf_name"]').attr('content'); 
        let csrfHash = $('meta[name="csrf_hash"]').attr('content'); 
        formData += "&" + csrfName + "=" + csrfHash;

        $('.error-message').remove();
        $('.form-control').removeClass('is-invalid');

        $.ajax({
            url: baseUrl + "patient/add",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                console.log("Server Response:", response); 

                if (response.status === "error") {
                    if (response.errors) {
                        $.each(response.errors, function(field, message) {
                            let fieldElement = $('[name="' + field + '"]');
                            fieldElement.addClass('is-invalid');
                            fieldElement.after('<div class="error-message text-danger">' + message + '</div>');
                        });
                    } else {
                        alert("Validation failed, but no error messages were received.");
                    }
                } else if (response.status === "success") {
                    $('#addPatientForm')[0].reset();
                    $('#ANPModal').modal('hide');
					alert("Successully added a Patient");
                    location.reload();
                }
                $('meta[name="csrf_hash"]').attr("content", response.csrf_token);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText);
                alert("An error occurred: " + xhr.responseText);
            }
        });
    });

    //Fetch Patient Data for Editing
    $(document).on("click", ".editPatientBtn", function() {
        let patientId = $(this).data("id"); 

        let csrfName = $('meta[name="csrf_name"]').attr("content"); 
        let csrfHash = $('meta[name="csrf_hash"]').attr("content");  

        $.ajax({
            url: baseUrl + "patient/get_patient", 
            type: "POST",
            data: { id: patientId, [csrfName]: csrfHash }, 
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {

                    $("#editId").val(response.data.id);
                    $("#editLastName").val(response.data.last_name);
                    $("#editFirstName").val(response.data.first_name);
                    $("#editMiddleName").val(response.data.middle_name);
                    $("#editSuffix").val(response.data.suffix);
                    $("#editSex").val(response.data.sex);
                    $("#editBirthDate").val(response.data.birth_date);
					$("#editRegion").val(response.data.region);
					$("#editprovince").val(response.data.province);
					$("#editCity").val(response.data.city);
					$("#editBarangay").val(response.data.barangay);
					$("#editcontactNumber").val(response.data.contact_number);

                    $('meta[name="csrf_hash"]').attr("content", response.csrf_token);
                } else {
                    alert("Failed to fetch patient details!");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText);
                alert("An error occurred while fetching patient details.");
            }
        });
    });

    //Save Edited Patient Data
    $('#editPatientForm').on("submit", function(e) {
        e.preventDefault();
        let formData = $(this).serialize();
        let csrfName = $('meta[name="csrf_name"]').attr("content"); 
        let csrfHash = $('meta[name="csrf_hash"]').attr("content"); 
        formData += "&" + csrfName + "=" + csrfHash;

        $('.error-message').remove();
        $('.form-control').removeClass('is-invalid');

        $.ajax({
            url: baseUrl + "patient/update", 
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status === "error") {
                    $.each(response.errors, function(field, message) {
                        let fieldElement = $('[name="' + field + '"]');
                        fieldElement.addClass('is-invalid');
                        fieldElement.after('<div class="error-message text-danger">' + message + '</div>');
                    });
                } else if (response.status === "success") {
                    $('#editPatientForm')[0].reset();
                    $('#EPModal').modal('hide');
					alert("Successully Edited Patient Information");
                    location.reload();
                }
                $('meta[name="csrf_hash"]').attr("content", response.csrf_token);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText);
                alert("An error occurred while updating patient details.");
            }
        });
    });

    //Soft Delete Patient Data
	$(document).on("click", ".deletePatientBtn", function(e) {
		e.preventDefault();
		
		let patientId = $(this).data("id");
		let csrfName = $('meta[name="csrf_name"]').attr("content"); 
		let csrfHash = $('meta[name="csrf_hash"]').attr("content"); 
	
		if (confirm("Are you sure you want to delete this patient?")) {
			$.ajax({
				url: baseUrl + "patient/delete",
				type: "POST",
				data: { id: patientId, [csrfName]: csrfHash },
				dataType: "json",
				success: function(response) {
					if (response.status === "success") {
						alert(response.message);
						location.reload();
					} else {
						alert("Failed to Delete patient.");
					}
				},
				error: function(xhr) {
					console.error("AJAX Error:", xhr.responseText);
					alert("An error occurred.");
				}
			});
		}
	});
	
	// Fetch Patient Data for Viewing
	$(document).on("click", ".viewPatientBtn", function() {
		let patientId = $(this).data("id"); 
		console.log("Fetching data for Patient ID:", patientId);

		let csrfName = $('meta[name="csrf_name"]').attr("content"); 
		let csrfHash = $('meta[name="csrf_hash"]').attr("content");  

		$.ajax({
			url: baseUrl + "patient/get_patient", 
			type: "POST",
			data: { id: patientId, [csrfName]: csrfHash },
			dataType: "json",
			beforeSend: function(xhr) {
				xhr.setRequestHeader("X-CSRF-TOKEN", csrfHash); 
			},
			success: function(response) {
				if (response.status === "success") {
					console.log("Populating View Modal:", response.data);

					$("#viewFullName").text(
						(response.data.last_name || "") + ", " +
						(response.data.first_name || "") + " " +
						(response.data.middle_name ? response.data.middle_name.charAt(0) + "." : "") + " " +
						(response.data.suffix || "")
					);                    
					$("#viewPatientID").text("Patient ID: " + response.data.id);
					$("#viewSex").text(response.data.sex);
					$("#viewBirthDate").text(response.data.birth_date);
					function calculateAge(birthDate) {
						if (!birthDate || birthDate === "0000-00-00") return "N/A"; 

						let today = new Date();
						let birth = new Date(birthDate);
						if (isNaN(birth.getTime())) return "N/A";

						let age = today.getFullYear() - birth.getFullYear();
						let monthDiff = today.getMonth() - birth.getMonth();
						if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
							age--;
						}
						return age;
					}
					$("#viewAge").text(calculateAge(response.data.birth_date));
					$("#viewBloodType").text(response.data.blood_type || "AB+");
					$("#viewMedicalHistory").text(response.data.medical_history || "Hypertension");
					$("#viewRegion").text(response.data.region);
					$("#viewProvince").text(response.data.province);
					$("#viewCity").text(response.data.city);
					$("#viewBarangay").text(response.data.barangay);
					$("#viewContactNumber").text(response.data.contact_number);
					$("#viewEmail").text(response.data.email || "almeriadev@gmail.com");
					$("#viewEmergencyContact").text(response.data.emergency_contact || "09876543211");
					$("#VPModal").modal("hide").modal("show");
					$('meta[name="csrf_hash"]').attr("content", response.csrf_token);
				} else {
					alert("Failed to fetch patient details!");
				}
			},
			error: function(xhr) {
				console.error("AJAX Error:", xhr.responseText);
				alert("An error occurred while fetching patient details.");
			}
		});
	});


	
});
