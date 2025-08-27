<?php
// public/addProgram.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>AddProgram</title>

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


   <style>

         h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        input[type="text"], 
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        input[type="text"]:focus, 
        textarea:focus {
            border-color: #3498db;
            outline: none;
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .image-upload {
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 30px;
            text-align: center;
            margin-bottom: 25px;
            transition: border 0.3s;
        }
        
        .image-upload:hover {
            border-color: #3498db;
        }
        
        .image-upload a {
            color: #3498db;
            text-decoration: none;
            font-weight: 600;
        }
        
        .btn1 {
            display: block;
            width: 100%;
            padding: 14px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn1:hover {
            background-color: #2980b9;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: none;
        }
 </style>

</head>
<body class="with-ems-layout">
  <?php include("../../includes/header.php"); ?>
  <?php include("../../includes/sidebar.php"); ?>

  <main class="ems-main">
    <div class="container-fluid">      
      </head>
         <body>
           <div class="container">
             <h1>Add Program</h1>
        
           <div class="success-message" id="successMessage">
              Event added successfully!
           </div>
        
         <form id="eventForm" method="POST" enctype="multipart/form-data">
             <div class="form-group">
                <label>Import a picture for your event that represents event perfectly</label>
                <div class="image-upload">
                    <input type="file" id="eventImage" name="eventImage" accept="image/*" style="display: none;">
                    <a href="#" onclick="document.getElementById('eventImage').click(); return false;">Import</a>
                </div>
            </div>
            
            <div class="form-group">
                <label for="eventName">Event name</label>
                <input type="text" id="eventName" name="eventName" placeholder="Name" required>
            </div>
            
            <div class="form-group">
                <label for="room">Room</label>
                <input type="text" id="room" name="room" placeholder="Room no" required>
            </div>
            
            <div class="form-group">
                <label for="eventDetails">Event Details</label>
                <textarea id="eventDetails" name="eventDetails" placeholder="Details of the Event" required></textarea>
            </div>
            
            <button type="submit" class="btn1">Add</button>
        </form>
    </div>

    <script>
        document.getElementById('eventForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real application, you would send the form data to the server here
            // For demonstration, we'll just show the success message
            document.getElementById('successMessage').style.display = 'block';
            
            // Scroll to the success message
            document.getElementById('successMessage').scrollIntoView({ behavior: 'smooth' });
            
            // Reset the form after 2 seconds
            setTimeout(function() {
                document.getElementById('eventForm').reset();
                document.getElementById('successMessage').style.display = 'none';
            }, 3000);
        });
    </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
