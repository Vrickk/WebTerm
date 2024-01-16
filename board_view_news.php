<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title><?php 
					$num  = $_GET["num"];
					$page  = $_GET["page"];
		
					$con = mysqli_connect("localhost", "Steve", "Vrick2956!@", "Term");
					$sql = "select * from board_news where num=$num";
					$result = mysqli_query($con, $sql);
		
					$row = mysqli_fetch_array($result);
					$subject    = $row["subject"];

					echo "뉴스 > ".$subject." - Indie, GO!";
				?></title>
		<link rel="stylesheet" type="text/css" href="./css/common.css">
		<link rel="stylesheet" type="text/css" href="./css/board.css">
	</head>
	<?php require('dark.php'); ?>
	<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>"> 
		<header>
    		<?php include "header.php";?>
		</header>  
		<section>
			<div id="main_img_bar">
        		<?php require('slide.php'); ?>
 			</div>
			<div id="board_box">
				<h3 class="title">
					뉴스 > 내용보기
				</h3>
				<?php

					$id      = $row["id"];
					$name      = $row["name"];
					$regist_day = $row["regist_day"];
					
					$content    = $row["content"];
					$file_name    = $row["file_name"];
					$file_type    = $row["file_type"];
					$file_copied  = $row["file_copied"];
					$hit          = $row["hit"];


					$content = str_replace(" ", "&nbsp;", $content);
					$content = str_replace("\n", "<br>", $content);
					$content = str_replace("", "<p>", $content);
					$content = str_replace("", "</p>", $content);



					$new_hit = $hit + 1;
					$sql = "update board_news set hit=$new_hit where num=$num";   
					mysqli_query($con, $sql);
				?>		
	    		<ul id="view_content">
					<li>
						<span class="col1"><b>제목 :</b> <?=$subject?></span>
						<span class="col2"><?=$name?> | <?=$regist_day?></span>
					</li>
					<li>
						<?php
							if($file_name) {
								$real_name = $file_copied;
								$file_path = "./data/".$real_name;
								$file_size = filesize($file_path);

								echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
								<a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
								}
						?>
						<?=$content?>
					</li>		
	    		</ul>
	    		<ul class="buttons">
					<li><button onclick="location.href='board_list_news.php?page=<?=$page?>'">목록</button></li>
					<li><button onclick="location.href='board_modify_form_news.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
					<li><button onclick="location.href='board_delete_news.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
					<li><button onclick="location.href='board_form_news.php'">글쓰기</button></li>
				</ul>
			</div>
		</section> 
		<footer>
    		<?php include "footer.php";?>
		</footer>
	</body>
</html>
