<?php
include_once ("config.php");
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Registration - Freeways-ISI 2015/2016</title>
		<link rel="stylesheet" href="resources/stylesheets/main.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400">

		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>


	</head>


  <body>
    <!-- Header -->

    <header class="primary-header container group">

	<h1 class="logo">
        	<a href="http://www.freeways.tn"><img src="resources/images/freeways-isi.png"></a>	
	</h1>

	<h3 class="tagline">Registration</h3>

    </header>

    <!-- Main content -->

    <section class="row">
      <div class="grid">

        <!-- Details -->

        <section class="col-2-3">

          <h4>Presentation</h4>

          <p>Founded in 2004, Freeways-ISI promotes Free software and Open hardware through competitions, training courses and workshops. In 2014 Freeways evolved from a club to an association carrying the same principles but in a bigger scale.</p>

          <h4>The four freedoms</h4>

          <ul class="why-attend">
            <li>The freedom to run the program as you wish, for any purpose.</li>
            <li>The freedom to study how the program works, and change it so it does your computing as you wish. Access to the source code is a precondition for this.</li>
            <li>The freedom to redistribute copies so you can help your neighbor.</li>
	    <li>The freedom to distribute copies of your modified versions to others. By doing this you can give the whole community a chance to benefit from your changes. Access to the source code is a precondition for this.</li>
          </ul>

        </section><!--

        Registration form

        --><form class="col-1-3" id="form">

          <fieldset class="register-group">

            <label>
              Name
		<r>*</r>
              <input type="text" name="name" placeholder="Full name" required>
            </label>

            <label>
              Email
		<r>*</r>
              <input type="email" name="email" placeholder="example@example.example" required>
            </label>

	   <label>
              Diploma
		<r>*</r>
		<datalist id="sources">
			<select name="source">
				<option value="Applied license">Applied license</option>
				<option value="Fondamental license">Fondamental license</option>
				<option value="Masters">Masters</option>
				<option value="Engineering">Engineering</option>
			</select>
		</datalist>
		<input type="text" id="source" name="diploma" list="sources" required>
            </label>

	  <label>
              Phone number
              <input type="text" name="phone">
            </label>

          </fieldset>
	  <div id="err"></div>
          <input class="btn btn-default" type="button" name="submit" value="Subscribe" id="ajout">

        </form>

      </div>
    </section>

    <!-- Footer -->

    <footer class="primary-footer container group">
	<p>
		<img src="resources/images/cc.20.png">&nbsp;Freeways Association
	</p>
    </footer>

	<script>
		// Insert new demande - AJAX
		 $("#ajout").click(function (){

				if(!$('#form')[0].checkValidity()){
					$('#err').html("<p> Check your input !<p>");
					setTimeout(function(){
						$('#err').html("");
    					},
					3000);
					return;
				}
						
				var name = $('.grid input[name="name"]').val();
				var email = $('.grid input[name="email"]').val();
				var diploma = $('.grid input[name="diploma"]').val();
				var phone = $('.grid input[name="phone"]').val(); 
				var btn = $(this);
				$.ajax({
					type: "POST",
					url: "inscri.php",
					data: {
						name: $('.grid input[name="name"]').val(),
						email: $('.grid input[name="email"]').val(),
						diploma: $('.grid input[name="diploma"]').val(),
						phone: $('.grid input[name="phone"]').val(),
					},
					success: function(msg){
						if (msg == 1) {
							$('#err').html("<p> Check your input !<p>");
						}
						else if (msg == 2){
							$('#err').html("<p> Done !<p>");
							$('#form')[0].reset();
						}
					}
				});	
   				btn.prop('disabled', true);
    				setTimeout(function(){
        				btn.prop('disabled', false);
					$('#err').html("");
    				},
				3000);
		});
	</script>
  </body>
</html>
