<?php 
   // global $name, $email;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name =  htmlspecialchars($_POST['name']);
        if($name == false) {
            $alert_name = 'name';
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if($email == false) {
            $alert_email = 'email address';
        }
    }

        if($name != false && $email != false) {
            echo 'Thank you to '.$name.' enter your contacts.';
        }

        $alert_msg = "Please enter your valid";
        $thanks_msg = "Thanks for your interest.";
?>
<div class="msg">
    <p>
        Wanna be first to know on our product updates?
    </p>
</div>

<form action="" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" />
    </div>    
    <div class="form-group">
        <input type="submit" name="submit" id="submit" class="form-control" />
    </div>
</form>

<div class="alert">
    <p>
    <?php 
        if(isset($alert_name) OR isset($alert_email)){
            echo $alert_msg;
            if(isset($alert_name)){echo ' '.$alert_name;} 
            if(isset($alert_name) AND isset($alert_email)){echo ' and ';}
            if(isset($alert_email)){echo ' '.$alert_email;} 
        } 
    ?>
    </p>
</div>