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
    background: cornsilk;
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
    background: linear-gradient(to right, orange, tomato);
    text-align: left;
    padding-left: 10%;
    transform: perspective(500px) rotateY(45deg);
}

ul li:nth-child(even) {
    background: linear-gradient(to left, orange, tomato);
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

</style>

<body>
<ul>
  <li><a href="https://www.google.com/search?gs_ssp=eJzj4tTP1TdIKrHMKTJg9GJNyU9PrwQAMt4Flg&q=doggy&oq=&aqs=chrome.0.46i39i275i362j35i39i362l7...8.119202j0j1&sourceid=chrome&ie=UTF-8">CSE</a></li>
  <li>EEE</li>
  <li>CE</li>
  <li>BTM</li>
  <li>IP</li>
  <li>ME</li>
  <li>SWE</li>
</ul>
</body>

