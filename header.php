<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
    if (isset($_SESSION["userwriter"])) $userwriter = $_SESSION["userwriter"];
    else $userwriter = "";

    $theme = $_COOKIE['t']; 
?>		
        <div id="top">
            <h3>
                <a href="index.php"><?php 
                if ($theme == 'dark') echo "<img src='title_dark.png'>";
                 else echo "<img src='title_white.png'>";
                 ?></a>
            </h3>
            <ul id="top_menu" align="right">  
                
                <?php
                    if(!$userid) {
                ?>                
                <li><a style="color :<?=$color?>" href="member_form.php">Sign Up</a> </li>
                <li> | </li>
                <li><a style="color :<?=$color?>" href="login_form.php">Log In | </a></li>
                <?php
                    } else {
                        if($_SESSION['userwriter'] == 1) $iswriter = ' 기자';
                        else $iswriter = "";
                        $logged = $username."(".$userid.")".$iswriter."님<br>  [Level : ".$userlevel.", Point : ".$userpoint."]<br> ";
                ?>
                <li><?=$logged?> </li>
                <li><a style="color :<?=$color?>" href="logout.php">Log Out</a> </li>
                <li> | </li>
                <li><a style="color :<?=$color?>" href="member_modify_form.php">User Info</a></li>
                <li> | </li>
                
                <?php
                    }
                ?>

                <li>
                    <label class="switch">
                        <input type="checkbox" id="toggleTheme" <?php if($theme == 'dark') {echo "checked";}?>>
                    </label>
                    Dark Mode | </a>
                </li>
                
                <?php
                    if($userlevel==0) {
                ?>
                <li><a style="color :<?=$color?>" href="admin.php">Admin Mode</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li><a href="index.php">홈</a></li>
                <li><a href="message_form.php">쪽지</a></li>                                
                <li><a href="board_list.php">게시판</a></li>
                <li><a href="board_list_news.php">게임 뉴스</a></li>
                <li><a href="index.php">즉석 채팅</a></li>
            </ul>
        </div>

        <script>
			$("#toggleTheme").on('change', function() {
				if($(this).is(':checked')) {
					$(this).attr('value', 'true');
					document.cookie = "t=dark";
					location.reload();
				} else {
					$(this).attr('value', 'false');
					document.cookie = 't=light';
					location.reload();
				}
			});
		</script>