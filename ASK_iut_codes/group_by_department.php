<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Departments</title>
</head>

<style>
    body {
    margin: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
}

ul {
    padding: 0;
    list-style-type: none;
}

ul li {
    box-sizing: border-box;
    width: 15em;
    height: 3em;
    font-size: 20px;
    border-radius: 0.5em;
    margin: 0.5em;
    box-shadow: 0 0 1em rgba(0,0,0,0.2);
    color: white;
    font-family: sans-serif;
    text-transform: capitalize;
    line-height: 3em;
    transition: 0.3s;
    cursor: pointer;
}

ul li:nth-child(odd) {
    background: linear-gradient(to right, black, #d9d9d9);
    text-align: left;
    padding-left: 10%;
    transform: perspective(500px) rotateY(45deg);
}

ul li:nth-child(even) {
    background: linear-gradient(to left, black, #d9d9d9);
    text-align: right;
    padding-right: 10%;
    transform: perspective(500px) rotateY(-45deg);
}

ul li:nth-child(odd):hover {
    transform: perspective(200px) rotateY(45deg);
    padding-left: 5%;
}

ul li:nth-child(even):hover {
    transform: perspective(200px) rotateY(-45deg);
    padding-right: 5%;
}

.link { color: #a6a6a6; } /* CSS link color (red) */
/*.link:hover { color: #00FF00; }  CSS link hover (green) */

</style>

<body>
<ul>
  <li><a  href="cse_department.php">CSE</a></li>
  <li><a  href="eee_department.php">EEE</a></li>
  <li><a  href="cee_department.php">CEE</a></li>
  <li><a  href="btm_department.php">BTM</a></li>
  <li><a  href="me_department.php">ME</a></li>
  <li><a  href="tve_department.php">TVE</a></li>
  <li><a  href="ipe_department.php">IPE</a></li>
</ul>
</body>

