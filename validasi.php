<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi</title>
</head>

<body>
    <?php
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $nama = $email = $gender = $comment = $website = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi";
        } else {
            $nama = test_input($_POST["nama"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email harus disi";
        } else {
            $email = test_input($_POST["email"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = "email tidak sesuai format";
            }
        }

        if (empty($_POST["website"])) {
            $websiteErr = "";
        } else {
            $website = test_input($_POST["website"]);
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender harus dipilih";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Posting Komentar</h2>
    <p><span class="error">*Harus Diisi.</span></p>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <table>
            <tr>
                <td>Nama : </td>
                <td>
                    <input type="text" class="nama" name="nama">
                    <span class="error"><?= $namaErr?></span>
                </td>
            </tr>
            <tr>
                <td>E-mail : </td>
                <td>
                    <input type="text" class="email" name="email">
                    <span class="error"><?= $emailErr?></span>
                </td>
            </tr>
            <tr>
                <td>Website : </td>
                <td>
                    <input type="text" class="website" name="website">
                    <span class="error"><?= $websiteErr?></span>
                </td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td>
                    <textarea name="comment" id="comment" cols="40" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="L">Laki-Laki
                    <input type="radio" name="gender" value="P">Perempuan
                    <span class="error"><?= $genderErr?></span>
                </td> 
            </tr>
            <td>
                <input type="submit" name="submit" value="submit"> 
            </td>
        </table>
    </form>

    <?php 

        echo "<h2>Data yang anda isi : </h2>";
        
        echo $nama. "<br>";
        echo $email. "<br>";
        echo $website. "<br>";
        echo $comment. "<br>";
        echo $gender. "<br>";
    ?>
</body>

</html>