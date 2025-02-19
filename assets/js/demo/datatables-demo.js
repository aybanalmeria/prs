// Call the dataTables jQuery plugin
$(document).ready(function() {
	$('#dataTable').DataTable({
			"paging": true,        // Enables pagination
			"lengthChange": true,  // Enables "Show Entries"
			"searching": true,     // Enables search bar
			"ordering": true,      // Enables column sorting
			"info": true,          // Shows table info
			"autoWidth": false,    // Prevents auto column width adjustment
			"responsive": true,    // Makes table responsive
			"language": {
					"search": "Search:",  // Custom label for search
					"lengthMenu": "Show _MENU_ entries"
			},
			"dom": '<"row align-items-center"<"col-md-6 d-flex align-items-center"l><"col-md-6 d-flex justify-content-end"f>>' +
						 'rt' +
						 '<"row align-items-center mt-2"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>'
	});
});
