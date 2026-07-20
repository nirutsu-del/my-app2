<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เขียนบทความ</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6dd5fa, #8e44ad);
            padding: 40px 20px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: white;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: white;
            margin-bottom: 40px;
            font-size: 18px;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,.2);
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-8px);
        }

        .card-header {
            background: linear-gradient(45deg,#6a11cb,#2575fc);
            color: white;
            padding: 25px;
            text-align: center;
            font-size: 45px;
        }

        .card-body {
            padding: 20px;
        }

        .card-body h3 {
            color: #6a11cb;
            margin-bottom: 10px;
        }

        .card-body p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            background: #2575fc;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            transition: .3s;
        }

        .btn:hover {
            background: #6a11cb;
        }

        .home {
            text-align: center;
            margin-top: 40px;
        }

        .home a {
            display: inline-block;
            background: white;
            color: #6a11cb;
            padding: 12px 35px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: .3s;
        }

        .home a:hover {
            background: #f2f2f2;
            transform: scale(1.05);
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: white;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>📝 เขียนบทความ</h2>

        <p class="subtitle">
            รวมบทความ ข่าวสาร และความรู้ที่น่าสนใจจากเว็บไซต์ของเรา
        </p>

        <div class="blog-grid">

            <div class="card">
                <div class="card-header">💻</div>
                <div class="card-body">
                    <h3>การพัฒนาเว็บไซต์</h3>
                    <p>
                        เรียนรู้พื้นฐาน HTML, CSS และ JavaScript สำหรับผู้เริ่มต้น
                        พร้อมเทคนิคการสร้างเว็บไซต์ให้สวยงาม
                    </p>
                    <a href="#" class="btn">อ่านเพิ่มเติม</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">🤖</div>
                <div class="card-body">
                    <h3>เทคโนโลยี AI</h3>
                    <p>
                        อัปเดตความรู้เกี่ยวกับ AI และเครื่องมือที่ช่วยเพิ่มประสิทธิภาพ
                        การทำงานในยุคดิจิทัล
                    </p>
                    <a href="#" class="btn">อ่านเพิ่มเติม</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">🚀</div>
                <div class="card-body">
                    <h3>Laravel Framework</h3>
                    <p>
                        เรียนรู้การสร้างเว็บไซต์ด้วย Laravel ตั้งแต่พื้นฐาน
                        ไปจนถึงการพัฒนาเว็บแอปพลิเคชัน
                    </p>
                    <a href="#" class="btn">อ่านเพิ่มเติม</a>
                </div>
            </div>

        </div>

        <div class="home">
            <a href="/">🏠 กลับสู่หน้าแรก</a>
        </div>

        <footer>
            © 2026 My Website | Blog Page ❤️
        </footer>

    </div>

</body>

</html>