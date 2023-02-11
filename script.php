<script type="text/javascript" src="jquery\jquery.js"></script>
<script type="text/javascript">

			// Read data process
	$(document).ready(function(){
		load_data();
		function load_data(){
			$.ajax({
				url: "fetch.php",
				method: "POST",
				success : function(data){
					$('#user_data').html(data);
				}
			})
		}

		$('#user_dialog').dialog({
			autoOpen : false,
			width : 600,
			resizable: false
		})
		$('#action_alert').dialog({
			autoOpen:false,
			width: 400,
			resizable: false
		})
				// Insert data process
		$('#add').click(function(){
			$('#user_dialog').attr('title', 'Add Data');
			$('#action').val('insert');
			$('#form_action').val('Insert');
			$('#user_form')[0].reset();
			$('#form_action').attr('disabled', false);
			$('#user_dialog').dialog('open');
		})
		$('#user_form').on('submit', function(event){
			event.preventDefault();
			var error_first_name = '';
			var error_last_name = '';
			if ($('#first_name').val() == "") {
				error_first_name = "The first name is required ?";
				$('#error_first_name').text(error_first_name);
				$('#first_name').css('border-color', '#cc0000');
			}else{
				error_first_name = '';
				$('#error_first_name').text(error_first_name);
				$('#first_name').css('border-color', '');
			}
			if ($('#last_name').val() == "") {
				error_last_name = "The last name is required ?";
				$('#error_last_name').text(error_last_name);
				$('#last_name').css('border-color', '#cc0000');
			}else{
				error_last_name = '';
				$('#error_last_name').text(error_last_name);
				$('#last_name').css('border-color', '');
			}
			if (error_first_name != "" || error_last_name != "") {
				return false;
			}else{
				// $('#form_action').attr('disabled','disabled');
				var form_data = $(this).serialize();
				$.ajax({
					url: "action.php",
					method: "POST",
					data: form_data,
					success: function(result){
						$('#user_dialog').dialog('close');
						$('#action_alert').html(result);
						$('#action_alert').dialog('open');
						load_data();
						$('#form_action').attr('disabled', false);
					}
				})
			}
		})
				// Edit data process
		$(document).on('click', '.edit', function(){
			var edit_id = $(this).attr('id');
			var action = 'fetch_single';
			// alert(id);
			$.ajax({
				url : "action.php",
				method: "POST",
				data : {edit_id:edit_id, action:action},
				dataType: "json",
				success: function(data){
					$('#first_name').val(data.first_name);
					$('#last_name').val(data.last_name);
					$('#user_dialog').attr('title','Edit data');
					$('#action').val('update');
					$('#hidden_id').val(edit_id);
					$('#form_action').val('Update');
					$('#user_dialog').dialog('open');
				}
			})
		})

				// Delete data process
		$(document).on('click', '.delete', function(){
			var del_id = $(this).attr('id');
			$('#delete_confirmation').data('id', del_id).dialog('open');
		})

		$('#delete_confirmation').dialog({
			autoOpen: false,
			modal: true,
			width: 500,
			resizable: false,
			buttons: {
				Ok : function(){
					var del_id = $(this).data('id');
					var action = 'delete';
					$.ajax({
						url: "action.php",
						method: "POST",
						data: {del_id:del_id, action:action},
						success: function(data){
							$('#delete_confirmation').dialog('close');
							$('#action_alert').html(data);
							$('#action_alert').dialog('open');
							load_data();
						}
					})
				},
				Cancel : function(){
					$(this).dialog('close');
				}
			}
		})

				// View data process
		$(document).on('click', '.view', function(){
			var view_id = $(this).attr('id');
			// console.log(view_id);
			var action = 'read';
			$.ajax({
				url: "action.php",
				method : "POST",
				data: {view_id:view_id, action:action},
				// dataType: "json",
				success: function(data){
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
				}
			})
		})

	})
</script>
