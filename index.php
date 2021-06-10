<!doctype html>
<html lang="sr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Password Generator</title>
		<meta name="description" content="This web application is generating passwords">
		<meta name="author" content="Ivan Zarkovic">
		<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
	<body>
    <br>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="wrapper"
                        <form>
                            <h2 class="h4">Odaberi dužinu reči</h2>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input wordlen" type="radio" name="wordlen" id="wordlen" value="1" checked>
                                <label class="form-check-label" for="wordlen">
                                Kratka reč (1-6 karatkera)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input wordlen" type="radio" name="wordlen" id="wordlen2" value="2" >
                                <label class="form-check-label" for="wordlen2">
                                Srednja reč (7-12 karatkera)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input wordlen" type="radio" name="wordlen" id="wordlen3" value="3" >
                                <label class="form-check-label" for="wordlen3">
                                Duga reč (preko 12 karatkera)
                                </label>
                            </div>
                            <hr>
                            <h2 class="h4">Odaberi broj reči</h2>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input wordnum" type="radio" name="wordnum" id="wordnum" value="1" checked>
                                <label class="form-check-label" for="wordlen">
                                Jedna reč
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input wordnum" type="radio" name="wordnum" id="wordnum2" value="2" >
                                <label class="form-check-label" for="wordlen2">
                                Više reči
                                </label>
                            </div>
                            <hr>
                            <h2 class="h4">Zameni samoglasnike brojevima</h2>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input changetonum" type="checkbox" name="changetonum" id="changetonum" value="1" checked>
                                <label class="form-check-label" for="wordlen">
                                Zameni (o - 0)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input changetonum" type="checkbox" name="changetonum" id="changetonum2" value="2">
                                <label class="form-check-label" for="wordlen">
                                Zameni (i - 1)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input changetonum" type="checkbox" name="changetonum" id="changetonum3" value="3">
                                <label class="form-check-label" for="wordlen">
                                Zameni (e - 3)
                                </label>
                            </div>
                            <hr>
                        </form>
					    <input class="form-control btn btn-primary" type="submit" value="Generiši lozinku" name="Generate" id="btn-generate">
                    </div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="wrapper h-100" style="min-height:240px;">
                        <h3 style="color: #999999;" class="h6">Generisana lozinka</h3>
					    <h3 style="color: #111111;" class="h5" id="password">-- GENERIŠI LOZINKU --</h3>
                    </div>
				</div>
			</div>
		</div>
        <script>
			$("#btn-generate").click(function () {

				var wordlen = $(".wordlen:checked").val();
				var wordnum = parseInt($(".wordnum:checked").val());
				var changetonum = '';
				var changetonum2 = '';
				var changetonum3 = '';
				if($('#changetonum').is(":checked")){
					changetonum = $("#changetonum:checked").val();
				} else {
					changetonum = 0;
				}
				if($('#changetonum2').is(":checked")){
					changetonum2 = $("#changetonum2:checked").val();
				} else {
					changetonum2 = 0;
				}
				if($('#changetonum3').is(":checked")){
					changetonum3 = $("#changetonum3:checked").val();
				} else {
					changetonum3 = 0;
				}

			   $.ajax({
				  url: "generatepass.php",
				  type: "POST",
				  dataType: "json",
				  data: {wordlen: wordlen, wordnum: wordnum, changetonum: changetonum, changetonum2: changetonum2, changetonum3: changetonum3},
				  success: function(data, textStatus, jqXHR) {
					  $("#password").text(data);
					  //console.log(data);
				  },
				  error: function (jqXHR, textStatus, errorThrown) {
					console.log(jqXHR);
					console.log(textStatus);
					console.log(errorThrown);
				  }
			  });
			 });
		</script>
    </body>
</html>