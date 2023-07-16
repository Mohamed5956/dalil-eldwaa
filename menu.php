<?php
include 'conn.php';
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        .navbar {
            position: relative;
            background-color: #f8f9fa;
            padding: 10px;
            display: flex; /* Added */
            justify-content: space-between; /* Added */
            align-items: center; /* Added */
        }

        /*.menu-button{*/
        /*    position: absolute;*/
        /*    top: 30px;*/
        /*    left: 30px;*/
        /*}*/

        .navbar-brand {
            display: inline-block;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            margin-right: 10px;
        }

        .navbar-nav {
            display: flex;
            flex-direction: row; /* Updated to flex-direction: row */
            justify-content: flex-end; /* Updated to flex-end */
            align-items: center; /* Align items vertically in the center */
        }

        .nav-link {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 10px;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .nav-link:hover {
            background-color: #eee;
        }

        .menu-button {
            display: none;
            background-color: #f8f9fa;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
        }

        .menu-icon {
            display: none;
            width: 20px;
            height: 3px;
            background-color: #333;
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
            }

            .menu-button {
                display: block;
            }

            .menu-items {
                display: none;
                flex-direction: column;
                margin-top: 10px;
            }

            .menu-items.show {
                display: block;
            }

            .nav-link {
                margin-top: 5px;
            }

            .menu-button .menu-icon {
                display: block;
            }
        }
    </style>
    <script>
        function toggleMenuItems() {
            const menuItems = document.querySelector('.menu-items');
            menuItems.classList.toggle('show');
        }
    </script>
</head>
<body>
<nav class="navbar" dir="rtl">
    <a class="navbar-brand" href="/">
        <img src="favy.png" width="68" height="50" alt="" loading="lazy">
        دليل الدواء الجديد
    </a>
    <button class="menu-button" onclick="toggleMenuItems()">
        <div class="menu-icon"></div>
        <div class="menu-icon"></div>
        <div class="menu-icon"></div>
    </button>
    <div class="navbar-nav menu-items ms-auto mx-4 mt-4">
        <a class="nav-link active" href="/">دليل الدواء الجديد<span class="sr-only">(current)</span></a>
        <a class="nav-link" href="/">بحث بالمادة الفعالة</a>
        <a class="nav-link" href="/">دليل استعمالات الادوية</a>
        <a class="nav-link" href="/dl.php">كل الكتب</a>
        <a class="nav-link" href="https://dlil-alasaar.com">دليل الأسعار</a>
        <a class="nav-link" href="/contact.php">اتصل بنا</a>
        <a class="nav-link" href="/login.php">دخول</a>
        <?php
        if (isset($_COOKIE['UEMAIL']) && $_COOKIE['UGROUP'] == 3) :
            ?>
            <a class="nav-link" href="/goraa.php?id=1">اضافة جرعات الادوية</a>
        <?php
        endif;
        ?>
        <?php
        if (isset($_COOKIE['UEMAIL']) && $_COOKIE['UGROUP'] == 2) :
            ?>
            <a class="nav-link" href="/stat.php">احصائيات</a>
            <a class="nav-link" href="/newbook.php">كتاب جديد</a>
            <a class="nav-link" href="/logout.php">خروج</a>
        <?php
        endif;
        ?>
    </div>
</nav>
</body>
</html>
