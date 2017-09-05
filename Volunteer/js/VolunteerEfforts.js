var globalLocalDateTime = new Date();
$(document).ready(function(){
	
	//$('#registrationDiv').modal('hide');
	//var loginData;
	
	console.log(globalLocalDateTime);
	
});

	function createMember()
	{
		var memberName = $("#memberName").val();
		var userName = $('#MemberUN').val();
		var pass = $('#MemberPass').val();

		var newMember = new submitMember(memberName,userName,pass);
		console.log(newMember);
		//$("#popupLoginMember").hide();
	}
	function submitMember(Name,Username,Password)
	{
		this.Name = Name;
		this.UserName = Username;
		this.Password = Password;
	}
	
	function openInstituteForm()
	{
		$('#formRegisterInstitute').popup("open");
		//$('#popupInstituteMenu').hide();
	}
	
	function loginInstitute()
	{
		var UN = $('#instituteUN').val();
		var Pass = $('#institutePass').val();
		var phpMethod = 2; //1=instituteRegister,2=IntitututeSignIn,3=memberRegister,4=memberSignIn
		
		if(UN && Pass !== "")
		{
			$.get(
				'Volunteer/php/registerInstitute.php',
				{method:phpMethod,'loginInstitute':UN,'password':Pass},
				function(loginData)
				{
					console.log(loginData);	
				});
		}
	}
	
	function registerInstitute()
	{
		var instituteName = $('#InstitutionName').val();
		var instituteUN = $('#InstitutionUN').val();
		var institutePass = $('#InstitutionPass').val();
		var instituteAddr = $('#Address').val();
		var instituteAff = $('#OrganAff').val();
		var dateTime = globalLocalDateTime;
		checkUser(instituteName,instituteUN,instituteAddr,instituteAff,institutePass,dateTime);
	}
	
	function checkUser(name,username,address,instituteAff,Pass,dateTime)
	{
		var phpMethod = 1;
		$.post('Volunteer/php/registerInstitute.php',
					{phpMethod:phpMethod,
					 instituteName: name,
					 instituteUN: username,
					 institutePass : Pass,
					 instituteAddr: address,
					 instituteAff : instituteAff,
					 dateTime : dateTime},
					function(data)
					{
						/*for(var i=0;i<=data[0].length;i++)
						{
							if(data[0]['Institution'] == name && data[0]['Username'] == username && data[0]['address'] == address)
								console.log('User Already Exists');
						}*/
						if(data[0].length >= 1)
							alert('User Already Exists');
						else 
							alert('Thank you for registering '+ name);
					}
				);
	}