<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="bangkoklab.jpg" alt="โลโก้บริษัท" class="logo">
            <div class="company-names">
                <h1 class="company-name">บริษัท บางกอกแล็ป แอนด์ คอสเมติค จำกัด (มหาชน)</h1>
                <h1 class="company-name">BANGKOK LAB AND COSMETIC PUBLIC COMPANY LIMITED</h1>
            </div>
        </div>
    </header>
    <div class="content">
        <h2>ลงทะเบียนลุ้นรับโชค</h2>
        <div class="content-border">
            <p>ในปี 2567 บริษัทได้ดำเนินธุรกิจในครึ่งปีแรกได้ประสบความสำเร็จ เพื่อเป็นขวัญกำลังใจให้พนักงานทุกท่าน</p>
            <p>บริษัทจึงขอมอบรางวัลให้สำหรับพนักงาน 30 ท่านแรก ด้วยวิธีการจับฉลาก</p>
            <p>ซึ่งมีของรางวัลใหญ่ ได้แก่ โทรศัพท์ไอโฟน โทรทัศน์ ตู้เย็น ไมรโครเวฟ จักรยาน และรางวัลอื่นๆอีกมากมาย</p><br/>
            <form method='POST'>
                <div class="logo-container">
                    <img src='15.jpg'>
                    <div class="company-names">
                        <input class="form__input" id='EMPID' name='EMPID' type="text" size='3' maxlength='6' placeholder="รหัสพนักงาน" required="" /><br/>
                        <input class="form__input" id='Name' name='Name' type="text" placeholder="ชื่อพนักงาน" required="" /><br/>
                        <input class="form__input" id='Section' name='Section' type="text" placeholder="แผนก" required="" /><br/>
                        <input class="form__input" id='Position' name='Position' type="text" placeholder="ตำแหน่ง" required="" />
                        <input class="btn" id='bt' name='bt' type='submit' value='ลงทะเบียน' >
                    </div>  
                </div>  
            </form>      
        </div>
    </div>
    <center><font color="red">**ท่านต้องลงทะเบียนภายในระยะเวลา 7 วัน ไม่งั้นท่านจะขอสละสิทธิ์อันพิเศษนี้** </font><center> 
    <?php 
    $server="localhost";
    $username="root";
    $password="P@ssword";
    $db="itusage"; 
    $conn = new mysqli($server,$username,$password,$db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['bt'])) {
        $empid = $_POST['EMPID'];
        $Name = $_POST['Name'];
        $Section = $_POST['Section'];
        $Position = $_POST['Position'];

        $ip = $_SERVER['REMOTE_ADDR'];

        $stmt = $conn->prepare("INSERT INTO itusage (EMPID, IPAddress, Name, Position, Section) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $empid, $ip, $Name, $Position, $Section);

        if ($stmt->execute()) {
            echo "<script>window.location.href = 'e56c5fb3-fe21-37b6-7a2e.php';</script>"; 
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
    ?>
</body>
</html>
