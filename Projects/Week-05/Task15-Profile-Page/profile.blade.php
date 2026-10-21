<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .profile-card {
            width: 100%;
            max-width: 700px;
            background-color: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .profile-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-title h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .profile-title p {
            color: #666;
            font-size: 15px;
        }

        .profile-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .info-item {
            padding: 16px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .info-item .label {
            display: block;
            font-size: 13px;
            color: #666;
            margin-bottom: 6px;
        }

        .info-item .value {
            font-size: 16px;
            font-weight: 600;
            color: #222;
        }

        @media (max-width: 600px) {

            .profile-card {
                padding: 25px;
            }

            .profile-info {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>

    <div class="profile-card">

        <div class="profile-title">

            <h1>Personal Profile</h1>

            <p>Personal Information</p>

        </div>

        <div class="profile-info">

            <div class="info-item">

                <span class="label">Full Name</span>

                <span class="value">{{ $name }}</span>

            </div>

            <div class="info-item">

                <span class="label">Age</span>

                <span class="value">{{ $age }}</span>

            </div>

            <div class="info-item">

                <span class="label">Gender</span>

                <span class="value">{{ $gender }}</span>

            </div>

            <div class="info-item">

                <span class="label">Date of Birth</span>

                <span class="value">{{ $dob }}</span>

            </div>

            <div class="info-item">

                <span class="label">Email Address</span>

                <span class="value">{{ $email }}</span>

            </div>

            <div class="info-item">

                <span class="label">Phone Number</span>

                <span class="value">{{ $phone }}</span>

            </div>

            <div class="info-item">

                <span class="label">Qualification</span>

                <span class="value">{{ $qualification }}</span>

            </div>

        </div>

    </div>

</body>

</html>