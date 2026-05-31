<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card - <?= esc($member['full_name']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .id-card {
            width: 250px;
            height: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            overflow: hidden;
            position: relative;
            text-align: center;
            border: 2px solid #002366;
        }
        .header {
            background-color: #002366;
            color: #fff;
            padding: 10px;
            font-size: 14px;
            font-weight: bold;
        }
        .header img {
            width: 40px;
            margin-bottom: 5px;
        }
        .photo {
            margin: 15px auto;
            width: 100px;
            height: 100px;
            border: 3px solid #002366;
            border-radius: 50%;
            overflow: hidden;
        }
        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .details {
            padding: 0 15px;
            text-align: left;
            font-size: 12px;
        }
        .details h3 {
            margin: 5px 0;
            color: #d32f2f;
            text-align: center;
            font-size: 16px;
        }
        .details p {
            margin: 4px 0;
            color: #333;
        }
        .details strong {
            color: #002366;
        }
        .footer {
            background-color: #d32f2f;
            color: #fff;
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 8px 0;
            font-size: 12px;
            font-weight: bold;
        }
        @media print {
            body {
                background-color: #fff;
                align-items: flex-start;
                padding-top: 20px;
            }
            .id-card {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

    <div class="id-card">
        <div class="header">
            DRLK Education Foundation<br>
            Identity Card
        </div>
        
        <div class="photo">
            <?php 
                $photoPath = !empty($member['photo']) ? FCPATH . $member['photo'] : '';
                if ($photoPath && file_exists($photoPath)): 
            ?>
                <img src="<?= base_url($member['photo']) ?>" alt="Photo">
            <?php else: ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ccc" width="100%" height="100%">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            <?php endif; ?>
        </div>

        <div class="details">
            <h3><?= esc($member['full_name']) ?></h3>
            <p><strong>Member ID:</strong> <?= esc($member['member_code']) ?></p>
            <p><strong>DOB:</strong> <?= date('d M Y', strtotime($member['dob'])) ?></p>
            <p><strong>Blood Group:</strong> <?= esc($member['blood_group']) ?></p>
            <p><strong>Mobile:</strong> <?= esc($member['mobile']) ?></p>
        </div>

        <div class="footer">
            www.drlkeducation.org
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
