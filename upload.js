$(document).ready(function() { 

	 $('#app_form').submit(function() {
	 	
	 	progressbox     = $('#progressbox_app1');
		progressbar     = $('#progressbar_app1');
		statustxt       = $('#statustxt_app1');
		completed       = '0%';
	
			options = { 
				target:   '#output_app1',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				uploadProgress: OnProgress,
				success:       afterSuccess,  // post-submit callback 
				resetForm: true        // reset the form after successful submit 
			};
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
	
		
	 $('#snap0_form').submit(function() {
	 	
	 	progressbox     = $('#progressbox_snap0');
		progressbar     = $('#progressbar_snap0');
		statustxt       = $('#statustxt_snap0');
		completed       = '0%';
	
			options = {
				target:   '#output_snap0',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				uploadProgress: OnProgress,
				success:    afterSuccess,  // post-submit callback 
				resetForm: true        // reset the form after successful submit 
			};
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
		
		
		$('#snap1_form').submit(function() {
	 	
	 	progressbox     = $('#progressbox_snap1');
		progressbar     = $('#progressbar_snap1');
		statustxt       = $('#statustxt_snap1');
		completed       = '0%';
	
			options = { 
				target:   '#output_snap1',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				uploadProgress: OnProgress,
				success:       afterSuccess,  // post-submit callback 
				resetForm: true        // reset the form after successful submit 
			};
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
		
		$('#snap2_form').submit(function() {
	 	
	 	progressbox     = $('#progressbox_snap2');
		progressbar     = $('#progressbar_snap2');
		statustxt       = $('#statustxt_snap2');
		completed       = '0%';
	
			options = { 
				target:   '#output_snap2',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				uploadProgress: OnProgress,
				success:       afterSuccess,  // post-submit callback 
				resetForm: true        // reset the form after successful submit 
			};
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
		
		
		$('#snap3_form').submit(function() {
	 	
	 	progressbox     = $('#progressbox_snap3');
		progressbar     = $('#progressbar_snap3');
		statustxt       = $('#statustxt_snap3');
		completed       = '0%';
	
			options = { 
				target:   '#output_snap3',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				uploadProgress: OnProgress,
				success:       afterSuccess,  // post-submit callback 
				resetForm: true        // reset the form after successful submit 
			};
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
	
	
		
		$('#snap4_form').submit(function() {
	 	
	 	progressbox     = $('#progressbox_snap4');
		progressbar     = $('#progressbar_snap4');
		statustxt       = $('#statustxt_snap4');
		completed       = '0%';
	
			options = { 
				target:   '#output_snap4',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				uploadProgress: OnProgress,
				success:       afterSuccess,  // post-submit callback 
				resetForm: true        // reset the form after successful submit 
			};
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
		
		
	
	
//when upload progresses	


//function to format bites bit.ly/19yoIPO


}); 




function OnProgress(event, position, total, percentComplete)
{
	//Progress bar
	progressbar.width(percentComplete + '%') //update progressbar percent complete
	statustxt.html(percentComplete + '%'); //update status text
	if(percentComplete>50)
		{
			statustxt.css('color','#fff'); //change status text to white after 50%
		}
}

//after succesful upload
function afterSuccess()
{       
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	progressbox.hide();

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		
		
		//Progress bar
		progressbox.show(); //show progressbar
		progressbar.width(completed); //initial value 0% of progressbar
		statustxt.html(completed); //set status text
		statustxt.css('color','#000'); //initial color of status text

				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}