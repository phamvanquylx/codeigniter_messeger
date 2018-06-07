document.addEventListener("DOMContentLoaded", function(){
	
	if(document.querySelector(".add-friends"))
	{
		var add_friends = document.querySelectorAll(".add-friends");
		for( var i = 0; i < add_friends.length; i++ )
		{
			add_friends[i].addEventListener('click', function(){
				var id_friend 		= this.getAttribute('data-user');
				/* Add Friend List */
				$.ajax({
				  	type: "POST",
				  	url: "http://localhost/API/search/add",
					data: {
						add_id : id_friend
					},
				  	success: function(){
				  		location.reload();
				  	},
					error : function()
					{
						alert('Đã có lỗi xảy ra, hãy thử lại.');
					}				  	
				});			
			});
		}
	}

	if(document.querySelector(".edit-friends"))
	{
		var add_friends = document.querySelectorAll(".edit-friends");
		for( var i = 0; i < add_friends.length; i++ )
		{
			add_friends[i].addEventListener('click', function(){
				var id_friend 		= this.getAttribute('data-user');
				/* Edit Friend List */
				$.ajax({
				  	type: "POST",
				  	url: "http://localhost/API/search/edit",
					data: {
						add_id : id_friend
					},
				  	success: function(){
				  		location.reload();
				  	},
					error : function()
					{
						alert('Đã có lỗi xảy ra, hãy thử lại.');
					}				  	
				});				
			});
		}
	}

	if(document.querySelector('.btn-send__content'))
	{
		var id_send_content = document.querySelector('.btn-send__content').getAttribute('data-id-send');
		var btn_send_messenger = document.querySelector('.btn-send__messenger');
		btn_send_messenger.addEventListener('click', function(){
			var btn_send_content = document.querySelector('.btn-send__content').value;
			if(btn_send_content != '')
			{
				/* Add Messenger */
				$.ajax({
				  	type: "POST",
				  	url: "http://localhost/API/messenger/add",
					data: {
						id_set  : id_send_content,
						content : btn_send_content
					},
				  	success: function(){
				  		location.reload();
				  	},
					error : function()
					{
						alert('Đã có lỗi xảy ra, hãy thử lại.');
					}				  	
				});	
			}
		});
	}

}, false);
