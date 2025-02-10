<?php
   $paint_color = "red";

   $wall_width = 400; // cm
   $wall_height = 220; // cm

   // Step 1: Calculate wall surface area in square centimeters
   $wall_surface_in_square_cm = $wall_width * $wall_height; // cm²

   // Step 2: Convert wall surface area to square meters
   $wall_surface_in_square_m = $wall_surface_in_square_cm / 10000; // m²

   $paint_stock_in_liter = 13;
   $paint_in_liter_needed_per_square_m = 1.2;

   // Step 3: Calculate the amount of paint needed for the paint job
   // Round up to the nearest whole number Ex 5
   $paint_in_liter_needed_for_paint_job = ceil($wall_surface_in_square_m * $paint_in_liter_needed_per_square_m);

   // Step 4: Calculate remaining paint stock after the paint job
   $paint_stock_in_liter_after_paint_job = $paint_stock_in_liter - $paint_in_liter_needed_for_paint_job;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="description" content="Paint Job Results">
   <meta name="keywords" content="paint, job, results">
   <meta name="author" content="Kelly Crabbé">
   <title>Paint Job Results</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f4f4f4;
         margin: 0;
         padding: 0;
      }
      .container {
         width: 80%;
         margin: 50px auto;
         background: #fff;
         padding: 20px;
         box-shadow: 0 2px 5px rgba(0,0,0,0.3);
         border-radius: 5px;
      }
      h1 {
         text-align: center;
      }
      table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
      }
      th, td {
         padding: 10px;
         border: 1px solid #ddd;
         text-align: left;
      }
      th {
         background-color: #f2f2f2;
      }
   </style>
</head>
<body>
   <div class="container">
      <h1>Paint Job Results</h1>
      <p>The selected paint color is <strong><?php echo $paint_color; ?></strong>.</p>
      <table>
         <tr>
            <th>Description</th>
            <th>Value</th>
         </tr>
         <tr>
            <td>Wall Width</td>
            <td><?php echo $wall_width; ?> cm</td>
         </tr>
         <tr>
            <td>Wall Height</td>
            <td><?php echo $wall_height; ?> cm</td>
         </tr>
         <tr>
            <td>Wall Surface Area</td>
            <td><?php echo $wall_surface_in_square_m; ?> m²</td>
         </tr>
         <tr>
            <td>Paint Needed</td>
            <td><?php echo number_format($paint_in_liter_needed_for_paint_job, 2); ?> liters</td>
         </tr>
         <tr>
            <td>Remaining Paint Stock</td>
            <td><?php echo number_format($paint_stock_in_liter_after_paint_job, 2); ?> liters</td>
         </tr>
      </table>
   </div>
</body>
</html>