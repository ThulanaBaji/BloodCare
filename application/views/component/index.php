<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compononet | Playground</title>
    
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.7.0.js' ?>"></script>
</head>
<body class="border border-red-950 border-2 p-3 h-screen w-full bg-gray-100">
    <?php $this->load->view($component); ?>
</body>
</html>