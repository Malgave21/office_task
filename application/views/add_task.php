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
      <h1 class="text-center text-light py-4">Add Task</h1>
    </div>
  </div>
  <div class="container my-5">
  <a href="<?php echo base_url()?>login/logout" class="btn btn-danger my-3">Logout</a>
    <div class="row">
      <div class="col-md-4 mx-auto">
      <a href="<?php echo base_url()?>task" class="btn btn-success my-3">Back</a>
       <div class="row">
      <div class="mx-auto">
        <form action="<?php echo base_url();?>task/post_add_task" method="post">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="u_name">
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
          </div>
            <div class="mb-3">
            <label class="form-label">Start date</label>
            <input type="date" class="form-control" name="start_date">
          </div>
          <div class="mb-3">
            <label class="form-label">End date</label>
            <input type="date" class="form-control" name="end_date">
          </div>
            <!-- <div class="mb-3">
            <label class="form-label">task Status</label>
            <select class="form-control" name="task_status"> 
              <option>pending</option>
              <option>Complate</option>
            </select>
          </div> -->
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
    <?php 
    if($this->session->flashdata('error')){
      echo $this->session->flashdata('error'); 
    }
    ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
