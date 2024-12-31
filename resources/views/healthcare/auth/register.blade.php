<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook-like Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .register-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-facebook {
            background-color: #1877f2;
            color: white;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <h2 class="register-header">إنشاء حساب جديد</h2>
        <form>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="الاسم الأول" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="اسم العائلة" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="البريد الإلكتروني" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="كلمة المرور" required>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">تاريخ الميلاد</label>
                <input type="date" id="birthday" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">الجنس</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                        <label class="form-check-label" for="male">ذكر</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">أنثى</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">التسجيل</button>
            <p class="text-center mt-3">بالتسجيل، أنت توافق على <a href="#">الشروط والأحكام</a>.</p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>