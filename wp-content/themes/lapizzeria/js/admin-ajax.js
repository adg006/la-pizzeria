$ = jQuery.noConflict();

$(document).ready(function(){
	$('.remove_reservation').click(function(e){
		e.preventDefault();
		var id = $(this).attr('data-reservation');

		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'post',
					url: admin_ajax.ajaxurl,
					data: {
						'action': 'lapizzeria_delete_reservation',
						'id': id,
						'type': 'delete'
					},
					success: function(data){
						var result = JSON.parse(data);
						if(result.response == 'success'){
							$("[data-reservation='" + result.id + "']").parent().parent().remove();
							Swal.fire(
							  'Reservation Deleted!',
							  'Success, the reservation was deleted!',
							  'success'
							)
						}
					}
				})
			}
		})
	});
});