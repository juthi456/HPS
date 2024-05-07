<!DOCTYPE html>
<html>
<head>
	<title>Doctor Information</title>
	

	<style>
  /* Style the heading */
  h1.zawrin {
      text-align: center;
      color: #333;
      font-size: 2em;
      margin-bottom: 20px;
    }

    /* Style the form container */
    .selectorx {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      max-width: 500px; /* Adjust for responsiveness */
      margin: 0 auto;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    /* Style the select label */
    .selectory label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    /* Style the select box */
    .select-box {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 16px;
      width: 100%; /* Ensure full width within container */
      cursor: pointer;
      transition: all 0.2s ease-in-out;
    }

    /* Apply hover effect to select box */
    .select-box:hover {
      border-color: #999;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    /* Style the submit button */
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      transition: all 0.2s ease-in-out;
    }

    /* Apply hover effect to submit button */
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }

    /* Additional animations (can be customized) */
    .selectory {
      animation: enter-form 0.5s ease-in-out forwards;
    }

    @keyframes enter-form {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    input[type="submit"] {
      animation: button-bounce 0.7s ease-in-out infinite alternate;
    }

    @keyframes button-bounce {
      from { transform: translateY(0); }
      to { transform: translateY(3px); }
    }

		/* CSS for the image */
		.Doctor-image {
			
			width: 1000px;
			height: 500px;
			
			padding : 50px;
			box-shadow: 5px 5px 10px grey;
			border-radius: 10px;
			transition: all 0.5s;
			position: relative;
			display: block;
  margin: 0 auto;
		}

		.Doctor-image:hover {
			transform: scale(1.1);
			z-index: 1;
			box-shadow: 10px 10px 20px grey;
		}

		.Doctor-image img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			border-radius: 10px;
			position: absolute;
			top: 0;
			left: 0;
		}

		.Doctor-info {
			display: flex;
			flex-wrap: wrap;
		}

		.Doctor-info p {
			margin: 20px;
			padding: 10px;
			background-color: #F0F0F0;
			box-shadow: 5px 5px 10px grey;
			border-radius: 10px;
		}
		
	</style>
</head>
<body>
	
	<h1 class="zawrin">Doctor Information</h1>
	<form class ="selectorx" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="selectory">
			<label for="Doctor-select">Select a Doctor:</label>
			<select id="Doctor-select" name="Doctor" class="select-box">
    <option value="Cardiology">Cardiology</option>
    <option value="Surgery">Surgery</option>
    <option value="Dermatology">Dermatology</option>
    <option value="Neurology">Neurology</option>
    <option value="Pediatrics">Pediatrics</option>
    <option value="Orthopedics">Orthopedics</option>
    <option value="Oncology">Oncology</option>
    <option value="Gynecology">Gynecology</option>
    <option value="Ophthalmology">Ophthalmology</option>
    <option value="Psychiatry">Psychiatry</option>
</select>

			<br><br>
		</div>

		<input type="submit" name="submit" value="Submit">
		<br>


		<br>
	</form>

	<?php
	// Check if the form has been submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Doctor = $_POST["Doctor"];
		$filename = "./Doctor/" .$Doctor.".txt";
		$image_filename = "./Doctor/" .$Doctor.".jpg"; // or .jpeg or .png

		// Check if the file exists
		if (file_exists($filename)) {
			// Read the contents of the file and display it
			$info = file_get_contents($filename);
			echo "<div class='Doctor-info'>";
			echo "<div class='Doctor-image'><img src='$image_filename'></div>";
			echo "<p>$info</p>";
			echo "</div>";
		} else {
			
				echo "<p>Sorry, information about $Doctor is not available.</p>";
			}
		}
	?>
	
</body>
</html>
