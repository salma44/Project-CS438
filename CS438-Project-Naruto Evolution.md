Al Imam Muhammad ibn Saud Islamic University ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.001.png)![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.002.png)College of Computer and Information System 

Computer Science Department 2nd  Semester 1443 H – 2022 G 

**CS 438 – Internet Technologies Project** 

**[Naruto Evolution ]** 

**BY:** 



|**STUDENT NAME**|**ID** |
| - | - |
|Jomana Saleh Alabdaly    |[439026715] |
|Reem Abdullah Alluhaidan |[439019731] |
|Salma Fhmed Fahmy |[439026713] |
|Shahad Mohammed Ben Dharaan |[439022654] |
**Supervisor:**

**Ms.Amal Algefes** 

`                                      `**Date:** 

**[8/5/2022]** 

In this project, First, the player will enter the login page, if he has an account, he will type the username and password, if he does not have an account, he will go to the sign-up page. 

In the game we have the main character Naruto and we have two values which are score and points. Naruto will run towards the front, and in front of him will be the characters Sasuke, Pain and Ramen food. Naruto must not collide with the character pain, when he collides with him, his points will decrease. Conversely, when Naruto collides with Sasuke and the food Ramen, it will increase the points and score. When the points reach 50, Naruto and Sasuke characters will transform and evolve, and this will be the Evolution of Naruto. This game is designed for anyone who enjoys playing games and loves Naruto. 

1. **Flow Chart   ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.003.jpeg)**
2. **Look & Feel :** 

**- Signup page**  

The background image of the page is character of our game [1]. The text is bold, color code #8B8000 and  font-family Papyrus, fantasy. There is a signup form inside a box at the center vertically and horizontally to the left of the page with border-radius 25px and opacity 60%. Inside a box at the top and middle "Signup" title in green color, below the title, the input takes username and password from the user then "Signup" button which background color is green and text color is white and border is solid thin with radius 25px, then "Login" text link. 

**-Login page**  

The background image of the page is character of our game [2], and page text is bold color purple and font-family Papyrus, fantasy. There  is login form inside a box at the center vertically and horizontally to the right of the page with border-radius 25px and opacity 60%. Inside a box at the top and middle "Login" title in purple color, below the title, the input takes username and password from the user then "Login" button which background color is purple and text color is white and border is solid thin with radius 25px, then "Sign up" text link with blue color. 

**-Naruto Running Game page** 

The background code color of the page is #FFFFE0 and text is bold with font-family Papyrus, fantasy. At the top and middle of the page there is text massage in red color " Enjoy playing 'user name'!", below the text there is a " Pass Your Score" button which background color is green and text color is white and border is solid thin with radius 25px, below of the button there are two red text links "Winners" and "Logout". 

**-Winners page** 

The background image of the page is main character of our game [3] and page text is bold green color and  font-family Papyrus, fantasy. There are score form inside a box, box at the middle of the page with border-radius 25px and opacity 60%. Inside a box at the top and middle "Your Score: 'User Score' " title, below the title, there are the winning players and score in two columns table with red text color, below of the table there are two text links "Play Again" and "Logout". In general, we matched the texts colors and themes to with colors of the characters we chose. 

3. **Dynamic Components :** 

[index (naruto – pain -sasuke – ramen -wallpaper)] 

4. **Business Logic**  

We have five columns in Database.( id -user\_id - user\_name -password – date – Score). 

The id has type bigint, length 20, auto increment and Primary key, the user\_id have type bigint  and length 20 , the user\_id have type bigint  and length 20, the user\_name have type varchar and length 100 , the password have type varchar and length 100, the date have type timestamp and default value current timestamp and the Score have type int , length 11, accepts the value null and default value is Null. 

When the user registers, the registration HTML form saves the data and sends it via the post method, and then sends it via query SQL and saves it in Database. When the user logs in, the HTML form takes the entered value and compares it to the values stored in the database using query Select.  

