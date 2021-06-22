<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Zadanie rekrutacyjne</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <h1 class="mt-4">Zadanie rekrutacyjne Green Cell</h1>
				   <?php
					$tab['consonants'] = ['b','c','d','f','g','j','k','l','m','n','p','r','q','r','s','t','v','x','w','z','B','C','D','F','G','J','K','L','M','N','P','R','Q','R','S','T','V','X','W','Z'];
					$tab['vowels'] = ['a','e','i','o','u','A','E','I','O','U'];
					$tab['alphabet'] = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];


					if(isset($_POST['submit']))
					{
						if(is_numeric($_POST['number_of_strings']) && $_POST['number_of_strings'] >= 1 && is_numeric($_POST['min']) && is_numeric($_POST['max']))
						{
							if($_POST['min']<=$_POST['max'])
							{
								if($_POST['number_of_strings'] >=2)
								{
									for($i = 0;$i<= $_POST['number_of_strings']-1;$i++)
									{
										$rand = rand($_POST['min'],$_POST['max']);
										
										if($_POST['min'] == $_POST['max'] && $_POST['max'] == 2 || $rand == 2)
											echo $tab['consonants'][rand(0,count($tab['consonants'])-1)].$tab['vowels'][rand(0,count($tab['vowels'])-1)]."<br>";
										else
										{
											for($j = 0;$j<=$rand -3;$j++)
												$temp[] = $tab['alphabet'][rand(0,count($tab['alphabet'])-1)];
										
											echo $tab['consonants'][rand(0,count($tab['consonants'])-1)].$tab['vowels'][rand(0,count($tab['vowels'])-1)].implode($temp)."<br>";
											unset($temp);
										}
										
										unset($rand);
									}
								}
								else
								{
									$rand = rand($_POST['min'],$_POST['max']);
								
									if($_POST['min'] == $_POST['max'] && $_POST['max'] == 2 || $rand == 2)
										echo $tab['consonants'][rand(0,count($tab['consonants'])-1)].$tab['vowels'][rand(0,count($tab['vowels'])-1)]."<br>";
									else
									{
										for($i = 0;$i<=$rand-3;$i++)
										{
											$temp[] = $tab['alphabet'][rand(0,count($tab['alphabet'])-1)];
										}
											
										echo $tab['consonants'][rand(0,count($tab['consonants'])-1)].$tab['vowels'][rand(0,count($tab['vowels'])-1)].implode($temp)."<br>";
									}
								}
							}
							else
								echo "<h1 class='mt-2' style='color:red;'>Maximum nie może być mniejsze niż minimum</h1>";
						}
						else
							echo "<h1 class='mt-2' style='color:red;'>Ilość ciągów nie może byc mniejsza niż 1. Pamiętaj aby podawać tylko cyfry w formularzu.</h1>";
							
					
						$handler = fopen('logs/log.tmp','a');
						fputs($handler,"=========================\n "."Data wykonania skryptu: ".date("d-m-Y H:i:s")."\n Ilość wygenerowanych słów: ".$_POST['number_of_strings']."\n Minimalna i maksymalna ilość znaków ".$_POST['min']."-".$_POST['max']."\n=========================");
						fclose($handler);
					}
					else
						echo "
						<form action='' method='POST'>
							<div class='form-group'>
								<label>Podaj ilość ciągów</label>
								<input type='number' class='form-control' min='1' name='number_of_strings' placeholder='Podaj ilość ciągów' required>
							</div>
							<div class='form-group'>
								<label>Podaj minimalna i maksymalna ilosc znakow</label><br>
								od <input type='number' class='form-control' min='2' name='min' placeholder='minimalna ilosc znakow' required> 
								do <input type='number' class='form-control' min='2' name='max' placeholder='maksymalna ilosc znakow' required>
							</div>
							<button type='submit' class='btn btn-primary' name='submit'>Wygeneruj</button>
						</form>";
					?>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
