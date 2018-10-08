<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
    
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>  
    <script type="text/javascript" src="js/bootstrap3.min.js"></script>
    <script src="js/jquery.bootstrap.wizard.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <link href="css/bootstrap3.min.css" rel="stylesheet" id="bootstrap-css">
    

           
<div class="container">
    

      <div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
	<ul>
	  	<li><a href="#tab1" data-toggle="tab">Deputado</a></li>
		<li><a href="#tab2" data-toggle="tab">1º Senador</a></li>
		<li><a href="#tab3" data-toggle="tab">2º Senador </a></li>
		<li><a href="#tab4" data-toggle="tab">Governador</a></li>
		<li><a href="#tab5" data-toggle="tab">Presidente</a></li>
	</ul>
	 </div>
	  </div>
	</div>
	<div class="tab-content">
	    <div class="tab-pane" id="tab1">
	      1
	    </div>
	    <div class="tab-pane" id="tab2">
	      2
	    </div>
		<div class="tab-pane" id="tab3">
			3
	    </div>
		<div class="tab-pane" id="tab4">
			4
	    </div>
		<div class="tab-pane" id="tab5">
			5
	    </div>
		<ul class="pager wizard">
              <li class="next"><a href="#">Next</a></li>
              <li class="finish"><a href="javascript:;">Finish</a></li>
		</ul>
	</div>
</div>
</div>  
            <script>
             $(document).ready(function() {
  	        $('#rootwizard').bootstrapWizard({onTabClick: function(tab, navigation, index) {
		    
		    return false;
    }});
    $('#rootwizard .finish').click(function() {
		alert('Finished!, Starting over!');
		$('#rootwizard').find("a[href*='tab1']").trigger('click');
	});
});
            </script>
    
    
</body>
</html>