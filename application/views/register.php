<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Task Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>  
<body>

  <div class="container-fluid bg-primary">
    <div class="container">
      <h1 class="text-center text-light py-4">Admin Register</h1>
    </div>
  </div>
  <div class="container my-5">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <form id="myform" action="<?php echo base_url();?>login/post_register" method="post">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" name="c_password" id="c_password" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Date of birth</label>
            <input type="date" class="form-control" name="birth_date" id="birth_date" required>
          </div>
          <button type="submit" id="register" class="btn btn-primary">Register</button>
          <br/>
          <a href="<?php echo base_url()?>/login" class="mt-2">already Have Account ?</a>
        </form>
      </div>
    </div>
    <?php 
    if($this->session->flashdata('error')){
      echo $this->session->flashdata('error'); 
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {

      $('#myform').validate({ 
        rules: {
          password:{
            required:true,
          },
          c_password:{
            equalTo :'#password'
          },
          'birth_date': {
     check_date_of_birth: true,
    require: true
  }
        },
        messages: { 
          password: 'password is required',
          c_password: 'confirm password is not same'
        }
      });

    });
    $.validator.addMethod("check_date_of_birth", function(value, element) {

var birthday = $("#birth_date").val();
var birthdaydate = Date.parse(birthday);
var difference = Date.now() - birthdaydate;
var ageYear = new Date(difference);
var age = Math.abs(ageYear.getUTCFullYear() - 1970);
return age > 18;
}, "You must be at least 18 years of age.");




// function validateAge(age) {
//     var input = age.value;
//     if(input>=18) {
//       $("#register").removeAttr("disabled");  
//     }
//     else {
//         alert("Invalid Age "+input);
//         $("#register").attr("disabled", true);
//     }
// }


  </script>
</body>
</html>
