<?php
include 'conn.php';
include 'header.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" dir="rtl">
  <a class="navbar-brand" href="/">
    <img src="favy.png" width="68" height="50" alt="" loading="lazy">
    دليل الدواء الجديد
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="/">
        دليل الدواء الجديد
        <span class="sr-only">(current)</span></a>

      <a class="nav-link" href="/">
        بحث بالمادة الفعالة
      </a>
      <a class="nav-link" href="/">
        دليل استعمالات الادوية
      </a>


      <a class="nav-link" href="/dl.php">
        كل الكتب
      </a>

      <a class="nav-link" href="https://dlil-alasaar.com">
        دليل الأسعار
      </a>

      <a class="nav-link" href="/contact.php">
        اتصل بنا
      </a>
      <a class="nav-link" href="/login.php">
        دخول


      </a>



      <?php
      if (isset($_COOKIE['UEMAIL']) && $_COOKIE['UGROUP'] == 3) :
      ?>


        <a class="nav-link" href="/goraa.php?id=1">
          اضافة جرعات الادوية
        </a>

      <?php
      endif;
      ?>
      <?php
      if (isset($_COOKIE['UEMAIL']) && $_COOKIE['UGROUP'] == 2) :
      ?>
        <a class="nav-link" href="/stat.php">
          احصائيات
        </a>
        <a class="nav-link" href="/newbook.php">
          كتاب جديد
        </a>

        <a class="nav-link" href="/logout.php">
          خروج
        </a>
      <?php
      endif;
      ?>
    </div>
  </div>
</nav>