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
  <li><a  href="cse_repository.php">CSE</a></li>
  <li>EEE</li>
  <li>CEE</li>
  <li>BTM</li>
  <li>ME</li>
  <li>TVE</li>
</ul>
</body>

