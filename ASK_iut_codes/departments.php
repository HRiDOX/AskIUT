<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Department Repository</title>
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
    background: linear-gradient(to right,#2eb82e, #d9d9d9);
    text-align: left;
    padding-left: 10%;
    transform: perspective(500px) rotateY(45deg);
}

ul li:nth-child(even) {
    background: linear-gradient(to left, #2eb82e, #d9d9d9);
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
#top_bar {
    background-color: #2EC462;
    color: #EEEEEE;
}

.link { color:  #d9d9d9; } /* CSS link color (red) */
.link:hover { color: #00FF00; } /* CSS link hover (green) */

</style>

<body style="background: linear-gradient(to left,#C3E3CE ,#ffffff)" >
<div><h2 style="tex-alignment:center">Choose Repository for</h2>
<br>

<div>
<ul>
  <li><a class="link"  href="cse_repository.php">CSE</a></li>
  <li><a class="link"  href="eee_repository.php">EEE</a></li>
  <li><a class="link"  href="cee_repository.php">CEE</a></li>
  <li><a class="link"  href="btm_repository.php">BTM</a></li>
  <li><a class="link"  href="mpe_repository.php">MPE</a></li>
  <li><a class="link"  href="tve_repository.php">TVE</a></li>
</ul>
</div>
</div>

</body>

