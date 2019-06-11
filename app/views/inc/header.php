<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/materia/bootstrap.min.css" rel="stylesheet" integrity="sha384-SYbiks6VdZNAKT8DNoXQZwXAiuUo5/quw6nMKtFlGO/4WwxW86BSTMtgdzzB9JJl" crossorigin="anonymous">
   <link rel="shortcut icon" href="<?php echo URLROOT . '/images/favicon.png'; ?>" type="image/png">  
  <title><?php echo SITENAME; ?></title>
</head>
<body>
  <?php if (userAccountType() == 10) : ?>
    <?php require APPROOT . '/views/inc/navbar_admin.php'; ?>
  <?php else: ?>
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <?php endif;?>

  <!-- 

  -- Allow adding multiple students at a single time
  -- Unmarked assignment list is currently bugged
  -- Allow mass mark addtion
      -> Click an assignment, it list all students where you can input the marks.
  
  END GOAL: Needs to be more fluent / user friendly?

   -->


  
