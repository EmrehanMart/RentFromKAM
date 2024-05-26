<?php
    // Kullanıcı bilgilerini al
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        // Kullanıcıyı kaydet
		$stmt = $conn->prepare("INSERT INTO registration(username, email, password) VALUES(?, ?, ?)");
		$stmt->bind_param("sss", $username, $email, $password);
		$execval = $stmt->execute();
		
        // Kayıt başarılı mı kontrol et
        if($execval) {
            echo "Registration successfully...";
        } else {
            echo "Error: " . $conn->error;
        }

		$stmt->close();
		$conn->close();
	}
?>
