
		$(".edit").bind("click", edit);
		//$(".add").bind("click", ad);
		$(".test").bind("click", test);
		
		function edit(){
		$(document).ready(function()
		{
			$(".edit").click(function()
			{
				var ID=$(this).attr('id');
				$("#id_"+ID).hide();
				$("#first_"+ID).hide();
				$("#mail_"+ID).hide();
				$(".edit"+ID).hide();
				$("#rubah_"+ID).show();
				$("#id1_"+ID).show();
				$("#first1_"+ID).show();
				$("#mail1_"+ID).show();
				//$("#delette_"+ID).text('Save');
				
				//document.getElementsByClassName(.edit).name = "newButtonName";
			//Change berfungsi untuk mengganti ... terjadi apabila ada data yang tergantikan 
			}).change(function()
			{
				var ID=$(this).attr('id');
				var first=$("#first1"+ID).val();
				var mail=$("#mail1"+ID).val();
				var dataString = 'id='+ ID +'&first='+first+'&mail='+mail;
				//$("#first_"+ID).html('<img src="load.gif" />'); // Loading image
				

				if(first.length>0&& mail.length>0)
				{
					//Mengirimkan data ke table_edit_ajax
					$.ajax({
						type: "POST",
						url: "save_table.php",
						data: dataString,
						cache: false,
						//Fungsi untuk mengganti first dan last pada halaman table edit php dengan yang baru. 
						success: function(html)
						{
							$("#first_"+ID).html(first);
							$("#last_"+ID).html(last);
						}
					});
				}
				else
				{
					alert('Enter something.');
				}

			});

			// Edit input box click action
			$(".editbox").mouseup(function() 
			{
				//$('#delette_'+ID).text('Delete');
				$(".edit"+ID).show();
				return false
			});

			// Outside click action
			$(document).mouseup(function()
			{
				$(".editbox").hide();
				$(".text").show();
				//$('#delette_'+ID).text('Delete');
				$(".edit"+ID).show();
				$("#save_"+ID).hide();
			});

		});
		}
		
		function del(){
			$(document).ready(function()
		{
			$(".delete").click(function()			
			{
				var ID=$(this).attr('id');
				var first=$("#first_"+ID).val();
				var last=$("#last_"+ID).val();
				var dataString = 'id='+ ID +'&firstname='+first+'&lastname='+last;
				$("#first_"+ID).html('<img src="load.gif" />'); // Loading image

					//Mengirimkan data ke table_edit_ajax
					$.ajax({
						type: "POST",
						url: "table_delete_ajax.php",
						data: dataString,
						cache: false,
						//Fungsi untuk mengganti first dan last pada halaman table edit php dengan yang baru. 
						success: function(html)
						{
							//location.reload(); 
							document.getElementById("tabel").deleteRow("ID");
						}
					});
				
			});
		});
		}
		
		function test(){
			$(document).ready(function()
		{
			$(".test").click(function()			
			{
				document.getElementById('test').style.visibility = 'hidden';
				
			});
		});
		}
		
