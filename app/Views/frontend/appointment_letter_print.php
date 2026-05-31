<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Letter - <?= esc($member['full_name']) ?></title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .letter-container {
            width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #002366;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            color: #002366;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #555;
        }
        .content {
            font-size: 16px;
            line-height: 1.6;
        }
        .date-ref {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .signature p {
            margin: 0;
            font-weight: bold;
        }
        .signature span {
            display: inline-block;
            border-top: 1px solid #000;
            width: 200px;
            margin-top: 40px;
            padding-top: 5px;
        }
        @media print {
            body {
                background-color: #fff;
                padding: 0;
            }
            .letter-container {
                width: 100%;
                box-shadow: none;
                padding: 0;
            }
        }
    </style>
</head>
<body>

    <div class="letter-container">
        <div class="header">
            <h1>DRLK Education Foundation</h1>
            <p>123 NGO Street, City, State, Country</p>
            <p>Email: info@drlkeducation.org | Phone: +1 234 567 8900</p>
        </div>

        <div class="date-ref">
            <div><strong>Ref No:</strong> DRLK/APPT/<?= esc($member['member_code']) ?></div>
            <div><strong>Date:</strong> <?= date('d M Y') ?></div>
        </div>

        <div class="content">
            <p>To,</p>
            <p><strong><?= esc($member['full_name']) ?></strong><br>
            <?= esc($member['address']) ?><br>
            <?= esc($member['city']) ?>, <?= esc($member['state']) ?> - <?= esc($member['pincode']) ?>
            </p>

            <p><strong>Subject: Letter of Appointment as Member</strong></p>

            <p>Dear <?= esc($member['full_name']) ?>,</p>

            <p>We are pleased to inform you that your application for membership has been accepted. Welcome to the DRLK Education Foundation family!</p>

            <p>Your membership details are as follows:</p>
            <ul>
                <li><strong>Membership ID:</strong> <?= esc($member['member_code']) ?></li>
                <li><strong>Date of Birth:</strong> <?= date('d M Y', strtotime($member['dob'])) ?></li>
                <li><strong>Approval Date:</strong> <?= (!empty($member['approved_at']) && $member['approved_at'] != '0000-00-00 00:00:00') ? date('d M Y', strtotime($member['approved_at'])) : date('d M Y') ?></li>
            </ul>

            <p>We believe that your contribution and participation will be valuable to our organization. As a member, you are expected to abide by the rules and regulations of the DRLK Education Foundation and work towards its goals and objectives.</p>

            <p>We look forward to a long and fruitful association with you.</p>

            <p>Sincerely,</p>

        </div>

        <div class="signature">
            <p>Authorized Signatory</p>
            <span>DRLK Education Foundation</span>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
