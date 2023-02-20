<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Task Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

  <div class="container-fluid bg-primary">
    <div class="container">
      <h1 class="text-center text-light py-4">Task list</h1>
    </div>
    
  </div>
  <div class="container my-5">
    <a href="<?php echo base_url()?>login/logout" class="btn btn-danger my-3">Logout</a>
    <div class="row">
      <div class="col-md-8 mx-auto">
          <a href="<?php echo base_url()?>task/add_task" class="btn btn-success my-3">Add Task</a>
          <?php 
    if($this->session->flashdata('inserted')){
      echo $this->session->flashdata('inserted'); 
    }
    ?>
       <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">sr.No</th>
      <th scope="col">Discription</th>
      <th scope="col">start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php 
       foreach($task_details as $value){
        ?> 
    <tr>
   

<th scope="row"><?php echo $value->id ?></th>
      <td><?php echo $value->description ?></td>
      <td><?php echo $value->start_date ?></td>
      <td><?php echo $value->end_date ?></td>
      <td><?php echo $value->task_status ?></td>
      <td><a href="<?php echo base_url()?>task/edit_task/<?php echo $value->id ?>" class="btn btn-info">Edit</a></td>


        
     
    </tr>
    <?php
    
       }

      ?>
  
  </tbody>
</table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
