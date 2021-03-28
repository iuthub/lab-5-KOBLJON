<?php
$name = $section = $card = $fText = $formErr = false;

if(isset($_REQUEST['name']))
    $name = $_REQUEST['name'];
else
    $formErr = "Please fill the name form correctly 
    <a href='/webpage/buyagrade.html'>try again?</a>";

if(isset($_REQUEST['section']))
    $section = $_REQUEST['section'];
else
    $formErr = "Please fill the section form correctly 
    <a href='/webpage/buyagrade.html'>try again?</a>";

if(isset($_REQUEST['card']))
    $card = $_REQUEST['card'];
else
    $formErr = "Please fill the credit card form correctly 
    <a href='/webpage/buyagrade.html'>try again?</a>";

function save (){
    global $name, $section, $card, $fText;
    $data = $name.';'.$section.';'.$card."\n";
    $file = fopen("suckers.txt", "a+");
    fwrite($file, $data);
    $fText = file_get_contents('suckers.txt');
    fclose($file);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php
if($formErr == false){
    save();
    echo "
          <h1>Thanks, sucker!</h1>
            <p>Your information has been recorded.</p>
            <dl>
              <dt>Name</dt>
              <dd>".$name."</dd>

              <dt>Section</dt>
              <dd>".$section."</dd>

              <dt>Credit Card</dt>
              <dd>".$card."</dd>
            </dl>
          <pre>".$fText."</pre>";
}
else
    echo "<h1>Sorry</h1><p>".$formErr."</p>";
?>
</body>
</html>