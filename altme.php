<?php
session_start();
$id          = $_GET['id'];
if (is_numeric($id)) :
  include 'conn.php';
  $q           = mysqli_query($db, "SELECT * FROM drugs WHERE id = $id");
  $row         = mysqli_fetch_assoc($q);
  $active      = $row['active'];
  $uses        = $row['uses'];
  $similars_id = $row['similars_id'];
  $sqlv        = "UPDATE drugs SET sim_visits = sim_visits+1 WHERE id = $id";
  mysqli_query($db, $sqlv);
?>
  <!DOCTYPE html>
  <html>

  <head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content=" بدائل <?php echo $row['arabic'] . "  "  .  $row['name']; ?> دليل الدواء الجديد">
    <meta property="og:description" content=" بدائل / بديل ومثائل <?php echo $row['arabic'] . " | " . $row['name']; ?> alternatives">
    <meta property="og:image" content="<?php echo $row['img']; ?> ">
    <title> بديل <?php echo $row['arabic'] . "  بدائل  "  .  $row['name']; ?></title>
    <meta name="description" content=" بدائل / بديل دواء <?php echo $row['arabic'] . " | " . $row['name']; ?> alternatives">
    <meta content='دليل اسعار الدواء الجديد <?php echo $row['arabic'] . " | " . $row['name'] ?> ' name='keywords' />
    <?php
    include 'menu.php';
    ?>
  </head>

  <body>
    <div class="container">
      <div style="text-align:right;margin:5px">
        <h2>
          بديل
          <?php
          if ($row['arabic'] != "") {
            echo $row['arabic'] . " <br> بديل "  . ucfirst($row['name']);
          } else {
            echo ucfirst($row['name']);
          }
          ?>
        </h2>
        <div align="center">
          <?php
          if ($row['img'] != "") {
            echo "<img src='" . $row['img'] . "' height='250' width='300' style='object-fit:contain' />";
          } else {
          }
          ?>
        </div>
        <p align='center'>
          تم البحث عن بدائل هذا الدواء
          <?php echo $row['sim_visits']; ?>
          مرة
        </p>
      </div>
      <h3 align="center" style="margin:10px auto;">
        بدايل دواء
        <?php echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
      </h3>



      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920" crossorigin="anonymous"></script>
      <!-- altunit -->
      <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7891698547800920" data-ad-slot="4451110277" data-ad-format="auto" data-full-width-responsive="true"></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <div align="center">
        <br>
        <a target="_blank" href="https://bit.ly/3xhKIfG">
          <button class="appclick" style="background:#ff5e57;font-family: tajawal,sans-serif;padding:10px 20px;margin:5px;border:0;border-radius:10px;color:#fff;font-size:21px;font-weight:bold;box-shadow: 0 0 6px 1px rgb(0 0 0 / 23%);">
            احذر هذا الدواء
            <br>
            معلومة طبية تنقذ طفلك من الموت
          </button>
        </a>
      </div>






      <p align="center">
        <span style="font-size:13px">
          تم ترتيبها حسب السعر من الاقل للأعلى سعرا
        </span>

      </p>
      <div align="center">
        <h3>
          مثائل دواء <?php echo $row['arabic']; ?>
        </h3>
        <hr>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920" crossorigin="anonymous"></script>
        <!-- altunit -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7891698547800920" data-ad-slot="4451110277" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <div id="mydivmain" align="center" style="display:flex; flex-wrap: wrap;justify-content: center;margin:10px auto;">







          <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
              <div class="-my-8 divide-y-2 divide-gray-100">

                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920" crossorigin="anonymous"></script>
                <!-- altunit -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7891698547800920" data-ad-slot="4451110277" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <?php
                $num = 0;

                $sqli = mysqli_query($db, "SELECT * FROM drugs WHERE active LIKE '$active%'  ORDER BY price+0 ASC LIMIT 100");

                while ($rowactive = mysqli_fetch_assoc($sqli)) {
                  $num++;

                  echo '<div class="py-8 flex flex-wrap md:flex-nowrap">
        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          <span class="font-semibold title-font text-gray-700">' . $rowactive["name"] . '</span>
                 <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="' . $rowactive["img"] . '">
        </div>
        <div class="md:flex-grow">';
                  echo   '<h2 class="text-2xl font-medium text-gray-900 title-font mb-2">' . $rowactive["arabic"] . '</h2><p class="leading-relaxed">المادة الفعالة';
                  echo $rowactive['active'];
                  echo ' </p><a href="/drg.php?id=' . $rowactive["id"] . '" class="text-green-500 inline-flex items-center mt-4">عرض تفاصيل الدواء<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>';
                }
                ?>


              </div>
            </div>
          </section>























          <?php
          $num = 0;
          if ($active != "") {
            $sqli = mysqli_query($db, "SELECT * FROM drugs WHERE active LIKE '$active%'  ORDER BY price+0 ASC LIMIT 100");

            while ($rowactive = mysqli_fetch_assoc($sqli)) {
              $num++;
              echo  "<div class='similardivmain'><a style='text-decoration:none;' href='drg.php?id=" . $rowactive['id'] . "'> ";

              if ($rowactive['img'] != "") {
                echo "<img class='imgme' src='" . $rowactive['img'] . "' height='200' width='230' style='object-fit:contain'  >";
              } else {
                echo "<img  src='" . $rowactive['route'] . ".png" . "' height='200' width='230' style='object-fit:contain'  >";
              }
              echo "<br>";
              if ($rowactive['arabic'] != "") {
                echo $num . "-" . $rowactive['arabic'];
              } else {
                echo "<span dir='ltr'>" . $num . "-" . ucfirst($rowactive['name']) . "</span>";
              }
              echo "<a><br>" . "<span dir='rtl'>" . "المادة الفعالة:" . $rowactive['active'];
              echo "</span>";
              echo "<hr style='margin:1px'>";
              echo "<span class='prpda'>" . "السعر: " . $row['price'] . "جنيه</span> ";
              echo "</div>";
            }
          }



          echo "<hr><p>أدوية بدائل بنفس الاستعمال ولكن بمواد فعالة أخرى </p>";


          ?>



        </div>
      </div>


      <?php

      echo "<div id='mydivmain' align='center' style='display:flex; flex-wrap: wrap;justify-content: center;margin:10px auto;'" . "<div id='try' my try  ";

      if ($uses != "") {
        $sqli = mysqli_query($db, "SELECT * FROM drugs WHERE uses = '$uses'  ORDER BY price+0 ASC LIMIT 100");
        echo  mysqli_num_rows($sqli) . " دواء</div>";
        while ($rowactive = mysqli_fetch_assoc($sqli)) {
          $num++;
          echo  "<div class='hvr-icon-forward'><a style='text-decoration:none;' href='drg.php?id=" . $rowactive['id'] . "'> ";

          if ($rowactive['img'] != "") {
            echo "<img class='imgme' src='" . $rowactive['img'] . "' height='200' width='230' style='object-fit:contain'  >";
          } else {
            echo "<img  src='" . $rowactive['route'] . ".png" . "' height='200' width='230' style='object-fit:contain'  >";
          }

          if ($rowactive['arabic'] != "") {
            echo "<hr style='margin:2px'>" . $rowactive['arabic'];
          } else {
            echo "<span dir='ltr'>" . ucfirst($rowactive['name']) . "</span>";
          }
          echo "<div class='overlay'>
    <div class='text'>اضغط لعرض تفاصيل الدواء</div>
  </div>";
          echo "</div>";
        }
      }
      ?>
    </div>
    </div>
    </div>
    <div class="text-center">
      <div style="width:95%;border:1px solid black;border-radius:5px;margin:5px auto;background:yellow">
        <p style="font-size:20px">
          سعر دواء
          <?php
          if ($row['arabic'] != "") {
            echo $row['arabic'];
          } else {
            echo ucfirst($row['name']);
          }
          ?>
        </p>
        <span class="redBold"> <?php echo $row['price']; ?> جنيه</span>
      </div>
    </div>
    </div>
    <style>
      .imgme {
        display: block;

      }

      .overlay {
        position: absolute;
        bottom: 100%;
        left: 0;
        right: 0;
        background-color: #008CBA;
        overflow: hidden;
        width: 100%;
        height: 0;
        transition: .5s ease;
      }

      .hvr-icon-forward:hover .overlay {
        bottom: 75%;
        height: 25%;
      }

      .hvr-icon-forward:hover,
      .hvr-icon-forward:focus,
      .hvr-icon-forward:active {
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
      }



      .hvr-icon-forward:hover,
      .hvr-icon-forward:focus,
      .hvr-icon-forward:active {
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
      }


      .text {
        white-space: nowrap;
        color: white;
        font-size: 18px;
        position: absolute;
        overflow: hidden;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
      }


      .hvr-icon-forward {
        height: 320px;
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin: 20px;
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        -webkit-transition-duration: 0.1s;
        transition-duration: 0.1s;
      }

      .hvr-icon-forward .hvr-icon {
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-transition-duration: 0.1s;
        transition-duration: 0.1s;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
      }

      .hvr-icon-forward:hover .hvr-icon,
      .hvr-icon-forward:focus .hvr-icon,
      .hvr-icon-forward:active .hvr-icon {
        -webkit-transform: translateX(4px);
        transform: translateX(20px);
      }


      /* .similardivmain:hover .overlay {
   bottom: 75%;
  height: 25%;
}
.similardivmain:hover, .similardivmain:focus, .similardivmain:active {box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
}
.similardivmain:hover, .similardivmain:focus, .similardivmain:active {
  -webkit-transform: scale(0.9);
  transform: scale(0.9);
}
*/
      .similardivmain {
        box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
        border: 1px solid transparent;
        width: 90%;
        height: 320px;
        background: white;
        border-radius: 10px;
        padding: 3px;
        margin: 10px;
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);

        -webkit-transition-duration: 0.1s;
        transition-duration: 0.1s;
      }

      .similardivmain .hvr-icon {
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-transition-duration: 0.1s;
        transition-duration: 0.1s;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
      }






      .featuredItemPage {
        margin: 10px auto;
        padding: 3px;
        text-align: right;
        background-image: linear-gradient(to bottom right, #fff, #2ECCFA);
        border: 1px solid transparent;
        border-radius: 4px;
        box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
      }




      .featuredItemPage {
        margin: 10px auto;
        padding: 3px;
        text-align: right;
        background-image: linear-gradient(to bottom right, #fff, #2ECCFA);
        border: 1px solid transparent;
        border-radius: 4px;
        box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
      }

      .featuredItemPage2 {
        margin: 10px auto;
        padding: 3px;
        text-align: right;
        background-image: linear-gradient(to bottom right, #fff, #BE81F7);
        border: 1px solid transparent;
        border-radius: 4px;
        box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
      }

      .divDiv {
        background: #8A0829;
        color: #fff;
        width: 150px;
        text-align: center;
        margin: 20px auto;
        padding: 10px;
        border-radius: 5px;
        font-size: 15px;
        font-weight: bold;
      }

      .img_position {
        position: absolute;
        left: 5px;
        top: 3px;
      }

      .pDiv {
        position: absolute;
        left: 25px;
        top: 100px;
      }

      .prpda {
        color: #FE2E2E;
        font-weight: bold;
        font-size: 2rem;

      }
    </style>
    <script>
      $(document).ready(function() {});
    </script>
  <?php
else :
  header('Location: /');
endif;
include ' ';
  ?>
  </body>

  </html>