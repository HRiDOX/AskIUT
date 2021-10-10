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
    background-color: #a8d6b8;
}

ul {
    padding: 0;
    list-style-type: none;
}

li {
    font-size: 25px;
    width: 8em;
    height: 2em;
    color: #2eb82e;
    border-left: 0.08em solid;
    position: relative;
    margin-top: 0.8em;
    cursor: pointer;
}

li::before,
li::after
 {
    content: '';
    position: absolute;
    width: inherit;
    border-left: inherit;
    z-index: -1;
}

li::before {
    height: 80%;
    top: 10%;
    left: calc(-0.15em - 0.08em * 2);
    filter: brightness(0.8);
}

li::after {
    height: 60%;
    top: 20%;
    left: calc(-0.15em * 2 - 0.08em * 3);
    filter: brightness(0.6);
}

li span {
    position: relative;
    height: 120%;
    top: -10%;
    box-sizing: border-box;
    border: 0.08em solid;
    background-color:#004d2e;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: sans-serif;
    text-transform: capitalize;
    transform: translateX(calc(-0.15em * 3 - 0.08em * 2));
    transition: 0.3s;
}

li:hover span {
    transform: translateX(0.15em);
}


.link { color: #a6a6a6; } /* CSS link color (red) */
.link:hover { color: #66ff66; } /*  CSS link hover (green) */

</style>

<body>
    
<ul>
    
  <li><span><a class="link" href="cse_department.php">CSE</a></span></li>
  <li><span><a class="link" href="eee_department.php">EEE</a></span></li>
  <li><span><a class="link" href="cee_department.php">CEE</a></span></li>
  <li><span><a class="link" href="btm_department.php">BTM</a></span></li>
  <li><span><a class="link" href="me_department.php">MPE</a></span></li>
  <li><span><a class="link" href="tve_department.php">TVE</a></span></li>
  
</ul>
</body>