To be able to update the database and save the new score of each player, an SQL query was used. We used the “Update” SQL query to change the score of each player. An UPDATE query is used to change an existing row or rows in the database. Then we used “set” to choose which column to change, the SET clause specifies the columns to update and the new values for the columns. Lastly “where” was used to choose which player’s score to change, The WHERE clause is used to filter records. It is used to extract only those records that fulfill a specified condition. This is the SQL query that was used: 

"UPDATE users SET score = '$score' WHERE user\_name = '$user\_id[user\_name]'"; 

` `**Code:** 

**Index.php:** 

<?php  session\_start(); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.004.png)

`  `include("connection.php");   include("functions.php"); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.005.png)

`  `$user\_id = check\_login($con); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.006.png)?> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.007.png)

<!DOCTYPE html> 

<html> 

<head> 

`  `<title>Naruto Running Game</title> 

`  `<script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/p5.min.js"></script>     <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/addons/p5.sound.min.js"></scri pt> 

`    `<script src="https://cdn.jsdelivr.net/gh/bmoren/p5.collide2D/p5.collide2d.min.js"></s cript> 

`    `<script src="https://unpkg.com/ml5@0.3.1/dist/ml5.min.js"></script> 

`  `<style> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.008.png)

html, body { 

`  `background-color:#FFFFE0; 

`  `margin-left:60px; 

`  `padding: 0; 

`  `font-family: Papyrus, fantasy;   font-weight: bold; ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.009.png)

`  `} 

`  `canvas { 

`  `display: block;   } ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.010.png)

`  `h2{ 

`    `margin-left:-25px;   color:red; 

`  `} ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.011.png)

`  `div{ 

`    `margin-left:400px; 

![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.012.png)

`  `}   ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.013.png)a{ ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.014.png)

color:red; text-decoration: none; padding: 13px; 

} ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.015.png)

#button{ 

padding: 7px; 

color: white; 

background-color: green; 

opacity: 70%; 

border: solid thin; border-top-left-radius:25px;   border-top-right-radius:25px;   border-bottom-right-radius:25px;   border-bottom-left-radius:25px; font-family: Papyrus, fantasy; margin-left:25px; 

} 

`  `</style> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.016.png)

</head> <body> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.017.png)

<div> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.018.png)

`  `<h2>Enjoy playing <?php echo $user\_id['user\_name'];    ?>!</h2> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.019.png)

<form method="post" action="score.php" id="form"> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.020.png)<input type="hidden" id = "scores" name="scores" > ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.021.png)

<input id="button" type="submit" value="Pass Your Score"> <br> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.022.png)

<a href="winners.php" >Winners</a> 

<form method="post" action="score.php" id="form" > ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.023.png)

<a href="logout.php">Logout</a> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.024.png)</form> 

</div> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.025.png)

`  `<script src="naruto.js"></script> 

`    `<script src="pain.js"></script> 

`    `<script src="sasuke.js"></script> 

`    `<script src="ramen.js"></script> 

`    `<script src="wallpaper.js"></script> </body> 

</html> 

**login.php:** 

<?php  session\_start(); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.007.png)![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.006.png)

include("connection.php"); include("functions.php"); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.026.png)

`    `if($\_SERVER['REQUEST\_METHOD'] == "POST")     { 

`        `//something was posted 

`        `$user\_name = $\_POST['user\_name']; 

`        `$password = $\_POST['password']; ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.017.png)

`        `if(!empty($user\_name) && !empty($password) && !is\_numeric($user\_name)) 

`        `{ ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.020.png)

`            `//read from database 

`            `$query = "select \* from users where user\_name = '$user\_name' limit 1"; 

`            `$result = mysqli\_query($con, $query); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.027.png)

`            `if($result) 

`            `{ 

`                `if($result && mysqli\_num\_rows($result) > 0)                 { ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.009.png)

$user\_data = mysqli\_fetch\_assoc($result); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.020.png)

if($user\_data['password'] === $password) { ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.010.png)

`                        `$\_SESSION['user\_id'] = $user\_data['user\_id'];                         header("Location: index.php"); 

`                        `die; 

`                    `} 

`                `} 

} ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.015.png)

`            `echo "wrong username or password!";         }else 

