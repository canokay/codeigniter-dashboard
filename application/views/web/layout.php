
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <?php
      if (isset($title)) {
      echo "<title> $title </title>";
      }
      else{
      echo "<title> - Web Sitesi</title>";
      }
    ?>


    <?php $this->load->view("$project/components/style")   ?>

    <?php if (isset($style_include)) { ?>
			<!-- Page Style -->
			<?php $this->load->view("$project/$category/$view/style");?>
    <?php }?>
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    <?php $this->load->view("$project/components/header")   ?>

    <?php $this->load->view("$project/$category/$view")   ?>

    <?php $this->load->view("$project/components/footer")   ?>

    <?php $this->load->view("$project/components/script")   ?>

  <?php if (isset($script_include)) { ?>
    <!-- Page JS -->
    <?php $this->load->view("$project/$category/$view/script"); ?>
  <?php }?>

</div>
</body>
</html>