`        `{ 

`            `echo "wrong username or password!";         } 

`    `} ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.028.png)

?> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.029.png)

<!DOCTYPE html> 

<html> 

<head> 

`    `<title>Login</title> </head> 

<body> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.030.png)

<style type="text/css"> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.017.png)

body{ 

`  `color: purple; 

`  `font-family: Papyrus, fantasy; 

`  `font-weight: bold; 

`  `background-image: url("loginBackground.png");   background-size: cover ; ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.031.png)

} ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.022.png)

`    `#text{ ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.031.png)

`        `height: 25px; 

`        `border-radius: 5px; 

`        `padding: 4px; 

`        `border: solid thin #aaa;         width: 100%; 

`    `} ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.021.png)

#button{ ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.020.png)

padding: 10px; 

width: 100px; 

color: white; 

background-color: purple; 

border: solid thin white; border-top-left-radius:25px;   border-top-right-radius:25px;   border-bottom-right-radius:25px;   border-bottom-left-radius:25px; 

`        `font-family: Papyrus, fantasy;     } ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.013.png)

#box{ ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.014.png)

background-color: aliceblue; width: 330px; padding-bottom: 20px; padding-top: 20px; padding-right: 20px; padding-left: 20px; margin-left: 690px; margin-top: 50px; border-radius: 25px; opacity: 60%; 

text-align: center; ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.032.png)

} ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.033.png)

`    `a{ 

`        `text-decoration: none;     } 

h1{ 

`    `margin-left:690px; 

`    `font-size:50px; 

} ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.031.png)

</style> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.022.png)

<h1>Naruto Evolution</h1> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.031.png)<div id="box"> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.022.png)

`        `<form method="post"> 

`            `<div style="font-size: 20px;margin: 10px;color: purple;">Login</div> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.022.png)

`            `<label >User Name: <input id="text" type="text" name="user\_name"></label> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.020.png)

<br><br> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.021.png)

`            `<label>Password: <input id="text" type="password" name="password"></label><br><br> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.025.png)

<input id="button" type="submit" value="Login"><br><br> ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.034.png)

`            `<a href="signup.php">Sign-Up</a><br><br>         </form> 

`    `</div> </body> </html> 

**signup.php:** 

<?php  session\_start(); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.028.png)

include("connection.php"); include("functions.php"); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.035.png)

`    `if($\_SERVER['REQUEST\_METHOD'] == "POST")     { 

`        `//something was posted 

`        `$user\_name = $\_POST['user\_name']; 

`        `$password = $\_POST['password']; ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.030.png)

`        `if(!empty($user\_name) && !empty($password) && !is\_numeric($user\_name)) 

`        `{ ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.030.png)

`            `//save to database 

`            `$user\_id = random\_num(20); 

`            `$query = "insert into users (user\_id,user\_name,password) values ('$user\_id','$user\_name','$password')"; ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.031.png)

mysqli\_query($con, $query); ![](Aspose.Words.df229504-a3de-49ec-8caf-1a093149b2ac.022.png)

`            `header("Location: login.php"); 

`            `die; 

`        `}else 

`        `{ 

`            `echo "Please enter some valid information!";         } 

`    `} 

?> 

**References:**

1. “Pinterest,” Pinterest. https://www.pinterest.com/pin/565905509409806502/feedback/ (accessed May 03, 2022). 
1. “4K wallpaper: Sasuke Naruto Shippuden Wallpaper Iphone.” https://izzesmile.blogspot.com/2020/06/sasuke-naruto-shippuden-wallpaper- iphone.html?m=1 (accessed May 03, 2022). 
1. “Naruto Minimalist by RainerDrakkar on DeviantArt.” https://www.deviantart.com/rainerdrakkar/art/Naruto-Minimalist-869410584 (accessed May 03, 2022). 
1. https://www.youtube.com/watch?v=WYufSGgaCZ8 
1. [https://codingstatus.com/display-data-in-html-table-using-php-mysql/ ](https://codingstatus.com/display-data-in-html-table-using-php-mysql/)
12
